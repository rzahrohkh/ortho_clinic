<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PatientDrug extends CI_Controller
{
    var $nameClass = "PatientDrug";

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        is_logged_in();
        $this->load->model('PatientDrug_model');
        $this->load->model('PatientDrug_model');
    }

    public function index()
    {
        $data['title'] = 'Obat Anda';
        $this->formValidation();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/patient_drug/index', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        }else{
            $this->formField();
            swalSuccess('Ditambahkan', 'Obat Yang Anda Konsumsi');
            redirect('patient');
  
        }
    }

    public function formValidation()
    {
        #field ??
        $this->form_validation->set_rules('obat_pagi', 'Obat Pagi', 'required', [
            'required'      => 'Obat Pagi wajib di isi'
        ]);
        $this->form_validation->set_rules('obat_siang', 'Obat Siang', 'required', [
            'required'      => 'Obat Siang wajib di isi'
        ]);
        $this->form_validation->set_rules('obat_malam', 'Obat Malam', 'required', [
            'required'      => 'Obat Malam wajib di isi'
        ]);
    }
    // // ??? nama field berdasarkan field name di view
    // // penamaan dari nama kolom di database
    public function formField($id = NULL, $typeForm = NULL)
    {
        // ??? penamaan dari nama kolom di database
        $obat_pagi = $this->input->post('obat_pagi', true); 
        $obat_siang = $this->input->post('obat_siang', true); 
        $obat_malam = $this->input->post('obat_malam', true); 
        $obat=[$obat_pagi,$obat_siang, $obat_malam];
        $type=['Obat Pagi','Obat Siang','Obat Malam'];
        // kolom lainya ???
        for ($i=0; $i < sizeof($type) ; $i++) { 
            $this->data_input = [
            'id_drugs_patient' => $id ? $id : NULL,
            'id_patient' => $this->session->userdata('id_patient'), 
            'drug' => $obat[$i],
            'type' => $type[$i],
            'date_drugs_patient' => date('Y-m-d H:i:s'),
            ];
            $this->PatientDrug_model->add_drug_patient($this->data_input);
        }
        

        // jika ada kolom created_date, created_by, modifed_date, modifed_by di Database
        // enable script ini addLog -> untuk tambah, editLog -> untuk edit

        // logDataMaster('addLog');
        // logDataMaster('editLog');
    }

}
