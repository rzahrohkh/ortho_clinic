<?php
class PrescriptionPatientDetail_model  extends CI_model // sesui dengan nama tabel di db
{
    public function get_prescription_patient_detail_all()
    {
        return $this->db->query("SELECT * FROM prescription_patient_detail")->result_array();
    }

    public function get_prescription_patient_detail_byID($id_prescription_patient_detail)
    {
        $this->db->select('*');
        $this->db->from('prescription_patient_detail');
        $this->db->where('id_prescription_patient_detail', $id_prescription_patient_detail);
        return $this->db->get()->row_array();
    }
    public function delete_prescription_patient_detail($id_prescription_patient_detail)
    {
        $this->db->where('id_prescription_patient_detail', $id_prescription_patient_detail);
        $this->db->delete('prescription_patient_detail');
    }

    public function add_prescription_patient_detail($data)
    {
        $this->db->insert('prescription_patient_detail', $data);
    }

    public function update_prescription_patient_detail(
        $data,
        $id_prescription_patient_detail
    ) {
        $this->db->update('prescription_patient_detail', $data, ['id_prescription_patient_detail' => $id_prescription_patient_detail]);
        return $this->db->affected_rows();
    }
}
