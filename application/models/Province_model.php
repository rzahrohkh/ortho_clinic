<?php
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class Province_model  extends CI_model // sesui dengan nama tabel di db
{
    public function get_province_all()
    {
        return $this->db->query("SELECT * FROM province")->result_array();
    }

    public function get_province_byID($id_province)
    {
        $this->db->select('*');
        $this->db->from('province');
        $this->db->where('id_province', $id_province);
        return $this->db->get()->row_array();
    }
    public function delete_province($id_province)
    {
        $this->db->where('id_province', $id_province);
        $this->db->delete('province');
    }

    public function add_province($data)
    {
        $this->db->insert('province', $data);
    }

    public function update_province(
        $data,
        $id_province
    ) {
        $this->db->update('province', $data, ['id_province' => $id_province]);
        return $this->db->affected_rows();
    }
}
