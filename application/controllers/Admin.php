<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		is_logged_in();
		$this->load->model('SubMenu_model');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['menu']= $this->SubMenu_model->get_user_sub_menu_by_role(1);
		$this->load->view('templates_dp/worker/header', $data);
		$this->load->view('templates_dp/worker/sidebar', $data);
		$this->load->view('dp/admin/index', $data);
		$this->load->view('templates_dp/worker/footer', $data);
	}
}
