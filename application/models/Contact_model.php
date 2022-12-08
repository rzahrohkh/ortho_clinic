<?php
class Contact_model  extends CI_model // sesui dengan nama tabel di db
{
    public function get_contact_clinic_all()
    {
        return $this->db->query("SELECT * FROM contact_clinic")->result_array();
    }

    public function get_contact_clinic_byID($id_contact)
    {
        $this->db->select('*');
        $this->db->from('contact_clinic');
        $this->db->where('id_contact', $id_contact);
        return $this->db->get()->row_array();
    }
    public function delete_contact_clinic($id_contact)
    {
        $this->db->where('id_contact', $id_contact);
        $this->db->delete('contact_clinic');
    }

    public function add_contact_clinic($data)
    {
        $this->db->insert('contact_clinic', $data);
    }

    public function update_contact_clinic(
        $data,
        $id_contact
    ) {
        $this->db->update('contact_clinic', $data, ['id_contact' => $id_contact]);
        return $this->db->affected_rows();
    }

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
