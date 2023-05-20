<?php
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class ProfileClinic_model  extends CI_model
{
    public function getProfileClinic()
    {
        return $this->db->query("SELECT * FROM profile_clinic")->result_array();
    }
}
