<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LogoClinic extends CI_Controller
{
    var $nameClass = "LogoClinic";

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        is_logged_in();
        $this->load->model('LogoClinic_model');
    }

    public function index()
    {
        $data['title'] = 'Logo Clinic';
        $data['Logo'] = $this->LogoClinic_model->get_logo_clinic_all();
        // var_dump( $data['Logo']);
        // die;
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/logo_clinic/index', $data);
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
        $data['title'] = 'Edit Logo';
        $this->formValidation();
        $id = $this->uri->segment(3, 0);
        $data['dataEdit'] = $this->LogoClinic_model->get_logo_clinic_byID($id);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/logo_clinic/logo_clinic_edit', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $this->formField($id);
            $this->LogoClinic_model->update_logo($this->data_input, $id);
            swalSuccess('Diperbarui', 'Logo');

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
        $this->form_validation->set_rules('logo', 'Logo', 'required', [
            'required'      => 'Logo wajib di isi'
        ]);
        $this->form_validation->set_rules('description', 'Deskripsi', 'required', [
            'required'      => 'Deskripsi wajib di isi'
        ]);
    }
    // ??? nama field berdasarkan field name di view
    // penamaan dari nama kolom di database
    public function formField($id = NULL, $typeForm = NULL)
    {
        // ??? penamaan dari nama kolom di database
        $logo = $this->input->post('logo', true); // ??? nama kolom
        $description = $this->input->post('description', true);

        // kolom lainya ???
        $this->data_input = [
            'id_logo' => $id ? $id : NULL,
            'logo' => $logo, // ??? nama kolom
            'description' => $logo,
        ];

        // jika ada kolom created_date, created_by, modifed_date, modifed_by di Database
        // enable script ini addLog -> untuk tambah, editLog -> untuk edit

        // logDataMaster('addLog');
        // logDataMaster('editLog');
    }
    
}
