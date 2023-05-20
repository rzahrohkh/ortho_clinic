<?php
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class District_model  extends CI_model // sesui dengan nama tabel di db
{
    public function get_district_all()
    {
        return $this->db->query("SELECT * FROM district")->result_array();
    }
    public function get_city_by_id_city($id_city)
    {
        return $this->db->query("SELECT * FROM district where id_city = $id_city")->result_array();
    }
    public function get_district_byID($id_district)
    {
        $this->db->select('*');
        $this->db->from('district');
        $this->db->where('id_district', $id_district);
        return $this->db->get()->row_array();
    }
    public function delete_district($id_district)
    {
        $this->db->where('id_district', $id_district);
        $this->db->delete('district');
    }

    public function add_district($data)
    {
        $this->db->insert('district', $data);
    }

    public function update_district(
        $data,
        $id_district
    ) {
        $this->db->update('district', $data, ['id_district' => $id_district]);
        return $this->db->affected_rows();
    }
}
