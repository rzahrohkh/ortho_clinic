<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ServiceClinic extends CI_Controller
{
    var $nameClass = "ServiceClinic";

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        is_logged_in();
        $this->load->model('ServiceClinic_model');
    }

    public function index()
    {
        $data['title'] = 'Pelayanan Klinik';
        $data['ServiceClinic'] = $this->ServiceClinic_model->get_service_clinic_all();
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/service_clinic/index', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }

    public function add()
    {
        $data['title'] = 'Tambah Pelayanan Klinik';
        $this->formValidation();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/service_clinic/service_add', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $this->formField();
            $this->ServiceClinic_model->add_service_clinic($this->data_input);
            swalSuccess('Ditambahkan', 'Pelayanan Klinik Baru');

            redirect($this->nameClass);
        }
    }

    public function edit()
    {
        $data['title'] = 'Edit Pelayanan Klinik';
        $this->formValidation();
        $id = $this->uri->segment(3, 0);
        $data['dataEdit'] = $this->ServiceClinic_model->get_service_clinic_byID($id);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/service_clinic/service_edit', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $this->formField($id);
            $id = $this->input->post('id_service_clinic', true);
            $this->ServiceClinic_model->update_service_clinic($this->data_input, $id);
            swalSuccess('Diperbarui', 'Pelayanan Klinik');

            redirect($this->nameClass);
        }
    }

    public function delete($id)
    {
        $this->ServiceClini->delete_service_clinic($id);
        swalSuccess('Dihapus', 'Pelayanan Klinik');
        redirect($this->nameClass);
    }

    public function formValidation()
    {
        #field ??
        $this->form_validation->set_rules('name_service_clinic', 'Nama Pelayanan Klinik', 'required', [
            'required'      => 'Nama pelayanan klinik wajib di isi'
        ]);

        $this->form_validation->set_rules('description_service_clinic', 'Deskripsi Pelayanan Klinik', 'required', [
            'required'      => 'Deskripsi Pelayanan Klinik wajib di isi'
        ]);

        $this->form_validation->set_rules('icon_service_clinic', 'Icon Pelayanan Klinik', 'required', [
            'required'      => 'Icon Pelayanan Klinik wajib di isi'
        ]);

        $this->form_validation->set_rules('color', 'Warna Pelayanan Klinik', 'required', [
            'required'      => 'Warna Pelayanan Klinik wajib di isi'
        ]);

        $this->form_validation->set_rules('data_aos_delay', 'Data AOS Delay', 'required', [
            'required'      => 'Data AOS Delay wajib di isi'
        ]);
    }
    // ??? nama field berdasarkan field name di view
    // penamaan dari nama kolom di database
    public function formField($id = NULL, $typeForm = NULL)
    {
        // ??? penamaan dari nama kolom di database
        $name_service_clinic = $this->input->post('name_service_clinic', true); // ??? nama kolom
        $description_service_clinic = $this->input->post('description_service_clinic', true);
        $icon_service_clinic = $this->input->post('icon_service_clinic', true);
        $color = $this->input->post('color', true);
        $data_aos_delay = $this->input->post('data_aos_delay', true);

        // kolom lainya ???
        $this->data_input = [
            'id_service_clinic' => $id ? $id : NULL,
            'name_service_clinic' => $name_service_clinic, // ??? nama kolom
            'description_service_clinic' => $description_service_clinic,
            'icon_service_clinic' => $icon_service_clinic,
            'color' => $color,
            'data_aos_delay' => $data_aos_delay,
        ];

        // jika ada kolom created_date, created_by, modifed_date, modifed_by di Database
        // enable script ini addLog -> untuk tambah, editLog -> untuk edit

        // logDataMaster('addLog');
        // logDataMaster('editLog');
    }
}
