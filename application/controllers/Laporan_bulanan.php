<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_bulanan extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('status') !== 'login' ) {
			redirect('/');
		}
		$this->load->view('laporan_bulanan');
	}

}
