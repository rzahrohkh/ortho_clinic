<?php
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class DrugPatient_model  extends CI_model // sesui dengan nama tabel di db
{
    public function get_drug_patient_all()
    {
        return $this->db->query("SELECT * FROM drug_patient")->result_array();
    }
     public function get_detail_drug_patient_by_id_drug($type, $date_drugs_patient)
    {
        return $this->db->query("SELECT * FROM drug_patient WHERE type = '$type'  AND DATE(date_drugs_patient)=  DATE('$date_drugs_patient')")->row_array();
    }

     public function get_drug_patient_byID_patient($id_patient)
    {
        return $this->db->query("SELECT DISTINCT
	( date_drugs_patient )
FROM
	drug_patient 
WHERE
	id_patient = $id_patient 
ORDER BY
	id_drugs_patient")->result_array();
    }

     public function get_drug_patient_byID_patient_report_patient($id_patient)
    {
        return $this->db->query("SELECT 
	*
FROM
	drug_patient 
WHERE
	drug_patient.id_patient = $id_patient 
ORDER BY
	drug_patient.id_drugs_patient")->result_array();
    }
     public function get_id_patient_byID_patient($id_drugs_patient)
    {
        return $this->db->query("SELECT DISTINCT
	( id_patient ) 
FROM
	drug_patient 
WHERE
	id_drugs_patient = $id_drugs_patient 
ORDER BY
	id_drugs_patient")->row_array();
    }
    public function get_drug_patient_byID($id_drugs_patient)
    {
        $this->db->select('*');
        $this->db->from('drug_patient');
        $this->db->where('id_drugs_patient', $id_drugs_patient);
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
