<?php
class MasterRole_model  extends CI_model // sesui dengan nama tabel di db
{
    public function getMasterRole_model()
    {
        $this->db->select('*');
        $this->db->from('role');
        return $this->db->get()->result_array();
    }

    public function get_role_all()
    {
        return $this->db->query("SELECT * FROM role")->result_array();
    }

    public function get_role_byID($id_sesuitabeldidb)
    {
        $this->db->select('*');
        $this->db->from('namatabel');
        $this->db->where('id_sesuitabeldidb', $id_sesuitabeldidb);
        return $this->db->get()->row_array();
    }
    public function delete_namatabel($id_sesuitabeldidb)
    {
        $this->db->where('id_sesuitabeldidb', $id_sesuitabeldidb);
        $this->db->delete('namatabel');
    }

    public function add_namatabel($data)
    {
        $this->db->insert('namatabel', $data);
    }

    public function update_namatabel(
        $data,
        $id_sesuitabeldidb
    ) {
        $this->db->update('namatabel', $data, ['id_sesuitabeldidb' => $id_sesuitabeldidb]);
        return $this->db->affected_rows();
    }
}
