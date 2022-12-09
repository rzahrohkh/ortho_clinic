<?php
class Section_model  extends CI_model // sesui dengan nama tabel di db
{
    public function get_section_clinic_all()
    {
        return $this->db->query("SELECT * FROM section_clinic")->result_array();
    }

    public function get_section_clinic_byID($id_section)
    {
        $this->db->select('*');
        $this->db->from('section_clinic');
        $this->db->where('id_section', $id_section);
        return $this->db->get()->row_array();
    }
    // public function delete_namatabel($id_sesuitabeldidb)
    // {
    //     $this->db->where('id_sesuitabeldidb', $id_sesuitabeldidb);
    //     $this->db->delete('namatabel');
    // }

    // public function add_namatabel($data)
    // {
    //     $this->db->insert('namatabel', $data);
    // }

    public function update_section_clinic(
        $data,
        $id_section
    ) {
        $this->db->update('section_clinic', $data, ['id_section' => $id_section]);
        return $this->db->affected_rows();
    }

    public function getSectionByType($typeSection)
    {
        $this->db->select('*');
        $this->db->from('section_clinic');
        $this->db->where('type_section', $typeSection);
        return $this->db->get()->row_array();
    }
}
