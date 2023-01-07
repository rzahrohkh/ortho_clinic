<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Patient extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('ControlPatient_model');
		$this->load->model('User_model');
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$season_patient = $this->session->userdata('id_patient');
		$data['jumlahNotifScheduleControl'] = $this->ControlPatient_model->get_jumlah_notif($season_patient);
		$data['scheduleControlPatient'] = $this->ControlPatient_model->get_jadwal_control_by_id_patient($season_patient);
		$data['user'] = $this->User_model->get_patient_and_role_byID($season_patient);
		if($data['scheduleControlPatient']){
			$hariControl = date("D", strtotime($data['scheduleControlPatient']['date_control_patient']));
			$data['dayControlPatient'] = hari_ini($hariControl);
			$data['dateControlPatient'] = tgl_indo($data['scheduleControlPatient']['date_control_patient']);
		}
		$this->load->view('templates_dp/patient/header', $data);
		$this->load->view('templates_dp/worker/sidebar', $data);
		$this->load->view('dp/patient/index', $data);
		$this->load->view('templates_dp/patient/footer', $data);
	}
}
