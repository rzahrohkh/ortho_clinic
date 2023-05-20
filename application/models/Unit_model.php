<?php
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class Unit_model  extends CI_model
{
    public function get_unit_all()
    {
        return $this->db->query("SELECT * FROM unit")->result_array();
    }

    public function get_unit_by_unit_type($unit_type)
    {
        return $this->db->query("SELECT * FROM unit WHERE unit_type=$unit_type")->result_array();
    }
    public function get_unit_byID($id_unit)
    {
        $this->db->select('*');
        $this->db->from('unit');
        $this->db->where('id_unit', $id_unit);
        return $this->db->get()->row_array();
    }
    public function delete_unit($id_unit)
    {
        $this->db->where('id_unit', $id_unit);
        $this->db->delete('unit');
    }

    public function add_unit($data)
    {
        $this->db->insert('unit', $data);
    }

    public function update_unit(
        $data,
        $id_unit
    ) {
        $this->db->update('unit', $data, ['id_unit' => $id_unit]);
        return $this->db->affected_rows();
    }
}
