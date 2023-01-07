<?php
class LogoClinic_model  extends CI_model // sesui dengan nama tabel di db
{
    public function get_logo_clinic_all()
    {
        return $this->db->query("SELECT * FROM logo_clinic")->result_array();
    }

    public function get_logo_clinic_byID($id_logo)
    {
        $this->db->select('*');
        $this->db->from('logo_clinic');
        $this->db->where('id_logo', $id_logo);
        return $this->db->get()->row_array();
    }
    public function delete_logo_clinic($id_logo)
    {
        $this->db->where('id_logo', $id_logo);
        $this->db->delete('logo_clinic');
    }

    public function add_logo_clinic($data)
    {
        $this->db->insert('logo_clinic', $data);
    }

    public function update_logo_clinic(
        $data,
        $id_logo
    ) {
        $this->db->update('logo_clinic', $data, ['id_logo' => $id_logo]);
        return $this->db->affected_rows();
    }
}
