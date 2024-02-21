<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_bulanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') !== 'login' ) {
			redirect('/');
		}
		$this->load->model('transaksi_model');
	}

	public function index()
	{
		$tanggal = $this->input->post();
		if($tanggal){
			$data['data'] = $this->transaksi_model->read_per_moon($tanggal['dari'], $tanggal['sampai'])->result_array();	
			// echo $this->db->last_query();die;
			$data['tanggal']= $tanggal;
			$this->load->view('laporan_bulanan', $data);
		}else{
			$data['data'] = "Kosong";
			$this->load->view('laporan_bulanan', $data);
		}
	}

}
