<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Patient extends CI_Controller
{


	public function index()
	{
		$data['title'] = 'Dashboard';
		$this->load->view('templates_dp/patient/header', $data);
		$this->load->view('templates_dp/patient/sidebar', $data);
		$this->load->view('dp/patient/index', $data);
		$this->load->view('templates_dp/patient/footer', $data);
	}
}
