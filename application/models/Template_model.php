<?php
class Template_model  extends CI_model
{
    public function get_???_all()
    {
        return $this->db->query("SELECT * FROM ???")->result_array();
    }

    public function get_???_byID($id_???)
    {
        $this->db->select('*');
        $this->db->from('???');
        $this->db->where('id_???', $id_???);
        return $this->db->get()->row_array();
    }
    public function delete_???($id_???)
    {
        $this->db->where('id_???', $id_???);
        $this->db->delete('???');
    }

    public function add_???($data)
    {
        $this->db->insert('???', $data);
    }

    public function update_???(
        $data,
        $id_???
    ) {
        $this->db->update('???', $data, ['id_???' => $id_???]);
        return $this->db->affected_rows();
    }
}
