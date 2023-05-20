<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('User_model');
    }

    public function index()
    {
        ini_set('memory_limit', '-1');
        $data['title'] = 'Profil';
        $season_user = $this->session->userdata('id_user');
        $season_patient = $this->session->userdata('id_patient');

        if ($season_user) {
            $data['user'] = $this->User_model->get_user_and_role_byID($season_user);
            $data['name'] = $data['user']["name"];
            $data['role'] = $data['user']["role"];
            $data['date_of_birth'] = $data['user']["date_of_birth"];
            $data['age'] = $data['user']["age"];
            $data['address'] = $data['user']["address"];
        } else if ($season_patient) {
            $data['user'] = $this->User_model->get_patient_and_role_byID($season_patient);
            $data['date_of_birth'] = $data['user']["date_of_birth_patient"];
            $data['name'] = $data['user']["name_patient"];
            $data['role'] = $data['user']["role"];
            $data['age'] = $data['user']["age_patient"];
            $data['address'] = $data['user']["address_patient"];
        }

        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/profile/index', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }

    public function changePassword()
    {
        $data['title'] = 'Profil';
        $season_user = $this->session->userdata('id_user');
        $season_patient = $this->session->userdata('id_patient');
        if ($season_user) {
            $data['user'] = $this->User_model->get_user_and_role_byID($season_user);
            $data['name'] = $data['user']["name"];
            $data['role'] = $data['user']["role"];
            $data['password'] = $data['user']["password"];
        } elseif ($season_patient) {
            $data['user'] = $this->User_model->get_patient_and_role_byID($season_patient);
            $data['name'] = $data['user']["name_patient"];
            $data['role'] = $data['user']["role"];
            $data['password'] = $data['user']["password_patient"];
        }


        $this->form_validation->set_rules('password_lama', 'Password lama', 'required|trim');
        $this->form_validation->set_rules('password_baru1', 'Password baru', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('password_baru2', 'Ulangi password baru', 'required|trim|min_length[5]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/profile/profile_change_password', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru1');
            $password_baru2 = $this->input->post('password_baru2');
            $isPasswordValid = password_verify($password_lama,  $data['password']);

            if (!$isPasswordValid) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password lama salah!</div>');
                redirect('profile/changePassword');
            } else {
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password baru tidak boleh sama dengan password lama!</div>');
                    redirect('profile/changePassword');
                } else if ($password_baru != $password_baru2) {
                    $this->session->set_flashdata('flash', 'Diubah');
                    $this->session->set_flashdata('data', 'Password');
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Ulangi password baru harus sama dengan password baru</div>');
                    redirect('profile/changePassword');
                } else {
                    # password yg benar
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                    if ($season_user) {
                        $is_success_updated_password = $this->User_model->update_password_user($password_hash, $season_user);
                    } else if ($season_patient) {
                        $is_success_updated_password = $this->User_model->update_password_patient($password_hash, $season_patient);
                    }
                    if ($is_success_updated_password) {
                        $this->session->set_flashdata('flash', 'Diubah');
                        $this->session->set_flashdata('data', 'Password');
                        $this->session->set_flashdata('message', '<div class="alert alert-success" style="background-color: green;" role="alert"> Password berhasil diubah!</div>');
                    } else
                    if (!$is_success_updated_password) {
                        $this->session->set_flashdata('flash', 'Diubah');
                        $this->session->set_flashdata('data', 'Password');
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" style="background-color: green;" role="alert"> Password gagal berhasil diubah!</div>');
                    }

                    redirect('profile');
                }
            }
        }
    }
}
