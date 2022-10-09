<?php
class Contact_model  extends CI_model
{
    public function getContactSosmed()
    {
        return $this->db->query("SELECT * FROM contact_clinic WHERE type_contact ='sosmed' ")->result_array();
    }
    
    public function getContactByTitle($titleContact)
    {
        $this->db->select('*');
        $this->db->from('contact_clinic');
        $this->db->where('title_contact', $titleContact);
        return $this->db->get()->row_array();
    }
}


