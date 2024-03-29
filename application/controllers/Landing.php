<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class Landing extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Contact_model');
        $this->load->model('Section_model');
        $this->load->model('ProfileClinic_model');
        $this->load->model('ServiceClinic_model');
        $this->load->model('Doctor_model');
        $this->load->model('LogoClinic_model');
    }

    public function index()
    {
        $data['title'] = 'Ortho Clinic';
        $data['contacts'] = $this->Contact_model->getContactSosmed();
        $data['email'] = $this->Contact_model->getContactByTitle('Email');
        $data['telepon'] = $this->Contact_model->getContactByTitle('Telepon Klinik');
        $data['alamat'] = $this->Contact_model->getContactByTitle('Alamat');
        $data['title_landing'] = $this->Section_model->getSectionByType('title_landing');
        $data['sub_title_landing'] = $this->Section_model->getSectionByType('sub_title_landing');
        $data['profileClinic'] = $this->ProfileClinic_model->getProfileClinic()[0];
        $data['serviceClinic'] = $this->ServiceClinic_model->getServiceClinic();
        $data['doctor'] = $this->Doctor_model->getDoctor();
        $data['logo'] = $this->LogoClinic_model->get_logo_clinic_byID(1);
        $this->load->view('templates_landing/header', $data);
        $this->load->view('templates_landing/navbar', $data);
        $this->load->view('landing/index', $data);
        $this->load->view('templates_landing/footer', $data);
    }
}
