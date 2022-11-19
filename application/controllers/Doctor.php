<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Doctor extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$this->load->view('templates_dp/worker/header', $data);
		$this->load->view('templates_dp/worker/sidebar', $data);
		$this->load->view('dp/doctor/index', $data);
		$this->load->view('templates_dp/worker/footer', $data);
	}
}
