<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ActivityQuestion extends CI_Controller
{
    var $nameClass = "ActivityQuestion";
    var $typeForm = "";

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        is_logged_in();
        $this->load->model('ActivityQuestion_model');
        $this->load->model('ActivityType_model');
    }

    public function index()
    {
        $data['title'] = 'Pertanyaan Aktivitas';
        $data['activityQuestion'] = $this->ActivityQuestion_model->get_activity_question_all();
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/activity_question/index', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }

    public function add()
    {
        $data['title'] = 'Tambah Pertanyaan Aktivitas';
        $data['activityType'] = $this->ActivityType_model->get_activity_type_all();
        $this->formValidation();
        $this->typeForm = 'add';
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/activity_question/activity_question_add', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $this->formField();
            $this->ActivityQuestion_model->add_activity_question($this->data_input);
            swalSuccess('Ditambahkan', 'Pertanyaan Aktivitas');

            redirect($this->nameClass);
        }
    }

    public function edit()
    {
        $data['title'] = 'Edit Pertanyaan Aktivitas';
        $data['activityType'] = $this->ActivityType_model->get_activity_type_all();
        $this->formValidation();
        $id = $this->uri->segment(3, 0);
        $this->typeForm = 'edit';
        $data['dataEdit'] = $this->ActivityQuestion_model->get_activity_question_byID($id);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/activity_question/activity_question_edit', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $id = $this->input->post('id_activity_question', true);
            $this->formField($id);
            $this->ActivityQuestion_model->update_activity_question($this->data_input, $id);
            swalSuccess('Diperbarui', 'Pertanyaan Aktivitas');

            redirect($this->nameClass);
        }
    }

    public function delete($id)
    {
        $this->ActivityQuestion_model->delete_activity_question($id);
        swalSuccess('Dihapus', 'Pertanyaan Aktivitas');
        redirect($this->nameClass);
    }

    public function formValidation()
    {
        #field ??
        $this->form_validation->set_rules('activity_question', 'Pertanyaan Aktivitas', 'required', [
            'required'      => 'Pertanyaan Aktivitas wajib di isi'
        ]);
        $this->form_validation->set_rules('id_activity_type', 'Tipe Aktivitas', 'required', [
            'required'      => 'Tipe Aktivitas wajib di isi'
        ]);

        // $this->form_validation->set_rules('id_activity_type', 'Tipe Aktivitas', 'required', [
        //     'required'      => 'Tipe Aktivitas wajib di isi'
        // ]);
    }
    // ??? nama field berdasarkan field name di view
    // penamaan dari nama kolom di database
    public function formField($id = NULL, $typeForm = NULL)
    {
        // ??? penamaan dari nama kolom di database
        $activity_question = $this->input->post('activity_question', true); // ??? nama kolom
        $id_activity_type = $this->input->post('id_activity_type', true); // ??? nama kolom

        // kolom lainya ???
        $this->data_input = [
            'id_activity_question' => $id ? $id : NULL,
            'activity_question' => $activity_question, // ??? nama kolom
            'id_activity_type' => $id_activity_type,
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
