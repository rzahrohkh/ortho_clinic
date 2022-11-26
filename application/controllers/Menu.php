<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		is_logged_in();
		$this->load->model('Menu_model');
	}

	public function index()
	{
		$data['title'] = 'Manajemen Menu';
		$data['menu'] = $this->Menu_model->get_user_menu();
		$this->load->view('templates_dp/patient/header', $data);
		$this->load->view('templates_dp/worker/sidebar', $data);
		$this->load->view('dp/menu/index', $data);
		$this->load->view('templates_dp/patient/footer', $data);
	}
}
