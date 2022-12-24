<?php
class PatientActivity_model  extends CI_model // sesui dengan nama tabel di db
{
    public function get_activity_patient_all()
    {
        return $this->db->query("SELECT * FROM activity_patient")->result_array();
    }

    public function get_activity_patient_byID($id_activity_patient)
    {
        $this->db->select('*');
        $this->db->from('activity_patient');
        $this->db->where('id_activity_patient', $id_activity_patient);
        return $this->db->get()->row_array();
    }
    public function delete_activity_patient($id_activity_patient)
    {
        $this->db->where('id_activity_patient', $id_activity_patient);
        $this->db->delete('activity_patient');
    }

    public function add_activity_patient($data)
    {
        $this->db->insert('activity_patient', $data);
    }

    public function update_activity_patient(
        $data,
        $id_activity_patient
    ) {
        $this->db->update('activity_patient', $data, ['id_activity_patient' => $id_activity_patient]);
        return $this->db->affected_rows();
    }
}
