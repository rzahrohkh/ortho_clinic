<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class PatientActivity extends CI_Controller
{
    var $nameClass = "PatientActivity";
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        is_logged_in();
        $this->load->model('PatientActivity_model');
        $this->load->model('ActivityType_model');
        $this->load->model('ActivityQuestion_model');
    }

    public function index()
    {
        $data['title'] = 'Aktivitas';
        $data['dataActivityType']= $this->ActivityType_model->get_activity_type_all_asc();
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/patient_activity/patient_activity_add', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }
    public function save(){
        $dateActivityPatient=date('Y-m-d H:i:s');
        $idPatient=$this->session->userdata('id_patient');
        $idActivityPatient="{$idPatient}.{$dateActivityPatient}";
        $queryActivityType= $this->ActivityType_model->get_activity_type_all_asc();
        $countOfDataActivityQuestion=$this->ActivityQuestion_model->get_count_activity_question_By_id_activity_type();
        $dataAllActivityQuestion=$this->ActivityQuestion_model->get_activity_question_all();

        $dataAnswer=array();
         foreach ($dataAllActivityQuestion as $dataAllActivityQuestion){
            $idActivityType = $dataAllActivityQuestion['id_activity_type'];
            $id_activity_question=$dataAllActivityQuestion['id_activity_question'];
            $answer=$this->input->post($id_activity_question);
            array_push($dataAnswer,$answer);

        }
        if (in_array(!NULL, $dataAnswer)){
            $this->db->insert("activity_patient",[
            "id_activity_patient"=>$idActivityPatient,
            "id_patient"=>$idPatient,
            "date_activity_patient"=>$dateActivityPatient
             ]);

            foreach ($queryActivityType as $m){
            $idActivityType = $m['id_activity_type'];
            $dataActivityQuestion=$this->ActivityQuestion_model->get_activity_question_By_id_activity_type($idActivityType);
            foreach ($dataActivityQuestion as $dataActivityQuestion){
                    $id_activity_question=$dataActivityQuestion['id_activity_question'];
                    $answer=$this->input->post($id_activity_question);

                    $this->db->insert("activity_answer",[
                        "id_activity_answer"=>null,
                        "id_activity_question"=>$id_activity_question,
                        "answer"=>$answer,
                        "id_activity_patient"=>$idActivityPatient
                    ]);
                }
            }
            swalSuccess('Ditambahkan', 'Aktifitas Harian Anda');
            redirect("patient");
        }else{ 
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible show fade" role="alert">Aktivitas Wajib DiIsi</div>');
            redirect($this->nameClass);
        }

        
    
    }
}
