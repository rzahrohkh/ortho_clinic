<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PrePatientExamination extends CI_Controller
{
    var $nameClass = "PrePatientExamination";

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        is_logged_in();
        $this->load->model('PreMedicalRecord_model');
        $this->load->model('MedicalRecord_model');
        $this->load->model('Patient_model');
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['title'] = 'Pemeriksaan Awal Pasien';
        $data['patients'] = $this->Patient_model->get_patient_all();
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/pre_patient_examination/index', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }
    function listPrePatientExamination(){
        $id = $this->uri->segment(3, 0);
        $this->id_patient=$id;
        $data['data']=$this->Patient_model->get_patient_byID($id);
        $data['preMedicalRecord']=$this->PreMedicalRecord_model->get_pre_medical_record_by_id_patient($id);
        $name_patient = $data['data']["name_patient"];
        $data['id']=$id;
        $data['title'] = "Detail Pasien : $name_patient";

		$data = $this->getDataUser($data);
		$this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/pre_patient_examination/pre_patient_examination_list', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }
    public function add()
    {
        $data['title'] = 'Buat Pemeriksaan Awal';
        $id = $this->uri->segment(3, 0);
        if($id){
             $data['id']=$this->Patient_model->get_patient_byID($id)['id_patient'];
        }
       
       
        $this->formValidation();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/pre_patient_examination/pre_patient_examination_add', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $this->formField();
            $this->PreMedicalRecord_model->add_pre_medical_record($this->data_input);
          
            $id_patient = $this->data_input['id_patient'];
           
            $id_pre_medical_record = $this->data_input['id_pre_medical_record'];
            $dataMedicalRecord = [
            'id_medical_record' =>   $this->MedicalRecord_model->get_last_id(),
            'inspection_date' => date("Y-m-d"), // ??? nama kolom
            'diagnosis' => NULL,
            'type_handling' => "Rawat Jalan",
            'id_patient' => $id_patient,
            'created_date' => date("Y-m-d h:i:s"),
            'created_by' => $this->session->userdata('id_user'),
            'modifed_by' =>NULL,
            'modifed_date' =>NULL,
            'status_medical_record' =>"belum diperiksa",
            'handling' =>NULL,
            'id_pre_medical_record' =>$id_pre_medical_record,
            'inspection_fees' =>NULl,
                
        ];

            $this->MedicalRecord_model->add_medical_record($dataMedicalRecord);
            swalSuccess('Dibuat', 'Pemeriksaan awal');
            

            redirect("$this->nameClass/listPrePatientExamination/$id_patient");
        }
    }

    public function edit()
    {
        $data['title'] = 'Edit Pemeriksaan Awal';
        $this->formValidation();
        $id = $this->uri->segment(3, 0);
        $data['dataEdit'] = $this->PreMedicalRecord_model->get_pre_medical_record_byID($id);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/pre_patient_examination/pre_patient_examination_edit', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $this->formField($id);
            $this->PreMedicalRecord_model->update_pre_medical_record($this->data_input, $id);
            swalSuccess('Diperbarui', 'Pemeriksaan awal');

            redirect($this->nameClass);
        }
    }

    public function delete($id)
    {
        $this->PreMedicalRecord_model->delete_pre_medical_record($id);
        swalSuccess('Dihapus', 'Pemeriksaan awal');
        redirect($this->nameClass);
    }

    public function formValidation()
    {
        #field ??
        $this->form_validation->set_rules('tension', 'nama field Tensi pasien', 'required', [
            'required'      => 'Tensi pasien wajib di isi'
        ]);
        $this->form_validation->set_rules('blood_sugar', 'nama field Gula Darah', 'required', [
            'required'      => 'Gula Darah pasien wajib di isi'
        ]);
        $this->form_validation->set_rules('weight', 'nama field Berat Badan', 'required', [
            'required'      => 'Berat Badan pasien wajib di isi'
        ]);
        $this->form_validation->set_rules('gout', 'nama field Asam Urat', 'required', [
            'required'      => 'Asam Urat pasien wajib di isi'
        ]);
        $this->form_validation->set_rules('cholesterol', 'nama field Kolestrol', 'required', [
            'required'      => 'Kolestrol pasien wajib di isi'
        ]);
        $this->form_validation->set_rules('medicine_allergy', 'nama field Alergi Obat', 'required', [
            'required'      => 'Alergi Obat pasien wajib di isi'
        ]);
    }
    // ??? nama field berdasarkan field name di view
    // penamaan dari nama kolom di database
    public function formField($id = NULL, $typeForm = NULL,  $id_patient = NULL)
    {
        // ??? penamaan dari nama kolom di database
        $last_id=$this->PreMedicalRecord_model->get_last_id();
        if(!$last_id){
            $id_pre_medical_record=1;
        }
        if($last_id){
            $id_pre_medical_record=$last_id+1;
        }
        $tension = $this->input->post('tension', true); // ??? nama kolom
        $blood_sugar = $this->input->post('blood_sugar', true);
        $weight = $this->input->post('weight', true);
        $gout = $this->input->post('gout', true);
        $cholesterol = $this->input->post('cholesterol', true);
        $medicine_allergy = $this->input->post('medicine_allergy', true);
        $patient_complaints = $this->input->post('patient_complaints', true);
        $id_user=$this->session->userdata('id_user');
        $id_patient=$this->input->post('id_patient', true);

        // kolom lainya ???
        $this->data_input = [
            'id_pre_medical_record' => $id_pre_medical_record ? $id_pre_medical_record : NULL,
            'tension' => $tension, // ??? nama kolom
            'blood_sugar' => $blood_sugar,
            'weight' => $weight,
            'gout' => $gout,
            'cholesterol' => $cholesterol,
            'medicine_allergy' => $medicine_allergy,
            'patient_complaints' => $patient_complaints,
            'id_user' => $id_user,
            'id_patient' => $id_patient
        ];

        // jika ada kolom created_date, created_by, modifed_date, modifed_by di Database
        // enable script ini addLog -> untuk tambah, editLog -> untuk edit

        // logDataMaster('addLog');
        // logDataMaster('editLog');
    }
    public function getDataUser(array $data)
	{
		$season_user = $this->session->userdata('id_user');
		$season_patient = $this->session->userdata('id_patient');
		if ($season_user) {
			$data['user'] = $this->db->query("SELECT * FROM user natural join role where id_user=$season_user")->row_array();
			$data['name'] = $this->db->get_where('user', ['id_user' => $season_user])->row_array()["name"];
			$data['role'] = $data['user']["role"];
			$data['date_of_birth'] = $data['user']["date_of_birth"];
			$data['age'] = $data['user']["age"];
			$data['address'] = $data['user']["address"];

		} elseif ($season_patient) {
			$data['user'] = $this->db->query("Select * FROM patient natural join role where id_patient=$season_patient")->row_array();
			$data['name'] = $this->db->get_where('patient', ['id_patient' => $season_patient])->row_array()["name_patient"];
			$data['role'] = $data['user']["role"];
			$data['age'] = $data['user']["age_patient"];
			$data['address'] = $data['user']["address_patient"];

		}

		$data['dataUser'] = $this->db->query("SELECT * FROM user NATURAL JOIN role where id_user=$season_user")->row_array();
		return $data;
	}
}
