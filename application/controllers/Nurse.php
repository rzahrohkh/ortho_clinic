<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nurse extends CI_Controller
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
		$this->load->view('dp/nurse/index', $data);
		$this->load->view('templates_dp/worker/footer', $data);
	}
}
