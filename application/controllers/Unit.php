<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{
    var $nameClass = "Unit";

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        is_logged_in();
        $this->load->model('Unit_model');
    }

    public function index()
    {
        $data['title'] = 'Unit';
        $data['dataUnit'] = $this->Unit_model->get_unit_all();
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/unit/index', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }

    public function add()
    {
        $data['title'] = 'Tambah Unit';
        $this->formValidation();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/unit/unit_add', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $this->formField();
            $this->Unit_model->add_unit($this->data_input);
            swalSuccess('Ditambahkan', 'Unit');

            redirect($this->nameClass);
        }
    }

    public function edit()
    {
        $data['title'] = 'Edit Unit';
        $this->formValidation();
        $id = $this->uri->segment(3, 0);
        $data['dataEdit'] = $this->Unit_model->get_unit_byID($id);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/unit/unit_edit', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $id = $this->input->post('id_unit', true);
            $this->formField($id);
            $this->Unit_model->update_unit($this->data_input, $id);
            swalSuccess('Diperbarui', 'Unit');

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
        $this->form_validation->set_rules('unit_name', 'Nama Unit', 'required', [
            'required'      => 'Nama unit wajib di isi'
        ]);

        $this->form_validation->set_rules('unit_note', 'Catatan Uniit', 'required', [
            'required'      => 'Catatan unit wajib di isi'
        ]);

        $this->form_validation->set_rules('unit_abbreviation', 'Singkatan Unit', 'required', [
            'required'      => 'Singkatan unit wajib di isi'
        ]);

        $this->form_validation->set_rules('unit_type', 'Tipe Unit', 'required', [
            'required'      => 'Tipe unit wajib di isi'
        ]);
    }
    // ??? nama field berdasarkan field name di view
    // penamaan dari nama kolom di database
    public function formField($id = NULL, $typeForm = NULL)
    {
        // ??? penamaan dari nama kolom di database
        $unit_name = $this->input->post('unit_name', true); // ??? nama kolom
        $unit_note = $this->input->post('unit_note', true);
        $unit_abbreviation = $this->input->post('unit_abbreviation', true);
        $unit_type = $this->input->post('unit_type', true);

        // kolom lainya ???
        $this->data_input = [
            'id_unit' => $id ? $id : NULL,
            'unit_name' => $unit_name, // ??? nama kolom
            'unit_note' => $unit_note,
            'unit_abbreviation' => $unit_abbreviation,
            'unit_type' => $unit_type,
        ];

        // jika ada kolom created_date, created_by, modifed_date, modifed_by di Database
        // enable script ini addLog -> untuk tambah, editLog -> untuk edit

        // logDataMaster('addLog');
        // logDataMaster('editLog');
    }
}
