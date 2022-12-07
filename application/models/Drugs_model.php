<?php
class Drugs_model  extends CI_model
{
    public function get_drugs()
    {
        return $this->db->query("SELECT * FROM drugs")->result_array();
    }
    public function get_drugs_byID($id_drugs)
    {
        $this->db->select('*');
        $this->db->from('drugs');
        $this->db->where('id_drug', $id_drugs);
        return $this->db->get()->row_array();
    }
    public function delete_drugs($id_drugs)
    {
        $this->db->where('id_drug', $id_drugs);
        $this->db->delete('drugs');
    }

    public function add_drugs($data)
    {
        $this->db->insert('drugs', $data);
    }

    public function update_drugs(
        $data,
        $id_drugs
    ) {
        $this->db->update('drugs', $data, ['id_drug' => $id_drugs]);
        return $this->db->affected_rows();
    }
}
