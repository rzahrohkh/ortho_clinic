<?php
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class ViewPatientNurse_model  extends CI_model // sesui dengan nama tabel di db
{
    public function get_patient_all()
    {
        return $this->db->query("SELECT * FROM patient")->result_array();
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
