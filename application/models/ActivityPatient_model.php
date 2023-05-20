<?php
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class ActivityPatient_model  extends CI_model // sesui dengan nama tabel di db
{
    public function get_activity_answer_all()
    {
        return $this->db->query("SELECT * FROM activity_answer")->result_array();
    }
    public function get_activity_answer_all_by_id_patient($id_patient)
    {
        return $this->db->query("SELECT * from activity_patient WHERE id_patient=$id_patient")->result_array();
    }

    public function get_activity_answer_byID($id_activity_answer)
    {
        $this->db->select('*');
        $this->db->from('activity_answer');
        $this->db->where('id_activity_answer', $id_activity_answer);
        return $this->db->get()->row_array();
    }
    public function delete_activity_answer($id_activity_answer)
    {
        $this->db->where('id_activity_answer', $id_activity_answer);
        $this->db->delete('activity_answer');
    }

    public function add_activity_answer($data)
    {
        $this->db->insert('activity_answer', $data);
    }

    public function update_activity_answer(
        $data,
        $id_activity_answer
    ) {
        $this->db->update('activity_answer', $data, ['id_activity_answer' => $id_activity_answer]);
        return $this->db->affected_rows();
    }
}
