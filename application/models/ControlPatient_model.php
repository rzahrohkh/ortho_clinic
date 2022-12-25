<?php
class ControlPatient_model  extends CI_model // sesui dengan nama tabel di db
{

    public function get_jumlah_notif($id_patient)
    {
        return $this->db->query("SELECT COUNT( id_control_patient ) jumlah_control FROM control_patient WHERE id_patient = $id_patient AND status_control='belum kontrol'")->row_array();
    }

    public function get_jadwal_control_by_id_patient($id_patient)
    {
        return $this->db->query("SELECT * FROM control_patient WHERE id_patient = $id_patient AND status_control='belum kontrol' ORDER BY id_patient DESC LIMIT 1")->row_array();
    }

    public function get_control_patient_all()
    {
        return $this->db->query("SELECT * FROM control_patient")->result_array();
    }

    public function get_control_patient_byID($id_control_patient)
    {
        $this->db->select('*');
        $this->db->from('control_patient');
        $this->db->where('id_control_patient', $id_control_patient);
        return $this->db->get()->row_array();
    }
    public function delete_control_patient($id_control_patient)
    {
        $this->db->where('id_control_patient', $id_control_patient);
        $this->db->delete('control_patient');
    }

    public function add_control_patient($data)
    {
        $this->db->insert('control_patient', $data);
    }

    public function update_control_patient(
        $data,
        $id_control_patient
    ) {
        $this->db->update('control_patient', $data, ['id_control_patient' => $id_control_patient]);
        return $this->db->affected_rows();
    }
}
