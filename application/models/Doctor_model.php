<?php
class Doctor_model  extends CI_model
{
    public function getDoctor()
    {
        return $this->db->query("SELECT * 
        FROM user 
        NATURAL JOIN
        worker_position_clinic 
        WHERE
        role_id ='2' 
        AND is_dev != 1")->result_array();
    }
}
