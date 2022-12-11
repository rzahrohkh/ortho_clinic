<?php
class ClinicOpeningHours_model  extends CI_model // sesui dengan nama tabel di db
{
    public function get_clinic_opening_hours_all()
    {
        return $this->db->query("SELECT * FROM clinic_opening_hours")->result_array();
    }

    public function get_clinic_opening_hours_byID($id_opening_hours)
    {
        $this->db->select('*');
        $this->db->from('clinic_opening_hours');
        $this->db->where('id_opening_hours', $id_opening_hours);
        return $this->db->get()->row_array();
    }
    public function delete_clinic_opening_hours($id_opening_hours)
    {
        $this->db->where('id_opening_hours', $id_opening_hours);
        $this->db->delete('clinic_opening_hours');
    }

    public function add_clinic_opening_hours($data)
    {
        $this->db->insert('clinic_opening_hours', $data);
    }

    public function update_clinic_opening_hours(
        $data,
        $id_opening_hours
    ) {
        $this->db->update('clinic_opening_hours', $data, ['id_opening_hours' => $id_opening_hours]);
        return $this->db->affected_rows();
    }
}
