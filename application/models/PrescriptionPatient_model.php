<?php
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class PrescriptionPatient_model  extends CI_model // sesui dengan nama tabel di db
{
    public function get_prescription_patient_all()
    {
        return $this->db->query("SELECT * FROM prescription_patient")->result_array();
    }
     public function get_prescription_patient_by_id_medical_record($id_medical_record)
    {
        return $this->db->query("SELECT * FROM prescription_patient WHERE id_medical_record=$id_medical_record")->row_array();
    }
    public function update_simpan_prescription_patient($id_prescription_patient)
    {

       $this->db->update('prescription_patient', ["status" => "Disimpan"], ['id_prescription_patient' => $id_prescription_patient]);
       $id_medical_record=$this->db->query("SELECT * FROM prescription_patient WHERE id_prescription_patient =$id_prescription_patient")->row_array()["id_medical_record"];
       $this->db->update('medical_record', ["status_medical_record" => "resep sudah dibuat"], ['id_medical_record' => $id_medical_record]);
        return $this->db->affected_rows();
    }
    public function get_prescription_patient_and_medical_record_by_id($id)
    {
        return $this->db->query("SELECT prescription_patient.id_prescription_patient,
	prescription_patient.id_medical_record,
	prescription_patient.created_by created_by_prescription,
	prescription_patient.created_date created_date_prescription, 
	medical_record.inspection_date,
	medical_record.diagnosis,
	medical_record.type_handling,
	medical_record.status_medical_record,
	medical_record.handling,
	medical_record.id_patient,
	medical_record.inspection_fees,
	medical_record.created_by created_by_medical_record,
	medical_record.modifed_by modifed_by_medical_record,
    pre_medical_record.*,
	medical_record.created_date created_date_medical_record FROM prescription_patient LEFT JOIN medical_record ON prescription_patient.id_medical_record = medical_record.id_medical_record LEFT JOIN pre_medical_record ON medical_record.id_pre_medical_record=pre_medical_record.id_pre_medical_record WHERE prescription_patient.id_prescription_patient=$id")->row_array();
    }

    public function get_prescription_patient_by_patient($id_patient)
    {
        return $this->db->query("SELECT * FROM prescription_patient NATURAL JOIN user WHERE id_patient = $id_patient ORDER BY id_prescription_patient DESC")->result_array();
    }

    public function get_prescription_patient_detail($id_prescription_patient)
    {
        return $this->db->query("SELECT * FROM prescription_patient NATURAL JOIN prescription_patient_detail NATURAL JOIN drugs WHERE id_prescription_patient=$id_prescription_patient")->result_array();
    }
    public function get_prescription_patient_detail_and_drug($id_prescription_patient)
    {
        return $this->db->query("SELECT
	* 
FROM
	prescription_patient
	LEFT JOIN  prescription_patient_detail ON prescription_patient.id_prescription_patient=prescription_patient_detail.id_prescription_patient
	LEFT JOIN drugs ON drugs.id_drug=prescription_patient_detail.id_drug
WHERE
	prescription_patient_detail.id_prescription_patient=$id_prescription_patient")->result_array();
    }

    public function get_prescription_patient_byID($id_prescription_patient)
    {
        $this->db->select('*');
        $this->db->from('prescription_patient');
        $this->db->where('id_prescription_patient', $id_prescription_patient);
        return $this->db->get()->row_array();
    }
    
    public function delete_prescription_patient($id_prescription_patient)
    {
        $this->db->where('id_prescription_patient', $id_prescription_patient);
        $this->db->delete('prescription_patient');
    }

    public function add_prescription_patient($data)
    {
        $this->db->insert('prescription_patient', $data);
    }

    public function update_prescription_patient(
        $data,
        $id_prescription_patient
    ) {
        $this->db->update('prescription_patient', $data, ['id_prescription_patient' => $id_prescription_patient]);
        return $this->db->affected_rows();
    }

    public function get_prescription_patient_by_id($id_prescription_patient)
    {
        return $this->db->query("SELECT * FROM prescription_patient WHERE id_prescription_patient = $id_prescription_patient ORDER BY id_prescription_patient DESC")->row_array();
    }
}
