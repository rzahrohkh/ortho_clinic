<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WorkerPosition extends CI_Controller
{
    var $nameClass = "WorkerPosition";

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        is_logged_in();
        $this->load->model('WorkerPosition_model');
    }

    public function index()
    {
        $data['title'] = 'Jabatan';
        $data['WorkerPosition'] = $this->WorkerPosition_model->get_worker_position_clinic_all();
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/worker_position/index', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }

    public function add()
    {
        $data['title'] = 'Tambah Jabatan';
        $this->formValidation();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/worker_position/position_add', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $this->formField();
            $this->WorkerPosition_model->add_worker_position_clinic($this->data_input);
            swalSuccess('Ditambahkan', 'Jabatan');

            redirect($this->nameClass);
        }
    }

    public function edit()
    {
        $data['title'] = 'Edit Jabatan';
        $this->formValidation();
        $id = $this->uri->segment(3, 0);
        $data['dataEdit'] = $this->WorkerPosition_model->get_worker_position_clinic_byID($id);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/worker_position/position_edit', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $id = $this->input->post('id_position', true);
            $this->formField($id);
            $this->WorkerPosition_model->update_worker_position_clinic($this->data_input, $id);
            swalSuccess('Diperbarui', 'Jabatan');

            redirect($this->nameClass);
        }
    }

    // public function delete($id)
    // {
    //     $this->Drugs_model->delete_drugs($id);
    //     swalSuccess('Dihapus', '???');
    //     redirect($this->nameClass);
    // }

    public function formValidation()
    {
        #field ??
        $this->form_validation->set_rules('position', 'Posisi Jabatan', 'required', [
            'required'      => 'Posisi jabatan wajib di isi'
        ]);
    }
    // ??? nama field berdasarkan field name di view
    // penamaan dari nama kolom di database
    public function formField($id = NULL, $typeForm = NULL)
    {
        // ??? penamaan dari nama kolom di database
        $position = $this->input->post('position', true); // ??? nama kolom

        // kolom lainya ???
        $this->data_input = [
            'id_position' => $id ? $id : NULL,
            'position' => $position, // ??? nama kolom
        ];

        // jika ada kolom created_date, created_by, modifed_date, modifed_by di Database
        // enable script ini addLog -> untuk tambah, editLog -> untuk edit

        // logDataMaster('addLog');
        // logDataMaster('editLog');
    }
}
