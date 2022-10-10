<?php
class ServiceClinic_model  extends CI_model
{
    public function getServiceClinic()
    {
        $this->db->select('*');
        $this->db->from('service_clinic');
        return $this->db->get()->result_array();
    }
}
