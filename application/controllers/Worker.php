<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Worker extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Masuk';
        $this->load->view('templates_dp/auth/header', $data);
        $this->load->view('dp/auth_worker/index', $data);
        $this->load->view('templates_dp/auth/footer', $data);
    }
}
