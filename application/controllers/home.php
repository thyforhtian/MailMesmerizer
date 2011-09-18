<?php

/**
 * @property mixed mm_model
 * @property mixed input
 */
class Home extends CI_Controller
{
    function index()
    {
        $this->load->view('index');
        $this->load->view('footer');
    }

    function addClientView()
    {
        $grupa['grupa'] = $this->mm_model->getGroups();
        $this->load->view('header');
        $this->load->view('add_client_view', $grupa);
        $this->load->view('footer');
    }

    function addClient()
    {
        $data = array(
            'imie' => $this->input->post('imie'),
            'nazwisko' => $this->input->post('nazwisko'),
            'firma' => $this->input->post('firma'),
            'email' => $this->input->post('email'),
            'client_groups_id' => $this->input->post('grupa')
        );
        $this->mm_model->addClient($data);
        $this->getClients();
    }

    function getClients()
    {
        //Pagination
        $this->load->library('pagination');

        $config['base_url'] = site_url() . "/home/getClients";
        $config['total_rows'] = $this->db->count_all('clients');
        $config['per_page'] = 15;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';

        $this->pagination->initialize($config);

        $data['paglinks'] = $this->pagination->create_links();
        echo $config['total_rows'];

        $data['clients'] = $this->mm_model->getClients($config['per_page'], $this->uri->segment(3));

        $this->load->view('header');
        $this->load->view('get_clients', $data);
        $this->load->view('footer');
    }

    function deleteClient()
    {
        $data = array('id' => $this->input->post('id'));
        $this->mm_model->deleteClient($data);
    }

    /**
     * @return void
     */
    function getEmails()
    {
        //Pagination
        $this->load->library('pagination');

        $config['base_url'] = site_url() . "/home/getEmails";
        $config['total_rows'] = $this->db->count_all('emails');
        $config['per_page'] = 10;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';

        $this->pagination->initialize($config);

        $data['paglinks'] = $this->pagination->create_links();
        echo $config['total_rows'];

        $data['clients'] = $this->mm_model->getEmails($config['per_page'], $this->uri->segment(3));

        $this->load->view('header');
        $this->load->view('get_emails', $data);
        $this->load->view('footer');
    }

    function updateEmail()
    {
        $id = $this->uri->segment(3);

        if ($this->input->post('submit')) {
            $title = $this->input->xss_clean($this->input->post('title'));
            $content = $this->input->xss_clean($this->input->post('content'));

            $this->mm_model->updatePost($id, $title, $content);

            $data['posts'] = $this->posts_model->getPosts();
            $this->load->view('crud_view', $data);
        } else {
            $data = array('id' => $id);
            $data['email'] = $this->mm_model->getSingleEmail($id);
            $this->load->view('header');
            $this->load->view('update_email_view', $data);
            $this->load->view('footer');
        }
    }

    function addEmailView()
    {
        $this->load->view('header');
        $this->load->view('add_email_view');
        $this->load->view('footer');
    }

    function addEmail()
    {
        $data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('mailBody'),
        );
        $this->mm_model->addEmail($data);
        $this->getEmails();
    }

    function deleteEmail()
    {
        $data = array('id' => $this->input->post('id'));
        $this->mm_model->deleteEmail($data);
    }

    function getGroups()
    {
        if ($q = $this->mm_model->getGroups()) {
            $grupa['grupa'] = $q;
        }

        $this->load->view('header');
        $this->load->view('get_groups_view', $grupa);
        $this->load->view('footer');
    }

    function addGroup()
    {
        $data['name'] = $this->input->post('nazwagrupy');

        $this->mm_model->addGroup($data);
        @$this->getGroups($dodane);
    }

    function getGroupClients()
    {
        $group_id = $this->input->post('id');

        $q = $this->mm_model->getGroupClients($group_id);
        $data['data'] = $q;

        foreach ($data['data'] as $row)
        {
            echo $row->email . ", ";
        }
    }

    function readFromFile()
    {
        $this->load->helper('file');
        $dupa = $_FILES['emailsFile']['tmp_name'];
        $read['plik'] = read_file($dupa);
        $justread = $read['plik'];
        $rozbite = preg_split('/[;,\n\r]/', $justread);

        $read['tablica'] = array_map('trim', $rozbite);
        $read['grupa'] = $this->input->post('grupa');

        $this->mm_model->addClientEmails($read['tablica'], $read['grupa']);

        $this->load->view('header');
        $this->load->view('dodane_z_pliku', $read);
        $this->load->view('footer');
    }

    function sendEmail()
    {
        $this->load->library('email');
        $this->load->helper('email');

        $id = $this->uri->segment(3);
        if (!$this->input->post('submit')) {
            $data['email'] = $this->mm_model->getSingleEmail($id);
            $data['grupy'] = $this->mm_model->getGroups();
            $this->load->view('header');
            $this->load->view('send_email_view', $data);
            $this->load->view('footer');
        } else {
            $emtsa = $this->input->post('emtsa');
            $mailid = $this->input->post('mailid');
            $sendas = $this->input->post('sendas');
            $sendasvisible = $this->input->post('sendasvisible');
            $sendChunks = $this->input->post('sendChunks');
            $sendInterval = $this->input->post('sendInterval');
            $topic = $this->input->post('topic');

            $getemail = $this->mm_model->getSingleEmail($mailid);
            foreach ($getemail as $row)
            {
                $emailbody = $row->content;
            }


            $split_emtsa = preg_split("/,|\s|\n|\|/", $emtsa);

            $good_emtsa = array_map('trim', $split_emtsa);

            $toSendArray = array_chunk($good_emtsa, $sendChunks);

            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'localhost';
            $config['mailtype'] = 'html';
            $this->email->initialize($config);

            $i = 0;
            while ($i < $sendChunks)
            {
                flush();
                ob_flush();
                $this->email->clear();
                $this->email->from($sendas, $sendasvisible);
                $this->email->subject($topic);
                $this->email->message($emailbody);
                $this->email->to($toSendArray[$i]);
                $this->email->send();
                print_r($toSendArray[$i]);
                sleep((int)($sendInterval));
                $i++;
            }
            echo $this->email->print_debugger();
        }
    }
}

?>
