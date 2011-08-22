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

    function getGroups()
    {
        $q = $this->db->get('client_groups');
        return $q->result();
    }

    function getGroupClients($group_id)
    {


//        $q = $this->db->get_where('clients', array());
//        return $q->result();
        $this->db->select('email')->from('clients')->where('client_groups_id', $group_id);
        $q = $this->db->get();
        return $q->result();
    }
}
?>
