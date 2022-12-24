<?php
class PatientDrug_model  extends CI_model // sesui dengan nama tabel di db
{
    public function get_drug_patient_all()
    {
        return $this->db->query("SELECT * FROM drug_patient")->result_array();
    }

    public function get_drug_patient_byID($id_sesuitabeldidb)
    {
        $this->db->select('*');
        $this->db->from('drug_patient');
        $this->db->where('id_sesuitabeldidb', $id_sesuitabeldidb);
        return $this->db->get()->row_array();
    }
    public function delete_drug_patient($id_sesuitabeldidb)
    {
        $this->db->where('id_sesuitabeldidb', $id_sesuitabeldidb);
        $this->db->delete('drug_patient');
    }

    public function add_drug_patient($data)
    {
        $this->db->insert('drug_patient', $data);
    }

    public function update_drug_patient(
        $data,
        $id_sesuitabeldidb
    ) {
        $this->db->update('drug_patient', $data, ['id_sesuitabeldidb' => $id_sesuitabeldidb]);
        return $this->db->affected_rows();
    }
}
