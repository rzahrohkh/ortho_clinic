<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ActivityType extends CI_Controller
{
    var $nameClass = "ActivityType";
    var $typeForm = "";

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        is_logged_in();
        $this->load->model('ActivityType_model');
    }

    public function index()
    {
        $data['title'] = 'Tipe Aktivitas';
        $data['activityType'] = $this->ActivityType_model->get_activity_type_all();
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/activity_type/index', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }

    public function add()
    {
        $data['title'] = 'Tambah Tipe Aktivitas';
        $this->formValidation();
        $this->typeForm = 'add';
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/activity_type/activity_type_add', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $this->formField();
            $this->ActivityType_model->add_activity_type($this->data_input);
            swalSuccess('Ditambahkan', 'Tipe Aktivitas');

            redirect($this->nameClass);
        }
    }

    public function edit()
    {
        $data['title'] = 'Edit Tipe Aktivitas';
        $this->formValidation();
        $id = $this->uri->segment(3, 0);
        $this->typeForm = 'edit';
        $data['dataEdit'] = $this->ActivityType_model->get_activity_type_byID($id);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/activity_type/activity_type_edit', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $this->formField($id);
            $this->ActivityType_model->update_activity_type($this->data_input, $id);
            swalSuccess('Diperbarui', 'Tipe Aktivitas');

            redirect($this->nameClass);
        }
    }

    public function delete($id)
    {
        $this->ActivityType_model->delete_activity_type($id);
        swalSuccess('Dihapus', 'Tipe Aktivitas');
        redirect($this->nameClass);
    }

    public function formValidation()
    {
        #field ??
        $this->form_validation->set_rules('activity_type', 'Tipe Aktivitas', 'required', [
            'required'      => 'Tipe aktivitas wajib di isi'
        ]);
    }
    // ??? nama field berdasarkan field name di view
    // penamaan dari nama kolom di database
    public function formField($id = NULL, $typeForm = NULL)
    {
        // ??? penamaan dari nama kolom di database
        $activity_type = $this->input->post('activity_type', true); // ??? nama kolom


        // kolom lainya ???
        $this->data_input = [
            'id_activity_type' => $id ? $id : NULL,
            'activity_type' => $activity_type, // ??? nama kolom
        ];

        // jika ada kolom created_date, created_by, modifed_date, modifed_by di Database
        // enable script ini addLog -> untuk tambah, editLog -> untuk edit

        if ($this->typeForm == 'add') {
            $this->data_input = logDataMaster('addLog', $this->data_input);
        }
        if ($this->typeForm == 'edit') {
            $this->data_input = logDataMaster('editLog', $this->data_input);
        }

        // logDataMaster('addLog');
        // logDataMaster('editLog');
    }
}
