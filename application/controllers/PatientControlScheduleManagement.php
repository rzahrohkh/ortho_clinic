<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PatientControlScheduleManagement extends CI_Controller
{
    var $nameClass = "PatientControlScheduleManagement";
    var $id_patient;
    var $typeForm;
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        is_logged_in();
        $this->load->model('Patient_model');
        $this->load->model('PatientControlScheduleManagement_model');
    }

    public function index()
    {
        $data['title'] = 'Manajemen Jadwal Kontrol Pasien';
        $data['patients'] = $this->Patient_model->get_patient_all();
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/patient_control_schedule_management/index', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }

    public function viewHistory() {
        $id = $this->uri->segment(3, 0);
        $this->id_patient=$id;
        $name_patient = $this->Patient_model->get_patient_byID($id )["name_patient"];
        $data['id']=$id;
        $data['title'] = "Riwayat Kontrol Pasien : $name_patient";
        $data['historyControl'] = $this->PatientControlScheduleManagement_model->get_control_patient_by_id_patient($id);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/patient_control_schedule_management/history_control', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $this->formField($id);
            $this->Drugs_model->update_drugs($this->data_input, $id);
            swalSuccess('Di tambahkan', 'Jadwal Control Pasien');

            redirect($this->nameClass);
        }
    }
    public function add()
     {
        $this->typeForm='add';
        $id = $this->uri->segment(3, 0);
        if($id){
            $name_patient = $this->Patient_model->get_patient_byID($id)['name_patient'];
            $data['id']=$id;
            $data['dataPatient'] = $this->Patient_model->get_patient_byID($id);
        }
        $data['title'] = "Tambah Jadwal Kontrol";
        
        $this->formValidation();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/patient_control_schedule_management/control_patient_add', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $this->formField();
            
            $this->PatientControlScheduleManagement_model->add_control_patient($this->data_input);
            swalSuccess('Ditambahkan', 'Jadwal Kontrol Pasien');

            redirect($this->nameClass);
        }
    }

    public function edit()
    {
        // var_dump($this->session->userdata('id_user'););
        // die;
        $this->typeForm='edit';
        $data['title'] = 'Edit Jadwal Kontrol';
        $this->formValidation();
        $id = $this->uri->segment(3, 0);
        if($id){
            $id_patient=$this->PatientControlScheduleManagement_model->get_control_patient_byID($id)['id_patient'];
            $name_patient = $this->Patient_model->get_patient_byID($id_patient)['name_patient'];
            $data['id']=$this->Patient_model->get_patient_byID($id_patient)['id_patient'];
            $data['dataPatient'] = $this->Patient_model->get_patient_byID($id_patient);
        }
        $data['dataEdit'] = $this->PatientControlScheduleManagement_model->get_control_patient_byID($id);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
             $this->load->view('dp/patient_control_schedule_management/control_patient_edit', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $this->formField($id);
            $id_control_patient = $this->input->post('id_control_patient', true);
            $this->PatientControlScheduleManagement_model->update_control_patient($this->data_input, $id_control_patient);
            swalSuccess('Diperbarui', 'Jadwal Kontrol Pasien');

            redirect($this->nameClass);
        }
    }

    public function delete($id)
    {
        $this->PatientControlScheduleManagement_model->delete_control_patient($id);
        swalSuccess('Dihapus', 'Jadwal Kontrol Pasien');
        redirect($this->nameClass);
    }

    public function formValidation()
    {
        #field ??
        $this->form_validation->set_rules('date_control_patient', 'Jadwal Kontrol Pasien', 'required', [
            'required'      => 'Jadwal Kontrol Pasien wajib di isi'
        ]);
    }

    // ??? nama field berdasarkan field name di view
    // penamaan dari nama kolom di database
    public function formField($id = NULL, $typeForm = NULL)
    {
    //     // ??? penamaan dari nama kolom di database
        $date_control_patient = $this->input->post('date_control_patient', true); // ??? nama kolom
        $id_patient = $this->input->post('id_patient', true);

        // kolom lainya ???
        $this->data_input = [
            'id_control_patient' => $id ? $id : NULL,
            'id_patient' => $id_patient, // ??? nama kolom
            'date_control_patient' => $date_control_patient, // ??? nama kolom
            'status_control' => "belum kontrol",
        ];

        // jika ada kolom created_date, created_by, modifed_date, modifed_by di Database
        // enable script ini addLog -> untuk tambah, editLog -> untuk edit
        if($this->typeForm=='add'){
            $created_date = date("Y-m-d h:i:s");
            $created_by = $this->session->userdata('id_user');
           $this->data_input = [
            'id_control_patient' => $id ? $id : NULL,
            'id_patient' => $id_patient, // ??? nama kolom
            'date_control_patient' => $date_control_patient, // ??? nama kolom
            'status_control' => "belum kontrol",
            'created_date' => $created_date,
            'created_by' => $created_by
        ];
        }
        if($this->typeForm=='edit'){
            $modifed_date = date("Y-m-d h:i:s");
            $modifed_by = $this->session->userdata('id_user');
            $this->data_input = [
            'id_patient' => $id_patient, // ??? nama kolom
            'date_control_patient' => $date_control_patient, // ??? nama kolom
            'status_control' => "belum kontrol",
             'modifed_date' => $modifed_date,
            'modifed_by' => $modifed_by
        ];
        }
       
    }

}
