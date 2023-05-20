<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class ViewPatientHistory extends CI_Controller
{
    var $nameClass = "ViewPatientHistory";

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        is_logged_in();
        $this->load->model('ViewPatientNurse_model');
        $this->load->model('Patient_model');
        $this->load->model('DrugPatient_model');
        $this->load->model('PrescriptionPatient_model');
        $this->load->model('User_model');
        $this->load->model('ActivityPatient_model');
        $this->load->model('MedicalRecord_model');
    }

    public function index()
    {
        $data['title'] = 'Lihat Riwayat Pasien';
        $data['patients'] = $this->Patient_model->get_patient_all();
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/view_history_patient/index', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }

    public function detailPatient(){
        $id = $this->uri->segment(3, 0);
        $this->id_patient=$id;
        $data['data']=$this->Patient_model->get_patient_byID($id);
        $name_patient = $data['data']["name_patient"];
        $data['id']=$id;
        $data['title'] = "Detail Pasien : $name_patient";

		$data = $this->getDataUser($data);
		$this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/view_history_patient/detail_patient', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }

    public function viewHistory() {
        $id = $this->uri->segment(3, 0);
        $this->id_patient=$id;
        $name_patient = $this->Patient_model->get_patient_byID($id )["name_patient"];
        $data['id']=$id;
        $data['title'] = "Riwayat Kontrol Pasien : $name_patient";
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }
    public function checkDataUser(){
       
    }

    public function historyMedicine(){
        $id = $this->uri->segment(3, 0);
        $this->id_patient=$id;
        $name_patient = $this->Patient_model->get_patient_byID($id )["name_patient"];
        $data['id']=$id;
        $data['title'] = "Obat Yang Dikonsumsi Pasien : $name_patient";
        $data['medicines'] = $this->DrugPatient_model->get_drug_patient_byID_patient($id);
        $data = $this->getDataUser($data);
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/view_history_patient_medicine/index', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }

    public function detailMedicine(){
        $uri = $this->uri->segment(3, 0);
        $delimiter = '%7C';
        $words = explode($delimiter,$uri);
        $date=$words[0];
        $id=$words[1];
        $this->id_patient= $id;
        $name_patient = $this->Patient_model->get_patient_byID($this->id_patient)["name_patient"];
        $data['id']=$this->id_patient;
        $data['title'] = "Detail Yang Dikonsumsi Pasien : $name_patient";
        $data['detailMedicines'] = $this->DrugPatient_model->get_drug_patient_byID_patient($id);
        $data = $this->getDataUser($data);
        $data['obat_pagi']=$this->DrugPatient_model->get_detail_drug_patient_by_id_drug( "Obat Pagi", $date)  ["drug"];
        $data['obat_siang']=$this->DrugPatient_model->get_detail_drug_patient_by_id_drug( "Obat Siang", $date) ["drug"];
        $data['obat_malam']=$this->DrugPatient_model->get_detail_drug_patient_by_id_drug( "Obat Malam", $date) ["drug"];
        $data['data']=$this->Patient_model->get_patient_byID($this->id_patient);
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/view_history_patient_medicine/detailMedicine', $data);
        $this->load->view('templates_dp/worker/footer', $data);
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

    public function historyPrescription(){
        $id = $this->uri->segment(3, 0);
        $this->id_patient=$id;
        $name_patient = $this->Patient_model->get_patient_byID($id )["name_patient"];
        $data['id']=$id;
        $data['title'] = "Riwayat Resep Pasien : $name_patient";
        $data['prescription'] = $this->PrescriptionPatient_model->get_prescription_patient_by_patient($id);
        $data = $this->getDataUser($data);
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/view_history_patient_prescription/index', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }
    
    public function detailPrescription(){
        $uri = $this->uri->segment(3, 0);
        $delimiter = '%7C';
        $words = explode($delimiter,$uri);
        $id_prescription=$words[0];
        $id=$words[1];
        $this->id_patient= $id;
        $data['prescription'] = $this->PrescriptionPatient_model->get_prescription_patient_by_id($id_prescription);
        $data['prescription_detail'] = $this->PrescriptionPatient_model->get_prescription_patient_detail_and_drug($id_prescription);
        $name_patient = $this->Patient_model->get_patient_byID($this->id_patient )["name_patient"];
        $data['id']=$id;
        $data['title'] = "Detail Resep Resep Pasien : $name_patient";
        $data['medical_record'] = $this->PrescriptionPatient_model->get_prescription_patient_and_medical_record_by_id($id_prescription);
        $idDoctor=  $data['medical_record'] ["modifed_by_medical_record"];
        $idNurse=  $data['medical_record'] ["id_user"];
        $data['doctor'] = $this->User_model->get_user_byID($idDoctor);
        $data['nurse'] = $this->User_model->get_user_byID($idNurse);
        $data = $this->getDataUser($data);
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/view_history_patient_prescription/detailPreception', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }

    public function historyActivity(){
        $id = $this->uri->segment(3, 0);
        $this->id_patient=$id;
        $name_patient = $this->Patient_model->get_patient_byID($id)["name_patient"];
        $data['id']=$id;
        $data['activities'] = $this->ActivityPatient_model->get_activity_answer_all_by_id_patient($id);
        $data['title'] = "Riwayat Aktifitas Pasien : $name_patient";
        $data = $this->getDataUser($data);
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/view_history_patient_activity/index', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }

    public function detailActivities(){
        $uri = $this->uri->segment(3, 0);
        $delimiter = '.';
        $words = explode($delimiter,$uri);
        $id =str_replace("%"," ",$uri);
        if(strpos($id, " 20") !== false){
            $id =str_replace(" 20"," ",$id);
        }
    
        $this->id_patient= $words[0];
        $name_patient = $this->Patient_model->get_patient_byID($this->id_patient)["name_patient"];
        $data['id']=$this->id_patient;
        $data['id_activity_patient']=$id;
        $data['title'] = "Detail Aktifitas Pasien : $name_patient";
        $data = $this->getDataUser($data);
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/view_history_patient_activity/detailActivities', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }

    public function historyMedicalRecord(){
        $id = $this->uri->segment(3, 0);
        $this->id_patient=$id;
        $name_patient = $this->Patient_model->get_patient_byID($id)["name_patient"];
        $data['id']=$id;
        $data['medicalRecord'] = $this->MedicalRecord_model->get_medical_record_by_id_patient($id);
        $data['title'] = "Riwayat Rekam Medis Pasien : $name_patient";
        $data = $this->getDataUser($data);
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/view_history_patient_medical_record/index', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }

     public function detailMedicalRecord(){
        $id = $this->uri->segment(3, 0);
        $data['medicalRecord'] = $this->MedicalRecord_model->get_medical_record_byID($id);
        $this->id_patient=$data['medicalRecord']['id_patient'];
        $name_patient = $this->Patient_model->get_patient_byID($this->id_patient)["name_patient"];
        $idDoctor=  $data['medicalRecord'] ["modifed_by_medical_record"];
        $idNurse=  $data['medicalRecord'] ["id_user"];
        $data['doctor'] = $this->User_model->get_user_byID($idDoctor);
        $data['nurse'] = $this->User_model->get_user_byID($idNurse);
        $data['id']=$this->id_patient;
        $data['inspectionFee']=rupiah($data['medicalRecord']['inspection_fees']);
        $data['title'] = "Detail Rekam Medis Pasien : $name_patient";
        $data = $this->getDataUser($data);
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/view_history_patient_medical_record/detailMedicalRecord', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }
}
