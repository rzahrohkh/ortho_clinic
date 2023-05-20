<?php
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class ControlPatientSchedule_model  extends CI_model // sesui dengan nama tabel di db
{
    public function get_clinical_practice_schedule_all()
    {
        return $this->db->query("SELECT * FROM clinical_practice_schedule")->result_array();
    }

    public function get_clinical_practice_schedule_byID($id_clinical_practice_schedule)
    {
        $this->db->select('*');
        $this->db->from('clinical_practice_schedule');
        $this->db->where('id_clinical_practice_schedule', $id_clinical_practice_schedule);
        return $this->db->get()->row_array();
    }
    public function delete_clinical_practice_schedule($id_clinical_practice_schedule)
    {
        $this->db->where('id_clinical_practice_schedule', $id_clinical_practice_schedule);
        $this->db->delete('clinical_practice_schedule');
    }

    public function add_clinical_practice_schedule($data)
    {
        $this->db->insert('clinical_practice_schedule', $data);
    }

    public function update_clinical_practice_schedule(
        $data,
        $id_clinical_practice_schedule
    ) {
        $this->db->update('clinical_practice_schedule', $data, ['id_clinical_practice_schedule' => $id_clinical_practice_schedule]);
        return $this->db->affected_rows();
    }
}
