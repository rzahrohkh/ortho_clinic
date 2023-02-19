<?php
class PreMedicalRecord_model  extends CI_model // sesui dengan nama tabel di db
{
    public function get_pre_medical_record_all()
    {
        return $this->db->query("SELECT * FROM pre_medical_record")->result_array();
    }

     public function get_pre_medical_record_by_id_patient($id_patient)
    {
        return $this->db->query("SELECT * FROM pre_medical_record where id_patient =$id_patient")->result_array();
    }
    public function get_last_id()
    {
        return $this->db->query("SELECT MAX(id_pre_medical_record) id_pre_medical_record  FROM pre_medical_record")->row_array()['id_pre_medical_record'];
    }

    public function get_pre_medical_record_byID($id_pre_medical_record)
    {
        $this->db->select('*');
        $this->db->from('pre_medical_record');
        $this->db->where('id_pre_medical_record', $id_pre_medical_record);
        return $this->db->get()->row_array();
    }
    public function delete_pre_medical_record($id_pre_medical_record)
    {
        $this->db->where('id_pre_medical_record', $id_pre_medical_record);
        $this->db->delete('pre_medical_record');
    }

    public function add_pre_medical_record($data)
    {
        $this->db->insert('pre_medical_record', $data);
    }

    public function update_pre_medical_record(
        $data,
        $id_pre_medical_record
    ) {
        $this->db->update('pre_medical_record', $data, ['id_pre_medical_record' => $id_pre_medical_record]);
        return $this->db->affected_rows();
    }
}
