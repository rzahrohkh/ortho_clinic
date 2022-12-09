<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Section extends CI_Controller
{
    var $nameClass = "Section";

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        is_logged_in();
        $this->load->model('Section_model');
    }

    public function index()
    {
        $data['title'] = 'Section';
        $data['section'] = $this->Section_model->get_section_clinic_all();
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/section/index', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }

    // public function add()
    // {
    //     $data['title'] = 'Tambah ???';
    //     $this->formValidation();
    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates_dp/worker/header', $data);
    //         $this->load->view('templates_dp/worker/sidebar', $data);
    //         $this->load->view('dp/???/???_add', $data);
    //         $this->load->view('templates_dp/worker/footer', $data);
    //     } else {
    //         $this->formField();
    //         $this->Drugs_model->add_drugs($this->data_input);
    //         swalSuccess('Ditambahkan', '???');

    //         redirect($this->nameClass);
    //     }
    // }

    public function edit()
    {
        $data['title'] = 'Edit Section';
        $this->formValidation();
        $id = $this->uri->segment(3, 0);
        $data['dataEdit'] = $this->Section_model->get_section_clinic_byID($id);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/section/section_edit', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $id = $this->input->post('id_section', true);
            $this->formField($id);
            $this->Section_model->update_section_clinic($this->data_input, $id);
            swalSuccess('Diperbarui', 'Section');

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
        $this->form_validation->set_rules('type_section', 'Tipe Section', 'required', [
            'required'      => 'Tipe Section wajib di isi'
        ]);
        #field ??
        $this->form_validation->set_rules('description_section', 'Deskripsi Section', 'required', [
            'required'      => 'Tipe Section wajib di isi'
        ]);
    }
    // ??? nama field berdasarkan field name di view
    // penamaan dari nama kolom di database
    public function formField($id = NULL, $typeForm = NULL)
    {
        // ??? penamaan dari nama kolom di database
        $type_section = $this->input->post('type_section', true); // ??? nama kolom
        $description_section = $this->input->post('description_section', true);

        // kolom lainya ???
        $this->data_input = [
            'id_section' => $id ? $id : NULL,
            'type_section' => $type_section, // ??? nama kolom
            'description_section' => $description_section,
        ];
        // jika ada kolom created_date, created_by, modifed_date, modifed_by di Database
        // enable script ini addLog -> untuk tambah, editLog -> untuk edit

        // logDataMaster('addLog');
        // logDataMaster('editLog');
    }
}
