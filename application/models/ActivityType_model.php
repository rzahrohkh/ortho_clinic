<?php
class ActivityType_model  extends CI_model // sesui dengan nama tabel di db
{
    public function get_activity_type_all()
    {
        return $this->db->query("SELECT * FROM activity_type")->result_array();
    }
     public function get_activity_type_all_asc()
    {
        return $this->db->query("SELECT * FROM activity_type  ORDER BY id_activity_type ASC")->result_array();
    }

    public function get_activity_type_byID($id_activity_type)
    {
        $this->db->select('*');
        $this->db->from('activity_type');
        $this->db->where('id_activity_type', $id_activity_type);
        return $this->db->get()->row_array();
    }
    public function delete_activity_type($id_activity_type)
    {
        $this->db->where('id_activity_type', $id_activity_type);
        $this->db->delete('activity_type');
    }

    public function add_activity_type($data)
    {
        $this->db->insert('activity_type', $data);
    }

    public function update_activity_type(
        $data,
        $id_activity_type
    ) {
        $this->db->update('activity_type', $data, ['id_activity_type' => $id_activity_type]);
        return $this->db->affected_rows();
    }
}
