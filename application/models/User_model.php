<?php
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class User_model extends CI_model
{
    public function get_user()
    {
        return $this->db->query("SELECT * FROM  user natural join role")->result_array();
    }
    public function get_user_byID($id_user)
    {
        return $this->db->query("SELECT * FROM  user where id_user=$id_user")->row_array();
    }

    public function get_user_and_role_byID($id_user)
    {
        return $this->db->query("SELECT * FROM  user LEFT JOIN role on user.role_id = role.role_id where id_user=$id_user")->row_array();
    }

    public function get_patient_and_role_byID($id_patient)
    {
        return $this->db->query("SELECT * FROM  patient LEFT JOIN role on patient.role_id = role.role_id where id_patient=$id_patient")->row_array();
    }
    public function delete_user($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('user');
    }


    public function add_user($data)
    {
        $this->db->insert('user', $data);
    }

    public function update_user(

        $data,
        $id_user

    ) {

        $this->db->update('user', $data, ['id_user  ' => $id_user]);
        return $this->db->affected_rows();
    }

    public function update_password_user($password_hash, $season_user)
    {
        $this->db->set('password', $password_hash);
        $this->db->where('id_user', $season_user);
        $this->db->update('user');
        return $this->db->affected_rows();
    }

    public function update_password_patient($password_hash, $season_patient)
    {
        $this->db->set('password_patient', $password_hash);
        $this->db->where('id_patient', $season_patient);
        $this->db->update('patient');
        return $this->db->affected_rows();
    }
}
