<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Masuk';
        $this->form_validation->set_rules('medicalRecordNumber', 'medicalRecordNumber', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/auth/header', $data);
            $this->load->view('dp/auth_user/index', $data);
            $this->load->view('templates_dp/auth/footer', $data);
        } else {
            $medicalRecordNumber = $this->input->post('medicalRecordNumber');
            $password = $this->input->post('password');
            $user = $this->db->get_where('patient', ['id_patient' => $medicalRecordNumber])->row_array();

            // jika usernya ada 
            if ($user) {
                // jika usernya aktif
                if ($user['is_active'] == 1) {
                    // cek pasword
                    if (password_verify($password, $user['password_patient'])) {
                        $data = [
                            'id_patient' => $user['id_patient'],
                            'role_id' => $user['role_id'] // menentukan menu
                        ];
                        $this->session->set_userdata($data);
                        $patient_role = 5;
                        if ($user['role_id'] == $patient_role) {
                            redirect('patient');
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akunmu belum aktif silahkan hubungi petugas klinik</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun tidak ada</div>');
                redirect('auth');
            }
        }
    }

    public function logout() // tugasnya mengembalikan login
    {

        $session_worker = $this->session->userdata('id_user');
        $session_patient = $this->session->userdata('id_patient');
        if ($session_worker) {
            $this->session->unset_userdata('id_user');
            $this->session->unset_userdata('role_id');
            $this->session->unset_userdata('id_patient');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah berhasil keluar</div>');
            redirect('worker');
        }
        if ($session_patient) {
            $this->session->unset_userdata('id_patient');
            $this->session->unset_userdata('role_id');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah berhasil keluar</div>');
            redirect('auth');
        }
    }
}
