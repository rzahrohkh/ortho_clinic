<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ClinicOpeningHours extends CI_Controller
{
    var $nameClass = "ClinicOpeningHours";

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        is_logged_in();
        $this->load->model('ClinicOpeningHours_model');
    }

    public function index()
    {
        $data['title'] = 'Jam Buka Praktek Klinik';
        $data['ClinicOpeningHours'] = $this->ClinicOpeningHours_model->get_clinic_opening_hours_all();
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/clinic_opening_hours/index', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }

    public function add()
    {
        $data['title'] = 'Tambah Jadwal Praktek';
        $this->formValidation();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/clinic_opening_hours/clinic_opening_hours_add', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $this->formField();
            $this->ClinicOpeningHours_model->add_clinic_opening_hours($this->data_input);
            swalSuccess('Ditambahkan', 'Jam Buka Praktek');

            redirect($this->nameClass);
        }
    }

    public function edit()
    {
        $data['title'] = 'Edit Jam Buka Praktek';
        $this->formValidation();
        $id = $this->uri->segment(3, 0);
        $data['dataEdit'] = $this->ClinicOpeningHours_model->get_clinic_opening_hours_byID($id);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/clinic_opening_hours/clinic_opening_hours_edit', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $this->formField($id);
            $id = $this->input->post('id_opening_hours', true);
            $this->ClinicOpeningHours_model->update_clinic_opening_hours($this->data_input, $id);
            swalSuccess('Diperbarui', 'Jam Buka Praktek');

            redirect($this->nameClass);
        }
    }

    public function delete($id)
    {
        $this->ClinicOpeningHours_model->delete_clinic_opening_hours($id);
        swalSuccess('Dihapus', 'Jam Buka Praktek');
        redirect($this->nameClass);
    }

    public function formValidation()
    {
        #field ??
        $this->form_validation->set_rules('opening_hours', 'Jam Buka', 'required', [
            'required'      => 'Jam buka wajib di isi'
        ]);

        $this->form_validation->set_rules('description_opening_hours', 'Deskripsi Jam Buka', 'required', [
            'required'      => 'Deskripsi Jam buka wajib di isi'
        ]);
    }
    // ??? nama field berdasarkan field name di view
    // penamaan dari nama kolom di database
    public function formField($id = NULL, $typeForm = NULL)
    {
        // ??? penamaan dari nama kolom di database
        $opening_hours = $this->input->post('opening_hours', true); // ??? nama kolom
        $description_opening_hours = $this->input->post('description_opening_hours', true);

        // kolom lainya ???
        $this->data_input = [
            'id_opening_hours' => $id ? $id : NULL,
            'opening_hours' => $opening_hours, // ??? nama kolom
            'description_opening_hours' => $description_opening_hours,
        ];

        // jika ada kolom created_date, created_by, modifed_date, modifed_by di Database
        // enable script ini addLog -> untuk tambah, editLog -> untuk edit

        // logDataMaster('addLog');
        // logDataMaster('editLog');
    }
}
