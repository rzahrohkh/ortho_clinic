<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
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

	public function add()
	{
		$data['title'] = 'Tambah Menu';
		$this->form_validation->set_rules('menu', 'Menu', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates_dp/patient/header', $data);
			$this->load->view('templates_dp/worker/sidebar', $data);
			$this->load->view('dp/menu/menu_add', $data);
			$this->load->view('templates_dp/patient/footer', $data);
		} else {
			$menu = $this->input->post('menu');
			$this->db->insert('user_menu', ['menu' => $menu]);
			$this->session->set_flashdata('flash', 'Ditambahkan');
			$this->session->set_flashdata('data', 'Menu');

			redirect('menu');
		}
	}
	public function edit()
	{
		$id = $this->uri->segment(3, 0);
		$data['title'] = 'Edit Menu';
		$this->form_validation->set_rules('menu', 'Menu', 'required');
		$data['data'] = $this->Menu_model->get_user_menu_byID($id);
		if ($this->form_validation->run() == false) {
			$this->load->view('templates_dp/patient/header', $data);
			$this->load->view('templates_dp/worker/sidebar', $data);
			$this->load->view('dp/menu/menu_edit', $data);
			$this->load->view('templates_dp/patient/footer', $data);
		} else {
			$id_user_menu = $this->input->post('id_user_menu', true);
			$menu = $this->input->post('menu', true);

			$this->db->set('menu', $menu);
			$this->db->where('id_user_menu', $id_user_menu);
			$this->db->update('user_menu');
			$this->session->set_flashdata('flash', 'Di Perbarui');
			$this->session->set_flashdata('data', 'Menu');
			redirect('menu');
		}
	}
	public function delete($id)
	{
		$this->db->where('id_user_menu', $id);
		$this->db->delete('user_menu');
		$this->session->set_flashdata('flash', 'dihapus');
		$this->session->set_flashdata('data', 'Menu');
		$url = "Menu";
		redirect($url);
	}
}
