<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class SubMenu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		is_logged_in();
		$this->load->model('SubMenu_model');
		$this->load->model('Menu_model');
	}

	public function index()
	{
		$data['title'] = 'Manajemen Sub Menu';
		$data['menu'] = $this->Menu_model->get_user_menu();
		$data['data'] = $this->SubMenu_model->get_user_sub_menu();
		$this->load->view('templates_dp/worker/header', $data);
		$this->load->view('templates_dp/worker/sidebar', $data);
		$this->load->view('dp/submenu/index', $data);
		$this->load->view('templates_dp/worker/footer', $data);
	}

	public function add()
	{
		$data['title'] = 'Tambah Sub Menu';
		$data['menu'] = $this->Menu_model->get_user_menu();
		$this->form_validation->set_rules('id_user_menu', 'id_user_menu', 'trim|required');
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		$this->form_validation->set_rules('url', 'url', 'trim|required');
		$this->form_validation->set_rules('icon', 'icon', 'trim|required');
		$this->form_validation->set_rules('is_active', 'is_active', 'trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates_dp/worker/header', $data);
			$this->load->view('templates_dp/worker/sidebar', $data);
			$this->load->view('dp/submenu/submenu_add', $data);
			$this->load->view('templates_dp/worker/footer', $data);
		} else {
			$title = $this->input->post('title', true);
			$id_user_menu = $this->input->post('id_user_menu', true);
			$url = $this->input->post('url', true);
			$icon = $this->input->post('icon', true);
			$note = $this->input->post('note', true);
			$on = $this->input->post('is_active', true);

			if ($on == "on") {
				$is_active = 1;
			} else {
				$is_active = 0;
			}
			$data_input = array(
				'id_user_sub_menu' => NULL,
				'title' => $title,
				'id_user_menu' => $id_user_menu,
				'url' => $url,
				'icon' => $icon,
				'note' => $note,
				'is_active' => $is_active
			);

			$this->SubMenu_model->add_user_sub_menu($data_input);
			$this->session->set_flashdata('flash', 'Ditambahkan');
			$this->session->set_flashdata('data', 'Sub Menu');

			redirect('subMenu');
		}
	}
	public function edit()
	{
		$data['title'] = 'Edit Sub Menu';
		$data['menu'] = $this->Menu_model->get_user_menu();
		$id = $this->uri->segment(3, 0);

		$data['data_submenu'] = $this->SubMenu_model->get_user_sub_menu_byID($id);
		if($data['data_submenu']){
		    $data['data_menu'] = $this->Menu_model->get_user_menu_byID($data['data_submenu']['id_user_menu']);
		}
		$this->form_validation->set_rules('id_user_menu', 'id_user_menu', 'trim|required');
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		$this->form_validation->set_rules('url', 'url', 'trim|required');
		$this->form_validation->set_rules('icon', 'icon', 'trim|required');
		$this->form_validation->set_rules('is_active', 'is_active', 'trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates_dp/worker/header', $data);
			$this->load->view('templates_dp/worker/sidebar', $data);
			$this->load->view('dp/submenu/submenu_edit', $data);
			$this->load->view('templates_dp/worker/footer', $data);
		} else {
			$id_user_sub_menu = $this->input->post('id_user_sub_menu', true);
			$title = $this->input->post('title', true);
			$id_user_menu = $this->input->post('id_user_menu', true);
			$url = $this->input->post('url', true);
			$icon = $this->input->post('icon', true);
			$note = $this->input->post('note', true);
			$on = $this->input->post('is_active', true);

			if ($on == "on") {
				$is_active = 1;
			} else {
				$is_active = 0;
			}
			$data_input = array(
				'title' => $title,
				'id_user_menu' => $id_user_menu,
				'url' => $url,
				'icon' => $icon,
				'note' => $note,
				'is_active' => $is_active
			);
			$this->SubMenu_model->update_user_sub_menu($id_user_sub_menu, $data_input);
			$this->session->set_flashdata('flash', 'Diperbarui');
			$this->session->set_flashdata('data', 'Sub Menu');

			redirect('subMenu');
		}
	}
	public function delete($id)
	{
		$this->SubMenu_model->delete_user_sub_menu($id);
		$this->session->set_flashdata('flash', 'dihapus');
		$this->session->set_flashdata('data', 'Submenu');
		$url = "subMenu";
		redirect($url);
	}
}
