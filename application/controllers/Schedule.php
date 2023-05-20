<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class Schedule extends CI_Controller
{
    var $nameClass = "Schedule";

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        is_logged_in();
        $this->load->model('Schedule_model');
        $this->load->model('WorkerPosition_model');
        $this->load->model('ClinicOpeningHours_model');
    }

    public function index()
    {
        $data['title'] = 'Jadwal Praktek Dokter';
        $data['Schedule'] = $this->Schedule_model->get_clinical_practice_schedule_all();
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/schedule/index', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }

    public function add()
    {
        $data['title'] = 'Tambah Jadwal Praktek';
        $data['WorkerPosition'] = $this->WorkerPosition_model->get_worker_position_clinic_all();
        $data['ClinicOpeningHours'] = $this->ClinicOpeningHours_model->get_clinic_opening_hours_all();
        $this->formValidation();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/schedule/schedule_add', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $this->formField();
            $this->Schedule_model->add_clinical_practice_schedule($this->data_input);
            swalSuccess('Ditambahkan', 'Jadwal Praktek');

            redirect($this->nameClass);
        }
    }

    public function edit()
    {
        $data['title'] = 'Edit Jadwal Praktek Dokter';
        $data['WorkerPosition'] = $this->WorkerPosition_model->get_worker_position_clinic_all();
        $data['ClinicOpeningHours'] = $this->ClinicOpeningHours_model->get_clinic_opening_hours_all();
        $this->formValidation();
        $id = $this->uri->segment(3, 0);
        $data['dataEdit'] = $this->Schedule_model->get_clinical_practice_schedule_byID($id);
        //         var_dump($data['dataEdit']);
        // die;
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/schedule/schedule_edit', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $id = $this->input->post('id_clinical_practice_schedule', true);
            $this->formField($id);
            $this->Schedule_model->update_clinical_practice_schedule($this->data_input, $id);
            swalSuccess('Diperbarui', 'Jadwal Praktek Dokter');

            redirect($this->nameClass);
        }
    }

    public function delete($id)
    {
        $this->Schedule_model->delete_clinical_practice_schedule($id);
        swalSuccess('Dihapus', 'Jadwal Praktek Dpkter');
        redirect($this->nameClass);
    }

    public function formValidation()
    {
        #field ??
        $this->form_validation->set_rules('day', 'Hari', 'required', [
            'required'      => 'Hari wajib di isi'
        ]);

        $this->form_validation->set_rules('id_opening_hours', 'Jam Buka', 'required', [
            'required'      => 'Jam Buka wajib di isi'
        ]);

        $this->form_validation->set_rules('id_position', 'Posisi', 'required', [
            'required'      => 'Posisi wajib di isi'
        ]);
    }
    // ??? nama field berdasarkan field name di view
    // penamaan dari nama kolom di database
    public function formField($id = NULL, $typeForm = NULL)
    {
        // ??? penamaan dari nama kolom di database
        $id_opening_hours = $this->input->post('id_opening_hours', true); // ??? nama kolom
        $day = $this->input->post('day', true);
        $id_position = $this->input->post('id_position', true);

        // kolom lainya ???
        $this->data_input = [
            'id_clinical_practice_schedule' => $id ? $id : NULL,
            'id_opening_hours' => $id_opening_hours, // ??? nama kolom
            'day' => $day,
            'id_position' => $id_position,
        ];

        // jika ada kolom created_date, created_by, modifed_date, modifed_by di Database
        // enable script ini addLog -> untuk tambah, editLog -> untuk edit

        // logDataMaster('addLog');
        // logDataMaster('editLog');
    }
}
