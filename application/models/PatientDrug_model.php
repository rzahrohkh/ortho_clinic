<?php
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class PatientDrug_model  extends CI_model // sesui dengan nama tabel di db
{
    public function get_drug_patient_all()
    {
        return $this->db->query("SELECT * FROM drug_patient")->result_array();
    }

    public function get_drug_patient_byID($id_drugs_patient)
    {
        $this->db->select('*');
        $this->db->from('drug_patient');
        $this->db->where('id_sesuitabeldidb', $id_drugs_patient);
        return $this->db->get()->row_array();
    }
    public function delete_drug_patient($id_drugs_patient)
    {
        $this->db->where('id_drugs_patient', $id_drugs_patient);
        $this->db->delete('drug_patient');
    }

    public function add_drug_patient($data)
    {
        $this->db->insert('drug_patient', $data);
    }

    public function update_drug_patient(
        $data,
        $id_drugs_patient
    ) {
        $this->db->update('drug_patient', $data, ['id_drugs_patient' => $id_drugs_patient]);
        return $this->db->affected_rows();
    }
}
