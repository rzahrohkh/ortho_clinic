<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class LogoClinic extends CI_Controller
{
    var $nameClass = "LogoClinic";
    var $dataEdit;
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        is_logged_in();
        $this->load->model('LogoClinic_model');
    }

    public function index()
    {
        $data['title'] = 'Logo Clinic';
        $data['Logo'] = $this->LogoClinic_model->get_logo_clinic_all();
        // var_dump( $data['Logo']);
        // die;
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/logo_clinic/index', $data);
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

    public function edit()
    {
        $data['title'] = 'Edit Logo';
        $this->formValidation();
        $id = $this->uri->segment(3, 0);
        $data['dataEdit'] = $this->LogoClinic_model->get_logo_clinic_byID($id);
        $this->dataEdit=$data['dataEdit'];
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/logo_clinic/logo_clinic_edit', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $this->formField($id);
            $id_logo = $this->input->post('id_logo', true);
            // $this->LogoClinic_model->update_logo_clinic($this->data_input, $id_logo);
            $this->db->where('id_logo', $id_logo);  
            $this->db->update('logo_clinic');  
           
            if($this->db->affected_rows()){
                swalSuccess('Diperbarui', 'Logo');
                redirect($this->nameClass);
            }
           
        }
    }

    public function formValidation()
    {
        #field ??
        // $this->form_validation->set_rules('image', 'Logo', 'required', [
        //     'required'      => 'Logo wajib di isi'
        // ]);
        $this->form_validation->set_rules('description', 'Deskripsi', 'required', [
            'required'      => 'Deskripsi wajib di isi'
        ]);
    }
    // ??? nama field berdasarkan field name di view
    // penamaan dari nama kolom di database
    public function formField($id = NULL, $typeForm = NULL)
    {
        // ??? penamaan dari nama kolom di database
       $upload_image = $_FILES['image']['name'];
        $new_image='';
        if ($upload_image) {
            $config['allowed_types'] = 'svg|gif|jpg|png|xml|ico';
            $config['max_size']      = '2048';
            $config['upload_path']   = './assets/images/logo/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $this->dataEdit['logo'];
                if ($old_image != 'logo.svg') {
                    unlink(FCPATH . 'assets/images/logo/' . $old_image);
                }


                $new_image = $this->upload->data('file_name');
                $this->db->set('logo', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $description = $this->input->post('description', true);
        $this->db->set('description', $description);
        // kolom lainya ???
        $this->data_input = [
            'id_logo' => $id ? $id : NULL,
            'logo' => $new_image, // ??? nama kolom
            'description' => $description,
        ];

        // jika ada kolom created_date, created_by, modifed_date, modifed_by di Database
        // enable script ini addLog -> untuk tambah, editLog -> untuk edit

        // logDataMaster('addLog');
        // logDataMaster('editLog');
    }
    
}
