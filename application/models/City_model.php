<?php
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class City_model  extends CI_model // sesui dengan nama tabel di db
{
    public function get_city_all()
    {
        return $this->db->query("SELECT * FROM city")->result_array();
    }

    public function get_city_byID($id_city)
    {
        $this->db->select('*');
        $this->db->from('city');
        $this->db->where('id_city', $id_city);
        return $this->db->get()->row_array();
    }
    public function get_city_by_id_province($id_province)
    {
        return $this->db->query("SELECT * FROM city where id_province = $id_province")->result_array();
    }
    public function delete_city($id_city)
    {
        $this->db->where('id_city', $id_city);
        $this->db->delete('city');
    }

    public function add_city($data)
    {
        $this->db->insert('city', $data);
    }

    public function update_city(
        $data,
        $id_city
    ) {
        $this->db->update('city', $data, ['id_city' => $id_city]);
        return $this->db->affected_rows();
    }
}
