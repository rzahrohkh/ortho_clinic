<?php
class Patient_model  extends CI_model // sesui dengan nama tabel di db
{
    public function get_last_id()
    {
        return $this->db->query("SELECT
            DATE_FORMAT( DATE( NOW()), '%Y%m%d' ) date_now,
            LEFT ( last_id_patient, 8 ) date_last,
            RIGHT ( '201909020002', 4 )+ 1 number 
        FROM
            ( SELECT MAX( id_patient ) last_id_patient FROM patient ) a")->row_array();
    }

    public function get_patient_all()
    {
        return $this->db->query("SELECT
            * 
            FROM
            patient
            LEFT JOIN province ON province.id_province = patient.id_province
            LEFT JOIN city  ON city.id_city = patient.id_city
            LEFT JOIN district  ON district.id_district = patient.id_district")->result_array();
    }
    public function get_id_patient_new()
    {
        return $this->db->query("SELECT id_patient+1 id_patient FROM patient ORDER BY id_patient desc limit 1
")->row_array();
    }

    public function get_patient_byID($id_patient)
    {
        $this->db->select('*');
        $this->db->from('patient');
        $this->db->where('id_patient', $id_patient);
        return $this->db->get()->row_array();
    }
    public function delete_patient($id_patient)
    {
        $this->db->where('id_patient', $id_patient);
        $this->db->delete('patient');
    }

    public function add_patient($data)
    {
        $this->db->insert('patient', $data);
    }

    public function update_patient(
        $data,
        $id_patient
    ) {
        $this->db->update('patient', $data, ['id_patient' => $id_patient]);
        return $this->db->affected_rows();
    }
}
