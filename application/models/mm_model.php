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
    
    function getClients($num,$offset)
    {
        $q = $this->db->get('clients',$num,$offset);
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

    function addGroup($data)
    {
        $this->db->insert('client_groups',$data);
    }

    function getGroupClients($group_id)
    {


//        $q = $this->db->get_where('clients', array());
//        return $q->result();
        $this->db->select('*')->from('clients')->where('client_groups_id', $group_id);
        $q = $this->db->get();
        return $q->result();
    }

    function addEmails($tablica,$grupa)
    {
        $this->load->helper('email');
        foreach($tablica as $row)
        {
            if(valid_email($row))
            {
            $this->db->query("INSERT INTO clients (email,client_groups_id) VALUES ('".$row."','".$grupa."')");
            }
        }
    }
}
?>
