<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ContactClinic extends CI_Controller
{
    var $nameClass = "ContactClinic";

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        is_logged_in();
        $this->load->model('Contact_model'); // model untuk koneksi ke database
    }

    public function index()
    {
        $data['title'] = 'Kontak Klinik';
        $data['contact'] = $this->Contact_model->get_contact_clinic_all();
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/contact/index', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }

    public function add()
    {
        $data['title'] = 'Tambah Kontak';
        $this->formValidation();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/contact/contact_add', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $this->formField();
            $this->Contact_model->add_contact_clinic($this->data_input);
            swalSuccess('Ditambahkan', 'Kontak');

            redirect($this->nameClass);
        }
    }

    public function edit()
    {
        $data['title'] = 'Edit Kontak';
        $this->formValidation();
        $id = $this->uri->segment(3, 0);
        $data['dataEdit'] = $this->Contact_model->get_contact_clinic_byID($id);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_dp/worker/header', $data);
            $this->load->view('templates_dp/worker/sidebar', $data);
            $this->load->view('dp/contact/contact_edit', $data);
            $this->load->view('templates_dp/worker/footer', $data);
        } else {
            $id = $this->input->post('id_contact', true);
            $this->formField($id);
            $this->Contact_model->update_contact_clinic($this->data_input, $id);
            swalSuccess('Diperbarui', 'Kontak');

            redirect($this->nameClass);
        }
    }

    public function delete($id)
    {
        $this->Contact_model->delete_contact_clinic($id);
        swalSuccess('Dihapus', 'Kontak');
        redirect($this->nameClass);
    }

    public function formValidation()
    {
        #field ??
        $this->form_validation->set_rules('title_contact', 'Nama Kontak', 'required', [
            'required'      => 'Nama Kontak wajib di isi'
        ]);


        #field ??
        $this->form_validation->set_rules('value_contact', 'Isi Kontak', 'required', [
            'required'      => 'Isi Kontak wajib di isi'
        ]);

        #field ??
        $this->form_validation->set_rules('type_contact', 'Tipe Kontak', 'required', [
            'required'      => 'Tipe Kontak wajib di isi'
        ]);

        #field ??
        $this->form_validation->set_rules('icon_contact', 'Icon Kontak', 'required', [
            'required'      => 'Icon Kontak wajib di isi'
        ]);

        #field ??
        $this->form_validation->set_rules('class', 'Class Kontak', 'required', [
            'required'      => 'Class Kontak wajib di isi'
        ]);
    }
    // // ??? nama field berdasarkan field name di view
    // // penamaan dari nama kolom di database
    public function formField($id = NULL, $typeForm = NULL)
    {
        // ??? penamaan dari nama kolom di database
        $title_contact = $this->input->post('title_contact', true); // ??? nama kolom
        $value_contact = $this->input->post('value_contact', true);
        $type_contact = $this->input->post('type_contact', true);
        $icon_contact = $this->input->post('icon_contact', true);
        $class = $this->input->post('class', true);

        // kolom lainya ???
        $this->data_input = [
            'id_contact' => $id ? $id : NULL,
            'title_contact' => $title_contact, // ??? nama kolom
            'value_contact' => $value_contact,
            'type_contact' => $type_contact,
            'icon_contact' => $icon_contact,
            'class' => $class,
        ];

        // jika ada kolom created_date, created_by, modifed_date, modifed_by di Database
        // enable script ini addLog -> untuk tambah, editLog -> untuk edit

        // logDataMaster('addLog');
        // logDataMaster('editLog');
    }
}
