<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GelarAdmin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		#security-------------------------------------------------
		if(!$this->session->userdata('security')){ redirect(''); }
		#---------------------------------------------------------

		$this->load->model('All_m');
		$this->load->model('ArsipModel');
		$this->load->model('GelarAdmin_m');
	}



	public function index(){ 
		//---menu---
		$data['htl'] = $this->ArsipModel->getMenu('htl');
		$data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
		$data['tendik'] = $this->ArsipModel->getMenu('tendik');
		$data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');
		//-----------
		
		$data['data'] = $this->GelarAdmin_m->get_pg_pegawai();
		$this->load->view('gelar/admin/home',$data);
	}

	public function detail_berkas($id_pg){
		//---menu---
		$data['htl'] = $this->ArsipModel->getMenu('htl');
		$data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
		$data['tendik'] = $this->ArsipModel->getMenu('tendik');
		$data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');
		//-----------

		$data['data'] = $this->GelarAdmin_m->get_pg_berkas($id_pg);
		$this->load->view('gelar/admin/detail_berkas',$data);
	}






	#REVISI BERKAS =================================================

	public function revisi_berkas(){
        $kolom_status 	= $this->input->post('kolom_status');
        $kolom_ket 		= $this->input->post('kolom_ket');
         
        $dat = array(
			$kolom_status 	=> $this->input->post('status'),
			$kolom_ket 		=> $this->input->post('ket')
		);
		$id    = array('id_pg' => $this->input->post('id_pg'));
		$data  = $this->All_m->edit('tb_pg',$dat,$id);
		echo json_encode($data);
    }

    public function del_usulan(){
		$id   = array('id_pg' => $this->input->post('data1'));
		$data = $this->All_m->del($id,'tb_pg');
		echo json_encode($data);
	}

	public function status_pg(){
        $dat = array(
			'status_pg' => $this->input->post('status_pg')
		);
		$id    = array('id_pg' => $this->input->post('id_pg'));
		$data  = $this->All_m->edit('tb_pg',$dat,$id);
		echo json_encode($data);
    }


}