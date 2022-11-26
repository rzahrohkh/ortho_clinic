<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('Role_model');
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Manajemen Role User';
		$data['dataRole'] = $this->Role_model->get_role();
		$this->load->view('templates_dp/worker/header', $data);
		$this->load->view('templates_dp/worker/sidebar', $data);
		$this->load->view('dp/role/index', $data);
		$this->load->view('templates_dp/worker/footer', $data);
	}

	public function add()
	{
		$data['title'] = 'Tambah Role User';
		$this->form_validation->set_rules('role', 'role', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates_dp/worker/header', $data);
			$this->load->view('templates_dp/worker/sidebar', $data);
			$this->load->view('dp/role/role_add', $data);
			$this->load->view('templates_dp/worker/footer', $data);
		} else {
			$role = $this->input->post('role', true);

			$data_input = array(
				'role_id' => NULL,
				'role' => $role
			);

			$this->Role_model->add_role($data_input);
			$this->session->set_flashdata('flash', 'Ditambahkan');
			$this->session->set_flashdata('data', 'Role User baru');

			redirect('role');
		}
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Role User';
		$this->form_validation->set_rules('role', 'role', 'trim|required');
		$data['data_role'] = $this->Role_model->get_role_byID($id);
		if ($this->form_validation->run() == false) {
			$this->load->view('templates_dp/worker/header', $data);
			$this->load->view('templates_dp/worker/sidebar', $data);
			$this->load->view('dp/role/role_edit', $data);
			$this->load->view('templates_dp/worker/footer', $data);
		} else {
			$role = $this->input->post('role', true);
			$role_id = $this->input->post('role_id', true);
			$data_input = array(
				'role' => $role
			);

			$this->Role_model->update_role($data_input, $role_id);
			$this->session->set_flashdata('flash', 'Di perbarui');
			$this->session->set_flashdata('data', 'Role User Baru');

			redirect('role');
		}
	}

	public function user_access()
	{
		$data['title'] = 'Akses Menu User';
		$this->load->view('templates_dp/worker/header', $data);
		$this->load->view('templates_dp/worker/sidebar', $data);
		$this->load->view('dp/role/role_access_menu', $data);
		$this->load->view('templates_dp/worker/footer', $data);
	}

	public function delete($id)
	{
		$this->Role_model->delete_role($id);
		$this->session->set_flashdata('flash', 'dihapus');
		$this->session->set_flashdata('data', 'Role User');
		$url = "role";
		redirect($url);
	}
}
