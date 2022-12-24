<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PatientControlScheduleManagement extends CI_Controller
{
    var $nameClass = "PatientControlScheduleManagement";

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        is_logged_in();
        $this->load->model('PatientControlScheduleManagement_model');
    }

    public function index()
    {
        $data['title'] = 'Manajemen Jadwal Kontrol Pasien';
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/patient_control_schedule_management/index', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }

    // public function add()
    // {
    //     $data['title'] = 'Tambah ???';
    //     $this->formValidation();
    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates_dp/worker/header', $data);
    //         $this->load->view('templates_dp/worker/sidebar', $data);
    //         $this->load->view('dp/???/???_add', $data);
    //         $this->load->view('templates_dp/worker/footer', $data);
    //     } else {
    //         $this->formField();
    //         $this->Drugs_model->add_drugs($this->data_input);
    //         swalSuccess('Ditambahkan', '???');

    //         redirect($this->nameClass);
    //     }
    // }

    // public function edit()
    // {
    //     $data['title'] = 'Edit ???';
    //     $this->formValidation();
    //     $id = $this->uri->segment(3, 0);
    //     $data['dataEdit'] = $this->???_model->get_???_byID($id);
    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates_dp/worker/header', $data);
    //         $this->load->view('templates_dp/worker/sidebar', $data);
    //         $this->load->view('dp/???/???_edit', $data);
    //         $this->load->view('templates_dp/worker/footer', $data);
    //     } else {
    //         $this->formField($id);
    //         $this->Drugs_model->update_drugs($this->data_input, $id);
    //         swalSuccess('Diperbarui', '???');

    //         redirect($this->nameClass);
    //     }
    // }

    // public function delete($id)
    // {
    //     $this->Drugs_model->delete_drugs($id);
    //     swalSuccess('Dihapus', '???');
    //     redirect($this->nameClass);
    // }

    // public function formValidation()
    // {
    //     #field ??
    //     $this->form_validation->set_rules('name???', 'nama field ???', 'required', [
    //         'required'      => '??? wajib di isi'
    //     ]);
    // }
    // // ??? nama field berdasarkan field name di view
    // // penamaan dari nama kolom di database
    // public function formField($id = NULL, $typeForm = NULL)
    // {
    //     // ??? penamaan dari nama kolom di database
    //     $drug_name = $this->input->post('drug_name', true); // ??? nama kolom
    //     $drug_type = $this->input->post('drug_type', true);
    //     $stock = $this->input->post('stock', true);
    //     $unit = $this->input->post('unit', true);
    //     $exp_date = $this->input->post('exp_date', true);
    //     $selling_price = $this->input->post('selling_price', true);
    //     $purchase_price = $this->input->post('purchase_price', true);


    //     // kolom lainya ???
    //     $this->data_input = [
    //         'id_???' => $id ? $id : NULL,
    //         'drug_name' => $drug_name, // ??? nama kolom
    //         'drug_type' => $drug_type,
    //         'stock' => $stock,
    //         'unit' => $unit,
    //         'exp_date' => $exp_date,
    //         'selling_price' => $selling_price,
    //         'purchase_price' => $purchase_price,
    //     ];

    //     // jika ada kolom created_date, created_by, modifed_date, modifed_by di Database
    //     // enable script ini addLog -> untuk tambah, editLog -> untuk edit

    //     // logDataMaster('addLog');
    //     // logDataMaster('editLog');
    // }

}
