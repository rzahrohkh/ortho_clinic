<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PatientMaster extends CI_Controller
{
    var $nameClass = "PatientMaster";
    var $typeForm = "";

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        is_logged_in();
        $this->load->model('Patient_model');
        $this->load->model('Role_model');
        $this->load->model('City_model');
        $this->load->model('District_model');
        $this->load->model('Province_model');
        $this->load->model('Subdistrict_model');
    }

    public function index()
    {
        $data['title'] = 'Pasien';
        $data['patients'] = $this->Patient_model->get_patient_all();
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/masterPatient/index', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }

    public function add()
    {
        $data['title'] = 'Tambah Pasien';
        $this->formValidation();
        $this->typeForm = 'add';
        $lastData=$this->Patient_model->get_last_id();
        $newNumber =$lastData["number"];
        $tengah="";
        if(((int) $newNumber)<10){
            $tengah="000{$newNumber}";
        }
        if(((int) $newNumber)<100 &&((int) $newNumber)>10){
            $tengah="00{$newNumber}";
        }
        if(((int) $newNumber)<1000 &&((int) $newNumber)>100){
             $tengah=+$newNumber;
        }
        $data['id_patient'] = "{$lastData['date_now']}{$tengah}{$newNumber}";
        // var_dump($data['id_patient']);
        // die;
        $data['province'] = $this->Province_model->get_province_all();
        $data['role'] = $this->Role_model->get_role();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/masterPatient/patient_add', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $this->formField();
            $this->Patient_model->add_patient($this->data_input);
            swalSuccess('Ditambahkan', 'Pasien');

            redirect($this->nameClass);
        }
    }

    public function edit()
    {
        $data['title'] = 'Edit Pasien';
        $this->formValidation();
        $id = $this->uri->segment(3, 0);
        $this->typeForm = 'edit';
        $data['role'] = $this->Role_model->get_role();
        $data['dataEdit'] = $this->Patient_model->get_patient_byID($id);

        if ($this->form_validation->run() == false) {
            $data['province'] = $this->Province_model->get_province_all();
            $data['city'] = $this->City_model->get_city_by_id_province($data['dataEdit']['id_province']);
            $data['district'] = $this->District_model->get_city_by_id_city($data['dataEdit']['id_city']);

            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/masterPatient/patient_edit', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $id = $this->input->post('id_patient', true);
            $this->formField($id);
            $this->Patient_model->update_patient($this->data_input, $id);
            swalSuccess('Diperbarui', 'Pasien');

            redirect($this->nameClass);
        }
    }

    public function delete($id)
    {
        $this->Patient_model->delete_patient($id);
        swalSuccess('Dihapus', 'Pasien');
        redirect($this->nameClass);
    }

    public function formValidation()
    {
        #field ??
        $this->form_validation->set_rules('name_patient', 'Nama Pasien', 'required', [
            'required'      => 'Nama Pasient wajib di isi'
        ]);
        $this->form_validation->set_rules('nik_patient', 'Nik Pasien', 'required', [
            'required'      => 'Nik Pasien wajib di isi'
        ]);
        $this->form_validation->set_rules('date_of_birth_patient', 'Tanggal Lahir Pasien', 'required', [
            'required'      => 'Tanggal Lahir  wajib di isi'
        ]);
        $this->form_validation->set_rules('gender_patient', 'Jenis Kelamin Pasien', 'required', [
            'required'      => 'Jenis Kelamin Pasien wajib di isi'
        ]);
        $this->form_validation->set_rules('address_patient', 'Alamat Pasien', 'required', [
            'required'      => 'Alamat Pasien wajib di isi'
        ]);
        // $this->form_validation->set_rules('id_province', 'Provinsi Pasien', 'required', [
        //     'required'      => 'Provinsi Pasien wajib di isi'
        // ]);
        // $this->form_validation->set_rules('id_city', 'Kota/Kabupaten Pasien', 'required', [
        //     'required'      => 'Kota/Kabupaten  Pasien wajib di isi'
        // ]);
        // $this->form_validation->set_rules('id_district', 'Kecamatan Pasien', 'required', [
        //     'required'      => 'Kecamatan Pasien wajib di isi'
        // ]);
        $this->form_validation->set_rules('phone_patient', 'Nomor Telepon Pasien', 'required', [
            'required'      => 'Nomor Telepon Pasien wajib di isi'
        ]);
        $this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan Pasien', 'required', [
            'required'      => 'Status Perkawinan Pasien wajib di isi'
        ]);
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan Pasien', 'required', [
            'required'      => 'Pekerjaan Pasien wajib di isi'
        ]);
    }
    // ??? nama field berdasarkan field name di view
    // penamaan dari nama kolom di database
    public function formField($id = NULL, $typeForm = NULL)
    {
        // ??? penamaan dari nama kolom di database

        $id_patient = $this->input->post('id_patient', true);
        $name_patient = $this->input->post('name_patient', true);
        $nik_patient = $this->input->post('nik_patient', true);
        $password_patient = password_hash("klinik123", PASSWORD_DEFAULT);
        $date_of_birth_patient = $this->input->post('date_of_birth_patient', true);
        $age_patient = $this->input->post('age_patient', true);
        $gender_patient = $this->input->post('gender_patient', true);
        $address_patient = $this->input->post('address_patient', true);
        $role_id = "5";

        $id_province = $this->input->post('id_province', true);
        $id_city = $this->input->post('id_city', true);
        $id_district = $this->input->post('id_district', true);
        $is_active = $this->input->post('is_active', true);
        $phone_patient = $this->input->post('phone_patient', true);
        $status_perkawinan = $this->input->post('status_perkawinan', true);
        $pekerjaan = $this->input->post('pekerjaan', true);


        // kolom lainya ???
        $this->data_input = [
            'id_patient' => $id_patient,
            'name_patient' => $name_patient, // ??? nama kolom
            'nik_patient' => $nik_patient,
            'password_patient' => $password_patient,
            'date_of_birth_patient' => $date_of_birth_patient,
            'age_patient' => $age_patient,
            'gender_patient' => $gender_patient,
            'address_patient' => $address_patient,
            'role_id' => $role_id,
            'id_province' => $id_province,
            'id_city' => $id_city,
            'phone_patient' => $phone_patient,
            'status_perkawinan' => $status_perkawinan,
            'pekerjaan' => $pekerjaan,
            'id_district' => $id_district,
            'is_active' => $is_active == "on" ? "1" : "0",


        ];

        // jika ada kolom created_date, created_by, modifed_date, modifed_by di Database
        // enable script ini addLog -> untuk tambah, editLog -> untuk edit
        if ($this->typeForm == 'add') {
            $this->data_input = logDataMaster('addLog', $this->data_input);
        }
        if ($this->typeForm == 'edit') {
            $this->data_input = logDataMaster('editLog', $this->data_input);
        }
    }
}
