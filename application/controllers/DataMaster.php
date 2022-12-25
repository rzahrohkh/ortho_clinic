<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataMaster extends CI_Controller
{
    var $nameClass = "dataMaster";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Patient_model');
        $this->load->model('Role_model');
        $this->load->model('City_model');
        $this->load->model('District_model');
        $this->load->model('Province_model');
        $this->load->model('Subdistrict_model');
    }
    function index()
    {
    }
    function getDataCity()
    {
        $id_province = $this->input->post('id_province', true);
        echo json_encode($this->City_model->get_city_by_id_province($id_province));
    }

    function getDataDistrict()
    {
        $id_city = $this->input->post('id_city', true);
        echo json_encode($this->District_model->get_city_by_id_city($id_city));
    }

    function getDataSubDistrict()
    {
        $id_subdistirct = $this->input->post('id_subdistirct', true);
        echo json_encode($this->Subdistrict_model->get_city_by_id_subdistrict($id_subdistirct));
    }
}
