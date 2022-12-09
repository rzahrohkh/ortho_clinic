<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LandingProfile extends CI_Controller
{
    var $nameClass = "LandingProfile";

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        is_logged_in();
        $this->load->model('LandingProfile_model');
    }

    public function index()
    {
        $data['title'] = 'Profil Klinik';
        $data['landingprofile'] = $this->LandingProfile_model->get_profile_clinic_all();
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/landing_profile/index', $data);
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
        $data['title'] = 'Edit Profil Klinik';
        $this->formValidation();
        $id = $this->uri->segment(3, 0);
        $data['dataEdit'] = $this->LandingProfile_model->get_profile_clinic_byID($id);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/landing_profile/landingprofile_edit', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $this->formField($id);
            $id = $this->input->post('id_profile', true);
            $this->LandingProfile_model->update_profile_clinic($this->data_input, $id);
            swalSuccess('Diperbarui', 'Profil Klinik');

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
        $this->form_validation->set_rules('description_profile', 'Deskripsi Profil', 'required', [
            'required'      => 'Deskripsi wajib di isi'
        ]);

        #field ??
        $this->form_validation->set_rules('operational_hour', 'Jam Operasional', 'required', [
            'required'      => 'Jam Operasional wajib di isi'
        ]);

        #field ??
        $this->form_validation->set_rules('customer_service', 'Pelayanan Klinik', 'required', [
            'required'      => 'Pelayanan Klinik wajib di isi'
        ]);
    }
    // ??? nama field berdasarkan field name di view
    // penamaan dari nama kolom di database
    public function formField($id = NULL, $typeForm = NULL)
    {
        // ??? penamaan dari nama kolom di database
        $description_profile = $this->input->post('description_profile', true); // ??? nama kolom
        $operational_hour = $this->input->post('operational_hour', true);
        $customer_service = $this->input->post('customer_service', true);

        // kolom lainya ???
        $this->data_input = [
            'id_profile' => $id ? $id : NULL,
            'description_profile' => $description_profile, // ??? nama kolom
            'operational_hour' => $operational_hour,
            'customer_service' => $customer_service,
        ];
        // jika ada kolom created_date, created_by, modifed_date, modifed_by di Database
        // enable script ini addLog -> untuk tambah, editLog -> untuk edit

        // logDataMaster('addLog');
        // logDataMaster('editLog');
    }
}
