<?php
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class ServiceClinic_model  extends CI_model
{
    public function getServiceClinic()
    {
        $this->db->select('*');
        $this->db->from('service_clinic');
        return $this->db->get()->result_array();
    }

    public function get_service_clinic_all()
    {
        return $this->db->query("SELECT * FROM service_clinic")->result_array();
    }

    public function get_service_clinic_byID($id_service_clinic)
    {
        $this->db->select('*');
        $this->db->from('service_clinic');
        $this->db->where('id_service_clinic', $id_service_clinic);
        return $this->db->get()->row_array();
    }

    public function delete_service_clinic($id_service_clinic)
    {
        $this->db->where('id_service_clinic', $id_service_clinic);
        $this->db->delete('service_clinic');
    }

    public function add_service_clinic($data)
    {
        $this->db->insert('service_clinic', $data);
    }

    public function update_service_clinic(
        $data,
        $id_service_clinic
    ) {
        $this->db->update('service_clinic', $data, ['id_service_clinic' => $id_service_clinic]);
        return $this->db->affected_rows();
    }
}
