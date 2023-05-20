<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class Forbidden  extends CI_Controller
{
    public function index()
    {
        $this->load->view('error/forbidden');
    }
}
