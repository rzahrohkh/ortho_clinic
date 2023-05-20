<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class Users extends CI_Controller
{
    var $nameClass = "Users";
    var $typeForm = "";

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        is_logged_in();
        $this->load->model('User_model');
        $this->load->model('Role_model');
        $this->load->model('WorkerPosition_model');
    }

    public function index()
    {
        $data['title'] = 'User(Karyawan)';
        $data['users'] = $this->User_model->get_user();
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/user/index', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }

    public function add()
    {
        $data['title'] = 'Tambah User';
        $this->formValidation();
        $data['role'] = $this->Role_model->get_role();
        $this->typeForm = "add";
        $data['workerPosition'] = $this->WorkerPosition_model->get_worker_position_clinic_all();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/user/user_add', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $this->formField();
            $this->User_model->add_user($this->data_input);
            swalSuccess('Ditambahkan', 'User');

            redirect($this->nameClass);
        }
    }

    public function edit()
    {
        $data['title'] = 'Edit User';
        $this->formValidation();
        $id = $this->uri->segment(3, 0);
        $this->typeForm = "edit";
        $data['dataEdit'] = $this->User_model->get_user_byID($id);
        $data['role'] = $this->Role_model->get_role();
        $data['workerPosition'] = $this->WorkerPosition_model->get_worker_position_clinic_all();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/user/user_edit', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $id = $this->input->post('id_user', true);
            $this->formField($id);

            $this->User_model->update_user($this->data_input, $id);
            swalSuccess('Diperbarui', 'User');

            redirect($this->nameClass);
        }
    }

    public function delete($id)
    {
        $this->User_model->delete_user($id);
        swalSuccess('Dihapus', 'User');
        redirect($this->nameClass);
    }

    public function formValidation()
    {
        #field ??
        $this->form_validation->set_rules('name', 'Nama User', 'required', [
            'required'      => 'Nama User wajib di isi'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required'      => 'Username wajib di isi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required'      => 'Password wajib di isi'
        ]);
        $this->form_validation->set_rules('role_id', 'Role User', 'required', [
            'required'      => 'Role User wajib di isi'
        ]);
        $this->form_validation->set_rules('is_active', 'Status Aktif User', 'required', [
            'required'      => 'Status Aktif User wajib di isi'
        ]);
        $this->form_validation->set_rules('date_of_birth', 'Tanggal Lahir', 'required', [
            'required'      => 'Tanggal Lahir wajib di isi'
        ]);
        $this->form_validation->set_rules('age', 'Umur', 'required', [
            'required'      => 'Umur wajib di isi'
        ]);
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required', [
            'required'      => 'Jenis Kelamin wajib di isi'
        ]);
        $this->form_validation->set_rules('address', 'Alamat', 'required', [
            'required'      => 'Alamat wajib di isi'
        ]);
    }
    // ??? nama field berdasarkan field name di view
    // penamaan dari nama kolom di database
    public function formField($id = NULL, $typeForm = NULL)
    {
        // ??? penamaan dari nama kolom di database
        $name = $this->input->post('name', true); // ??? nama kolom
        $username = $this->input->post('username', true);
        $password = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
        $role_id = $this->input->post('role_id', true);
        $is_active = $this->input->post('is_active', true);
        $date_of_birth = $this->input->post('date_of_birth', true);
        $age = $this->input->post('age', true);
        $gender = $this->input->post('gender', true);
        $address = $this->input->post('address', true);


        if ($this->typeForm == "add") {
            $this->data_input = [
                'id_user' => $id ? $id : NULL,
                'name' => $name, // ??? nama kolom
                'username' => $username,
                'password' => $password,
                'role_id' => $role_id,
                'is_active' => $is_active == "on" ? "1" : "0",
                'date_of_birth' => $date_of_birth,
                'age' => $age,
                'gender' => $gender,
                'address' => $address,

            ];
        }
        if ($this->typeForm == "edit") {
            $this->data_input = [
                'id_user' => $id ? $id : NULL,
                'name' => $name, // ??? nama kolom
                'username' => $username,
                'role_id' => $role_id,
                'is_active' => $is_active == "on" ? "1" : "0",
                'date_of_birth' => $date_of_birth,
                'age' => $age,
                'gender' => $gender,
                'address' => $address,

            ];
        }
        // kolom lainya ???


        // jika ada kolom created_date, created_by, modifed_date, modifed_by di Database
        // enable script ini addLog -> untuk tambah, editLog -> untuk edit

        // logDataMaster('addLog');
        // logDataMaster('editLog');
    }
}
