<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SystemError  extends CI_Controller
{
    public function index()
    {
        $this->load->view('error/systemError');
    }
}
