<?php
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class Subdistrict_model  extends CI_model // sesui dengan nama tabel di db
{
    public function get_subdistrict_all()
    {
        return $this->db->query("SELECT * FROM subdistrict")->result_array();
    }
    public function get_city_by_id_subdistrict($id_subdistrict)
    {
        return $this->db->query("SELECT * FROM subdistrict where id_subdistrict = $id_subdistrict")->result_array();
    }
    public function get_subdistrict_byID($id_subdistrict)
    {
        $this->db->select('*');
        $this->db->from('subdistrict');
        $this->db->where('id_subdistrict', $id_subdistrict);
        return $this->db->get()->row_array();
    }
    public function delete_subdistrict($id_subdistrict)
    {
        $this->db->where('id_subdistrict', $id_subdistrict);
        $this->db->delete('subdistrict');
    }

    public function add_subdistrict($data)
    {
        $this->db->insert('subdistrict', $data);
    }

    public function update_subdistrict(
        $data,
        $id_subdistrict
    ) {
        $this->db->update('subdistrict', $data, ['id_subdistrict' => $id_subdistrict]);
        return $this->db->affected_rows();
    }
}
