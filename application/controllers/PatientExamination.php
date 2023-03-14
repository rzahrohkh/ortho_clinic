<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PatientExamination extends CI_Controller
{
    var $nameClass = "PatientExamination";

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        is_logged_in();
        $this->load->model('MedicalRecord_model');
        $this->load->model('User_model');
        $this->load->model('Patient_model');
        $this->load->model('PreMedicalRecord_model');
        $this->load->model('PrescriptionPatient_model');
        $this->load->model('Drugs_model');
    }

    public function index()
    {
        $data['title'] = 'Pemeriksaan Pasien';
        $data['inspections'] = $this->MedicalRecord_model->get_inspection_patient();
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/patient_examination/index', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }

    public function add()
    {
        $data['title'] = 'Tambah Resep';
        $this->formValidation();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            // $this->load->view('dp/patient_examination/patient_examination_add', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $this->formField();
            $this->Drugs_model->add_drugs($this->data_input);
            swalSuccess('Ditambahkan', 'Diagnosa');

            redirect($this->nameClass);
        }
    }

    public function edit()
    {
        $data['title'] = 'Pemeriksaan Pasien';
        $this->formValidation();
        $id = $this->uri->segment(3, 0);
        $data['dataEdit'] = $this->MedicalRecord_model->get_medical_record_byID($id);
        if ($data['dataEdit']) {
            $idPatient=$data['dataEdit']['id_patient'];
            $idPreMedicalRecord=$data['dataEdit']['id_pre_medical_record'];
            $data['patient'] = $this->Patient_model->get_patient_byID($idPatient);
            $data['preMedicalRecord'] = $this->PreMedicalRecord_model->get_pre_medical_record_byID($idPreMedicalRecord);
            $idNurse=  $data['preMedicalRecord'] ["id_user"];
            $data['nurse'] = $this->User_model->get_user_byID($idNurse);
        }
        if ($id) {
            $data['id'] = $id;
        }
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/patient_examination/patient_examination_edit', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $id_medical_record = $this->input->post('id_medical_record', true);
            $this->formField($id_medical_record,'edit');
            $modifed_date = date("Y-m-d h:i:s");
			$modifed_by = $this->session->userdata('id_user');
			$dataModifedBy =[
				'modifed_date' => $modifed_date,
				'modifed_by' => $modifed_by
			];
            $this->data_input=$this->data_input+$dataModifedBy;
            $id_user = $this->session->userdata('id_user');
            $this->MedicalRecord_model->update_medical_record($this->data_input, $id_medical_record);
           
            $id_patient = $this->MedicalRecord_model->get_medical_record_byID($id_medical_record)["id_patient"];
            $preceptionPatient=[
                'id_prescription_patient' =>"",
                'id_user' => $id_user,
                'date_prescription_patient' => $this->data_input['inspection_date'],
                'status' => "Belum Input Resep",
                'id_patient'=>$id_patient,
                'modifed_by' => $id_user,
                'modified_date' => $modifed_date,
                'created_by' => $id_user,
                'created_date' => $modifed_date,
                'id_medical_record' => $id_medical_record,
            ];
            $this->PrescriptionPatient_model->add_prescription_patient($preceptionPatient);
            swalSuccess('Dibuat', 'Pemeriksaan');

            $urlAddPreception="PrececptionNewFromMR/add/$id_medical_record|$id_patient";
            redirect($urlAddPreception);
        }
    }

    public function delete($id)
    {
        $this->Drugs_model->delete_drugs($id);
        swalSuccess('Dihapus', 'Pemeriksaan');
        redirect($this->nameClass);
    }

    public function formValidation()
    {
        #field ??
        $this->form_validation->set_rules('diagnosis', 'Diagnosa', 'required', [
            'required'      => 'Diagnosa wajib di isi'
        ]);
        $this->form_validation->set_rules('handling', 'Penanganan', 'required', [
            'required'      => 'Penanganan pasien wajib di isi'
        ]);
         $this->form_validation->set_rules('inspection_fees', 'inspection_fees', 'required', [
            'required'      => 'Biaya Pemeriksaan pasien wajib di isi'
        ]);
    }
    // ??? nama field berdasarkan field name di view
    // penamaan dari nama kolom di database
    public function formField($id = NULL, $typeForm = NULL)
    {
        // ??? penamaan dari nama kolom di database
        $id_medical_record = $this->input->post('id_medical_record', true); // ??? nama kolom
        $diagnosis = $this->input->post('diagnosis', true);
        $type_handling = "Rawat Jalan";
        $status_medical_record = 'resep belum dibuat';
        $handling = $this->input->post('handling', true);
        $inspection_fees = $this->input->post('inspection_fees', true);

        // kolom lainya ???
        $this->data_input = [
            'id_medical_record' => $id ? $id : $id_medical_record,
            'inspection_date' => date("Y-m-d"), 
            'diagnosis' => $diagnosis,
            'type_handling' => $type_handling,
            'status_medical_record' =>  $status_medical_record,
            'handling' => $handling,
            'inspection_fees' => $inspection_fees,
         
        ];
        if ($typeForm == 'addLog') {
			$created_date = date("Y-m-d h:i:s");
			$created_by = $this->session->userdata('id_user');
			array_merge($this->data_input, [
				'created_date' => $created_date,
				'created_by' => $created_by
			]);
		}
		if ($typeForm == 'edit') {
			$modifed_date = date("Y-m-d h:i:s");
			$modifed_by = $this->session->userdata('id_user');
			array_merge($this->data_input, [
				'modifed_date' => $modifed_date,
				'modifed_by' => $modifed_by
			]);
		}
    }
    
}
