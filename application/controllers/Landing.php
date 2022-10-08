<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Ortho Clinic';
        $this->load->view('templates_landing/header',$data);
        $this->load->view('templates_landing/navbar',$data);
        $this->load->view('landing/index',$data);
        $this->load->view('templates_landing/footer',$data);
	}
}
