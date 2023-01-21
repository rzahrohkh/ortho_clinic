<?php
class ActivityQuestion_model  extends CI_model // sesui dengan nama tabel di db
{
    public function get_activity_question_all()
    {
        return $this->db->query("SELECT * FROM activity_question")->result_array();
    }
     public function get_activity_question_By_id_activity_type($id_activity_type)
    {
        return $this->db->query("SELECT * FROM activity_question WHERE id_activity_type = $id_activity_type")->result_array();
    }
 public function get_count_activity_question_By_id_activity_type()
    {
        return $this->db->query("SELECT count(*) countActivityQuestion FROM activity_question")->row_array();
    }
    public function get_activity_question_byID($id_activity_question)
    {
        $this->db->select('*');
        $this->db->from('activity_question');
        $this->db->where('id_activity_question', $id_activity_question);
        return $this->db->get()->row_array();
    }
    public function delete_activity_question($id_activity_question)
    {
        $this->db->where('id_activity_question', $id_activity_question);
        $this->db->delete('activity_question');
    }

    public function add_activity_question($data)
    {
        $this->db->insert('activity_question', $data);
    }

    public function update_activity_question(
        $data,
        $id_activity_question
    ) {
        $this->db->update('activity_question', $data, ['id_activity_question' => $id_activity_question]);
        return $this->db->affected_rows();
    }
}
