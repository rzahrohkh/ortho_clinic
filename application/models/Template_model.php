<?php
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class Template_model  extends CI_model // sesui dengan nama tabel di db
{
    public function get_namatabel_all()
    {
        return $this->db->query("SELECT * FROM namatabel")->result_array();
    }

    public function get_namatabel_byID($id_sesuitabeldidb)
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
