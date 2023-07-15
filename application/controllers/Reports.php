<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023
class Reports extends CI_Controller
{
    var $nameClass = "Reports";
    var $headerMedicalRecord = array("id_rekam_medis", "nama_pasien", "tanggal_pemeriksaan", "diagnosis", "jenis_penanganan", "status_rekam_medis", "penanganan", "biaya_pemeriksaan", "nama_dokter"); 
    var $headerDrug = array("tanggal_submit", "id_patient", "nama_pasien", "obat_yang_dikonsumsi", "waktu"); 
    var $headerActivity = array("tanggal_aktifitas", "id_patient", "nama_pasien", "tipe_aktifitas", "aktifitas_yang_dilakukan"); 

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        // is_logged_in();
        $this->load->model('ActivityPatient_model');
        $this->load->model('MedicalRecord_model');
        $this->load->model('LogoClinic_model');
        $this->load->model('DrugPatient_model');
    }

    public function ReportRiwayatRekamMedis()
    {
        
        $data['title'] = 'Report Riwayat Rekam Medis';
        $data = $this->getDataUser($data);
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/report_patient/reportRiwayatRekamMedisView', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }

    public function ReportRiwayatRekamMedisExport(){
        $startDate = $this->input->post('startDate', true);
        $endDate = $this->input->post('endDate', true);
        $csvButton = $this->input->post('csvButton', true);
        $pdfutton = $this->input->post('pdfButton', true);
        $usersData = $this->MedicalRecord_model->get_medical_record_by_id_report_bydate($startDate, $endDate);
        if($csvButton){
            $this->ReportRiwayatRekamMedisExportCSV($startDate, $endDate,$usersData);
        }
        if($pdfutton){
            $this->ReportRiwayatRekamMedisExportPDF($startDate, $endDate,$usersData);
        }
 
    }

    public function ReportRiwayatRekamMedisExportCSV($startDate, $endDate, $usersData)
    {
        $file_name=$this->fileNameGenerator($startDate, $endDate,"Laporan Riwayat Rekam Medis");
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=' . $file_name . '.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, $this->headerMedicalRecord);
        foreach ($usersData as $dataRow=>$value){
            $value['handling']=strip_tags($value['handling']);
            $value['diagnosis']=strip_tags($value['diagnosis']);
            $value['inspection_fees']=rupiah($value['inspection_fees']);
            fputcsv($output,$value);
		}
        fclose($output);
        exit;
    }
    
    public function ReportRiwayatRekamMedisExportPDF($startDate, $endDate, $usersData){
        $data['logo'] = $this->LogoClinic_model->get_logo_clinic_byID(1);
        $data['medicalRecord'] = $usersData;
        $html=$this->load->view('dp/report_patient/medicalRecordReportView',$data,true);
        $fileName=$this->fileNameGenerator($startDate, $endDate,"Laporan Riwayat Rekam Medis");
        $this->load->library('pdf');
        $this->pdf->createPDF($html, $fileName);
    }

    public function ObatYangSedangDikonsumsi()
    {
        $data['title'] = 'Report Obat Yang Sedang Dikonsumsi';
        $data = $this->getDataUser($data);
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/report_patient/reportRiwayatObatView', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }

    public function ReportRiwayatObatExport(){
        $startDate = $this->input->post('startDate', true);
        $endDate = $this->input->post('endDate', true);
        $csvButton = $this->input->post('csvButton', true);
        $pdfutton = $this->input->post('pdfButton', true);
        $usersData = $this->DrugPatient_model->get_drugs_by_id_report_bydate($startDate, $endDate);

        if($csvButton){
            $this->ReportRiwayatObatExportCSV($startDate, $endDate,$usersData);
        }
        if($pdfutton){
            $this->ReportRiwayatObatExportPDF($startDate, $endDate,$usersData);
        }
    }

     public function ReportRiwayatObatExportCSV($startDate, $endDate, $usersData)
    {
        $file_name=$this->fileNameGenerator($startDate, $endDate,"Laporan Riwayat Obat Yang Dikonsumsi");
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=' . $file_name . '.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, $this->headerDrug);
        foreach ($usersData as $dataRow=>$value){
            $value['drug']=strip_tags($value['drug']);
            fputcsv($output,$value);
		}
        fclose($output);
        exit;
    }
    public function ReportRiwayatObatExportPDF($startDate, $endDate, $usersData){
        $data['logo'] = $this->LogoClinic_model->get_logo_clinic_byID(1);
        $data['medicines'] = $usersData;
        $html=$this->load->view('dp/report_patient/historyMedicineReportView',$data,true);
        $fileName=$this->fileNameGenerator($startDate, $endDate,"Laporan Riwayat Obat Yang Dikonsumsi");
        $this->load->library('pdf');
        $this->pdf->createPDF($html, $fileName);
    }

    public function ReportRiwayatAktivitas()
    {
        
        $data['title'] = 'Report Riwayat Aktifitas';
        $data = $this->getDataUser($data);
        $this->load->view('templates_dp/worker/header', $data);
        $this->load->view('templates_dp/worker/sidebar', $data);
        $this->load->view('dp/report_patient/reportRiwayatAktifitas', $data);
        $this->load->view('templates_dp/worker/footer', $data);
    }
    public function ReportRiwayatAktivitasExport(){
        $startDate = $this->input->post('startDate', true);
        $endDate = $this->input->post('endDate', true);
        $csvButton = $this->input->post('csvButton', true);
        $pdfutton = $this->input->post('pdfButton', true);
        $usersData = $this->ActivityPatient_model->get_activity_answer_report_all($startDate, $endDate);

        if($csvButton){
            $this->ReportRiwayatAktivitasExportCSV($startDate, $endDate,$usersData);
        }
        if($pdfutton){
            $this->ReportRiwayatAktivitasExportPDF($startDate, $endDate,$usersData);
        }
    }

     public function ReportRiwayatAktivitasExportCSV($startDate, $endDate, $usersData)
    {
        $file_name=$this->fileNameGenerator($startDate, $endDate,"Laporan Riwayat Aktifitas Pasien");
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=' . $file_name . '.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, $this->headerActivity);
        foreach ($usersData as $dataRow=>$value){
            fputcsv($output,$value);
		}
        fclose($output);
        exit;
    }
    public function ReportRiwayatAktivitasExportPDF($startDate, $endDate, $usersData){
        $data['logo'] = $this->LogoClinic_model->get_logo_clinic_byID(1);
        $data['aktifitas'] = $usersData;
        $html=$this->load->view('dp/report_patient/historyActivityReportView',$data,true);
        $fileName=$this->fileNameGenerator($startDate, $endDate,"Laporan Riwayat Aktifitas Pasien");
        $this->load->library('pdf');
        $this->pdf->createPDF($html, $fileName);
    }
    public function fileNameGenerator($startDate, $endDate, $typeReport){
        return "{$typeReport} {$startDate} {$endDate}";
    }
    public function getDataUser(array $data)
	{
		$season_user = $this->session->userdata('id_user');
		$season_patient = $this->session->userdata('id_patient');
		if ($season_user) {
			$data['user'] = $this->db->query("SELECT * FROM user natural join role where id_user=$season_user")->row_array();
			$data['name'] = $this->db->get_where('user', ['id_user' => $season_user])->row_array()["name"];
			$data['role'] = $data['user']["role"];
			$data['date_of_birth'] = $data['user']["date_of_birth"];
			$data['age'] = $data['user']["age"];
			$data['address'] = $data['user']["address"];

		} elseif ($season_patient) {
			$data['user'] = $this->db->query("Select * FROM patient natural join role where id_patient=$season_patient")->row_array();
			$data['name'] = $this->db->get_where('patient', ['id_patient' => $season_patient])->row_array()["name_patient"];
			$data['role'] = $data['user']["role"];
			$data['age'] = $data['user']["age_patient"];
			$data['address'] = $data['user']["address_patient"];

		}

		$data['dataUser'] = $this->db->query("SELECT * FROM user NATURAL JOIN role where id_user=$season_user")->row_array();
		return $data;
	}

    
}
