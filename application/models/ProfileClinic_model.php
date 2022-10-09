<?php
class ProfileClinic_model  extends CI_model
{
    public function getProfileClinic()
    {
        return $this->db->query("SELECT * FROM profile_clinic")->result_array();
    }
}
