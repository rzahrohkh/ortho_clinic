<?php
class LandingProfile_model  extends CI_model // sesui dengan nama tabel di db
{
    public function get_profile_clinic_all()
    {
        return $this->db->query("SELECT * FROM profile_clinic")->result_array();
    }

    public function get_profile_clinic_byID($id_profile)
    {
        $this->db->select('*');
        $this->db->from('profile_clinic');
        $this->db->where('id_profile', $id_profile);
        return $this->db->get()->row_array();
    }
    // public function delete_namatabel($id_sesuitabeldidb)
    // {
    //     $this->db->where('id_sesuitabeldidb', $id_sesuitabeldidb);
    //     $this->db->delete('namatabel');
    // }

    // public function add_namatabel($data)
    // {
    //     $this->db->insert('namatabel', $data);
    // }

    public function update_profile_clinic(
        $data,
        $id_profile
    ) {
        $this->db->update('profile_clinic', $data, ['id_profile' => $id_profile]);
        return $this->db->affected_rows();
    }
}
