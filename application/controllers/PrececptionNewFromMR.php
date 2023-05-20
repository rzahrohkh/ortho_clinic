<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class PrececptionNewFromMR extends CI_Controller
{
    var $nameClass = "PrececptionNewFromMR";
    var $uriParent="";
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
        $this->load->model('PrescriptionPatientDetail_model');
        $this->load->model('Drugs_model');
    }

    public function add()
    {

        $uri = $this->uri->segment(3, 0);
        $this->uriParent = $uri;
        $delimiter = '%7C';
        $words = explode($delimiter,$uri);
        $id_medical_record=$words[0];
        $id=$words[1];
       
        if($uri){
            $id_prescription=$this->PrescriptionPatient_model->get_prescription_patient_by_id_medical_record($id_medical_record)['id_prescription_patient'];
            if($id_prescription){
                $data['prescription'] = $this->PrescriptionPatient_model->get_prescription_patient_by_id($id_prescription);
                $data['id_prescription']=$id_prescription;
                $data['prescription_detail'] = $this->PrescriptionPatient_model->get_prescription_patient_detail_and_drug($id_prescription);
                $data['medical_record'] = $this->PrescriptionPatient_model->get_prescription_patient_and_medical_record_by_id($id_prescription);
                $this->id_patient= $data['prescription']['id_patient'];
                $data['countData']=count($data['prescription_detail']);
                $data['id']=$id;
                $data['uri']="$uri";
                $name_patient = $this->Patient_model->get_patient_byID($this->id_patient )["name_patient"];
                $data['title'] = "Buat Resep Pasien : $name_patient";
                $idDoctor=  $data['medical_record'] ["modifed_by_medical_record"];
                $idNurse=  $data['medical_record'] ["id_user"];
                $data['doctor'] = $this->User_model->get_user_byID($idDoctor);
                $data['nurse'] = $this->User_model->get_user_byID($idNurse);
            }
        }
      
        
        $data['drug'] = $this->Drugs_model->get_drugs();

        $data = $this->getDataUser($data);
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/prececption_new_fromMR/index', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }

    public function saveNewDrug()
    {
        $uri = $this->uri->segment(3, 0);
        $this->formField();
      
        $this->PrescriptionPatientDetail_model->add_prescription_patient_detail($this->data_input);
    
        swalSuccess('Ditambahkan', 'Penambahan Obat Pada Resep');

        $urlBack="PrececptionNewFromMR/add/$uri";
        redirect($urlBack);
        
    }
    public function save()
    {
        $id = $this->uri->segment(3, 0);

        $this->PrescriptionPatient_model->update_simpan_prescription_patient($id);
    
        swalSuccess('Disimpan', 'Resep');

        $urlBack="patientExamination";
        redirect($urlBack);
        
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
    public function delete()
    {   $uri = $this->uri->segment(3, 0);
        $this->uriParent = $uri;
        $delimiter = '_';
        $words = explode($delimiter,$uri);
        $id_prescription_detail=$words[0];
        $id_prescription=$words[1];


        $this->PrescriptionPatientDetail_model->delete_prescription_patient_detail($id_prescription_detail);
        swalSuccess('Dihapus', 'Obat');
        $urlBack="PrececptionNewFromMR/add/$words[1]";
        redirect($urlBack);
    }

    public function formValidation()
    {
        #field ??
        $this->form_validation->set_rules('name???', 'nama field ???', 'required', [
            'required'      => '??? wajib di isi'
        ]);
    }
    // ??? nama field berdasarkan field name di view
    // penamaan dari nama kolom di database
    public function formField($id = NULL, $typeForm = NULL)
    {
        // ??? penamaan dari nama kolom di database
        $id_drug = $this->input->post('id_drug', true); // ??? nama kolom
        $id_prescription_patient = $this->input->post('id_prescription_patient', true); // ??? nama kolom
        $dose = $this->input->post('dose', true);
        $amount_of_prescription = $this->input->post('amount_of_prescription', true);
        $note = $this->input->post('note', true);
        $usage_amount = $this->input->post('usage_amount', true);


        // kolom lainya ???
        $this->data_input = [
            'id_prescription_patient_detail' => $id ? $id : NULL,
            'id_prescription_patient' => $id_prescription_patient, // ??? nama kolom
            'id_drug' => $id_drug, // ??? nama kolom
            'dose' => $dose,
            'amount_of_prescription' => $amount_of_prescription,
            'note' => $note,
            'usage_amount' => $usage_amount,
        ];

  
    }
    
}
