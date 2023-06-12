<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HK extends CI_Controller {

	public function __construct(){
		parent::__construct();

		#security-------------------------------------------------
		if(!$this->session->userdata('security')){ redirect(''); }
		#---------------------------------------------------------

		$this->load->model('Model');
		$this->load->model('ArsipModel');
		$this->load->model('PensiunModel');
		$this->load->model('all_m');
	}

	public function index(){
		//---menu----
		$data['htl'] = $this->ArsipModel->getMenu('htl');
		$data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
		$data['tendik'] = $this->ArsipModel->getMenu('tendik');
		$data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');
		//----------
		$data['data_kj'] = $this->Model->getAll('tb_kj');
		$data['data_kp'] = $this->Model->getAll('tb_kp');
		$data['data_tubel'] = $this->Model->getAll('tb_tubel');
		$data['data_pensiun'] = $this->Model->getAll('tb_pensiun');
		//---count----
		$data['count_kp_dosen'] = $this->Model->count_kp_dosen();
		$data['count_kp_tendik'] = $this->Model->count_kp_tendik();
		$data['count_kj_dosen'] = $this->Model->count_kj_dosen();
		$data['count_kj_tendik'] = $this->Model->count_kj_tendik();
		$data['count_tubel'] = $this->Model->count_tubel();
		$data['count_pensiun'] = $this->Model->count_pensiun();
		#grafik--------------
		$query = $this->db->query("SELECT count(usulan_kj) as aa
								   FROM  tb_kj
								   WHERE usulan_kj='Asisten Ahli'
								   GROUP BY year(tgl_usulan)");
        $data['aa1'] = json_encode(array_column($query->result(),'aa'),JSON_NUMERIC_CHECK);
        $query = $this->db->query("SELECT count(usulan_kj) as l
								   FROM  tb_kj
								   WHERE usulan_kj='Lektor'
								   GROUP BY year(tgl_usulan)");
        $data['l1'] = json_encode(array_column($query->result(),'l'),JSON_NUMERIC_CHECK);
        $query = $this->db->query("SELECT count(usulan_kj) as lk
								   FROM  tb_kj
								   WHERE usulan_kj='Lektor Kepala'
								   GROUP BY year(tgl_usulan)");
        $data['lk1'] = json_encode(array_column($query->result(),'lk'),JSON_NUMERIC_CHECK);
        $query = $this->db->query("SELECT count(usulan_kj) as gb
								   FROM  tb_kj
								   WHERE usulan_kj='Guru Besar/Profesor'
								   GROUP BY year(tgl_usulan)");
        $data['gb1'] = json_encode(array_column($query->result(),'gb'),JSON_NUMERIC_CHECK);
		//---home--------
		$data['get_user'] = $this->Model->get_user();
		$this->load->view('admin/home',$data);
	}









	#==========================SHOW DATA====================================
	public function show(){
		$data['data_kj'] = $this->Model->getAll('tb_kj');
		$data['data_kp'] = $this->Model->getAll('tb_kp');
		$data['data_tubel'] = $this->Model->getAll('tb_tubel');
		$data['data_pensiun'] = $this->Model->getAll('tb_pensiun');
		$this->load->view('admin/show',$data);
	}












	#=================================INFORMASI KEPEG============================
	public function daftar_kp(){ //dosen
		//---menu---
		$data['htl'] = $this->ArsipModel->getMenu('htl');
		$data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
		$data['tendik'] = $this->ArsipModel->getMenu('tendik');
		$data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');
		//---------
		$data['data_kj'] = $this->Model->getAllwhere('tb_kj','jenis_pegawai','dosen','id_kj');
		$data['data_kp'] = $this->Model->getAllwhere('tb_kp','jenis_pegawai','dosen','id_kp');
		$this->load->view('informasikepeg/daftar_kp',$data);
	}

	public function daftar_kp_tendik(){ //tendik
		//---menu---
		$data['htl'] = $this->ArsipModel->getMenu('htl');
		$data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
		$data['tendik'] = $this->ArsipModel->getMenu('tendik');
		$data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');
		//---------
		$data['data_kj'] = $this->Model->getAllwhere('tb_kj','jenis_pegawai','tendik','id_kj');
		$data['data_kp'] = $this->Model->getAllwhere('tb_kp','jenis_pegawai','tendik','id_kp');
		$this->load->view('informasikepeg/daftar_kp_tendik',$data);
	}

	public function daftar_tubel(){
		//---menu---
		$data['htl'] = $this->ArsipModel->getMenu('htl');
		$data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
		$data['tendik'] = $this->ArsipModel->getMenu('tendik');
		$data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');
		//----------
		$data['data_tubel_dosen'] = $this->Model->get_tubel_dosen();
		$data['data_tubel_tendik'] = $this->Model->get_tubel_tendik();
		$this->load->view('informasikepeg/daftar_tubel',$data);
	}

	public function daftar_pensiun(){
		//---menu---
		$data['htl'] = $this->ArsipModel->getMenu('htl');
		$data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
		$data['tendik'] = $this->ArsipModel->getMenu('tendik');
		$data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');
		//----------
		$data['data_pensiun_dosen'] = $this->Model->get_pensiun_dosen();
		$data['data_pensiun_tendik'] = $this->Model->get_pensiun_tendik();
		$this->load->view('informasikepeg/daftar_pensiun',$data);
	}

	
}
