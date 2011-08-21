<?php

/**
 * @property mixed mm_model
 * @property mixed input
 */
class Home extends CI_Controller
{
    function index()
    {
        $this->load->view('home');
    }

    function addClientView()
    {
        $grupa['grupa'] = $this->mm_model->getGroup();
        $this->load->view('add_client', $grupa);
    }

    function getClients()
    {
        if($q = $this->mm_model->getClients())
        {
            $data['clients'] = $q;
        }
        $this->load->view('index',$data);
    }

    function addClient()
    {
        $data = array(
            'imie' => $this->input->post('imie'),
            'nazwisko' => $this->input->post('nazwisko'),
            'adres' => $this->input->post('adres'),
            'email' => $this->input->post('email'),
            'client_groups_id' => $this->input->post('grupa')
        );
        $this->mm_model->addClient($data);
        $this->index();
    }
}

?>
