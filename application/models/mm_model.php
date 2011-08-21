<?php
/**
 * @property mixed db
 */
class MM_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function getClients()
    {
        $q = $this->db->get('clients');
        return $q->result();
    }
    
    function addClient($data) 
    {
        $this->db->insert('clients',$data);
        return;
    }

    function getGroup()
    {
        $q = $this->db->get('client_groups');
        return $q->result();
    }
}
?>
