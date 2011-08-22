<?php

/**
 * @property mixed mm_model
 * @property mixed input
 */
class Home extends CI_Controller
{
    function index()
    {
        $this->load->view('header');
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

    function getClients()
    {
        $data['clients'] = $this->mm_model->getClients();
//        if($q = $this->mm_model->getClients())
//        {
//            $data['clients'] = $q;
//        }
        $this->load->view('header');
        $this->load->view('get_clients',$data);
        $this->load->view('footer');
    }

    function getGroups()
    {
        if($q = $this->mm_model->getGroups())
        {
            $grupa['grupa'] = $q;
        }

        $this->load->view('header');
        $this->load->view('get_groups_view', $grupa);
        $this->load->view('footer');
    }

    function getGroupClients()
    {
        
        $group_id = $this->input->post('id');
        $q = $this->mm_model->getGroupClients($group_id);
        $data['data'] = $q;
        foreach($data['data'] as $row)
        {
            echo $row->email.", ";
        }
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
        $this->index();
    }
}

?>
