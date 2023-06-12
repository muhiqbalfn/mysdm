<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tubel extends CI_Controller {

	public function __construct(){
		parent::__construct();

		#security-------------------------------------------------
		if(!$this->session->userdata('security')){ redirect(''); }
		#---------------------------------------------------------

		$this->load->model('All_m');
		$this->load->model('Model');
		$this->load->model('Tubel_m');
	}

	public function index(){
		$data['data_tubel_dosen'] = $this->Model->get_tubel_dosen();
		$data['data_tubel_tendik'] = $this->Model->get_tubel_tendik();
		$this->load->view('tubel/home',$data);
	}


	#--------------------------------------------------------------
	#MANAJEMEN USULAN FAKULTAS
	#--------------------------------------------------------------

	
}