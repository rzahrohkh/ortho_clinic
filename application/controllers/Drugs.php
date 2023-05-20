<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class Drugs extends CI_Controller
{
	var $nameClass = "Drugs";
	var $data_input;
	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		is_logged_in();
		$this->load->model('Drugs_model');
		$this->load->model('Unit_model');
	}

	public function index()
	{
		$data['title'] = 'Obat';
		$data['drugs'] = $this->Drugs_model->get_drugs();
		$this->load->view('templates_dp/worker/header', $data);
		$this->load->view('templates_dp/worker/sidebar', $data);
		$this->load->view('dp/drugs/index', $data);
		$this->load->view('templates_dp/worker/footer', $data);
	}

	public function edit()
	{
		$data['title'] = 'Edit Obat';
		$data['unit'] = $this->Unit_model->get_unit_all();
		$this->formValidation();
		$id = $this->uri->segment(3, 0);
		$data['dataEdit'] = $this->Drugs_model->get_drugs_byID($id);
		if ($this->form_validation->run() == false) {
			$this->load->view('templates_dp/worker/header', $data);
			$this->load->view('templates_dp/worker/sidebar', $data);
			$this->load->view('dp/drugs/drugs_edit', $data);
			$this->load->view('templates_dp/worker/footer', $data);
		} else {
			$id_drug = $this->input->post('id_drug', true);
			$this->formField($id, 'editLog');
			$this->Drugs_model->update_drugs($this->data_input, $id_drug);
			swalSuccess('Diperbarui', 'Obat');

			redirect($this->nameClass);
		}
	}
	public function formField($id = NULL, $typeForm = NULL)
	{

		$drug_name = $this->input->post('drug_name', true);
		$drug_type = $this->input->post('drug_type', true);
		$stock = $this->input->post('stock', true);
		$unit = $this->input->post('unit', true);
		$exp_date = $this->input->post('exp_date', true);
		$selling_price = $this->input->post('selling_price', true);
		$purchase_price = $this->input->post('purchase_price', true);

		$this->data_input = array(
			'id_drug' => $id ? $id : NULL,
			'drug_name' => $drug_name,
			'drug_type' => $drug_type,
			'stock' => $stock,
			'unit' => $unit,
			'exp_date' => $exp_date,
			'selling_price' => $selling_price,
			'purchase_price' => $purchase_price,

		);
		if ($typeForm == 'addLog') {
			$created_date = date("Y-m-d h:i:s");
			$created_by = $this->session->userdata('id_user');
			array_merge($this->data_input, [
				'created_date' => $created_date,
				'created_by' => $created_by
			]);
		}
		if ($typeForm == 'editLog') {
			$modifed_date = date("Y-m-d h:i:s");
			$modifed_by = $this->session->userdata('id_user');
			array_merge($this->data_input, [
				'modifed_date' => $modifed_date,
				'modifed_by' => $modifed_by
			]);
		}
	}
	public function add()
	{
		$data['title'] = 'Tambah Obat';
		$data['unit'] = $this->Unit_model->get_unit_all();
		$this->formValidation();
		if ($this->form_validation->run() == false) {
			$this->load->view('templates_dp/worker/header', $data);
			$this->load->view('templates_dp/worker/sidebar', $data);
			$this->load->view('dp/drugs/drugs_add', $data);
			$this->load->view('templates_dp/worker/footer', $data);
		} else {
			$this->formField(NULL, 'addLog');
			$this->Drugs_model->add_drugs($this->data_input);
			swalSuccess('Ditambahkan', 'Obat baru');

			redirect($this->nameClass);
		}
	}

	public function delete($id)
	{
		$this->Drugs_model->delete_drugs($id);
		swalSuccess('Dihapus', 'Obat');
		redirect($this->nameClass);
	}

	public function formValidation()
	{
		$this->form_validation->set_rules('drug_name', 'Nama Obat', 'required', [
			'required'      => 'Nama obat wajib di isi'
		]);
		$this->form_validation->set_rules('stock', 'Stok Obat', 'trim|required', [
			'required'      => 'Stok Obat wajib di isi'
		]);
		$this->form_validation->set_rules('unit', 'Unit', 'trim|required', [
			'required'      => 'unit wajib di isi'
		]);
		$this->form_validation->set_rules('exp_date', 'Tanggal Expired', 'trim|required', [
			'required'      => 'Tanggal Expired wajib di isi'
		]);
		$this->form_validation->set_rules('selling_price', 'Harga Jual Obat', 'trim|required', [
			'required'      => 'Harga Jual Obat wajib di isi'
		]);
		$this->form_validation->set_rules('purchase_price', 'Harga Beli Obat', 'trim|required', [
			'required'      => 'Harga Beli Obat wajib di isi'
		]);
	}
}
