<?php
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class MedicalRecord_model  extends CI_model // sesui dengan nama tabel di db
{
    public function get_medical_record_all()
    {
        return $this->db->query("SELECT * FROM medical_record")->result_array();
    }
    public function get_inspection_patient()
    {
        return $this->db->query("SELECT
	medical_record.*,
	patient.name_patient,
	user.name preInspectionBy,
	user1.name inspectionBy
FROM
	medical_record
	LEFT JOIN patient ON medical_record.id_patient = patient.id_patient 
	LEFT JOIN pre_medical_record ON pre_medical_record.id_pre_medical_record=medical_record.id_pre_medical_record
	LEFT JOIN user ON pre_medical_record.id_user=user.id_user
	LEFT JOIN user user1 ON medical_record.modifed_by=user1.id_user
WHERE
	status_medical_record IN ( 'belum diperiksa', 'resep belum dibuat' ) ORDER BY created_date DESC")->result_array();
    }
    public function get_medical_record_by_id_patient($id_patient)
    {
        return $this->db->query("SELECT medical_record.*, user.name FROM medical_record LEFT JOIN user ON medical_record.modifed_by = user.id_user WHERE medical_record.id_patient=$id_patient AND medical_record.status_medical_record IN ( 'sudah diperiksa', 'resep belum dibuat', 'resep sudah dibuat' ) ORDER BY medical_record.inspection_date DESC")->result_array();
    }
    public function get_last_id()
    {
        $result=1;
        $last_id =$this->db->query("SELECT MAX(id_pre_medical_record) id_pre_medical_record  FROM pre_medical_record")->row_array()['id_pre_medical_record'];
        if($last_id){
            $result=$last_id+1;
        }

        return $result;
    }
    public function get_medical_record_byID($id_medical_record)
    {
        return $this->db->query("SELECT 
	medical_record.id_medical_record,
	medical_record.inspection_date,
	medical_record.inspection_fees,
	medical_record.diagnosis,
	medical_record.type_handling,
	medical_record.status_medical_record,
	medical_record.handling,
	medical_record.id_patient,
	medical_record.created_by created_by_medical_record,
	medical_record.modifed_by modifed_by_medical_record,
    pre_medical_record.*,
	medical_record.created_date created_date_medical_record FROM  medical_record LEFT JOIN pre_medical_record ON medical_record.id_pre_medical_record=pre_medical_record.id_pre_medical_record WHERE medical_record.id_medical_record=$id_medical_record")->row_array();
    }
    public function delete_medical_record($id_medical_record)
    {
        $this->db->where('id_medical_record', $id_medical_record);
        $this->db->delete('medical_record');
    }

    public function add_medical_record($data)
    {
        $this->db->insert('medical_record', $data);
    }

    public function update_medical_record(
        $data,
        $id_medical_record
    ) {
        $this->db->update('medical_record', $data, ['id_medical_record' => $id_medical_record]);
        return $this->db->affected_rows();
    }

    public function get_medical_record_by_id_report_bydate($startDate, $endDate)
    {
        return $this->db->query("SELECT
	medical_record.id_medical_record,
	patient.name_patient,
	medical_record.inspection_date,
	medical_record.diagnosis,
	medical_record.type_handling,
	medical_record.status_medical_record,
	medical_record.handling,
	medical_record.inspection_fees,
	USER.NAME 
FROM
	medical_record
	LEFT JOIN USER ON medical_record.modifed_by = USER.id_user 
	LEFT JOIN patient ON patient.id_patient = medical_record.id_patient 
WHERE
medical_record.status_medical_record IN ( 'sudah diperiksa', 'resep belum dibuat', 'resep sudah dibuat' ) 
AND (inspection_date BETWEEN DATE('".$startDate."') AND DATE('".$endDate."') )
ORDER BY
	medical_record.inspection_date DESC")->result_array();
    }
}
