<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PangkatAdmin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		#security-------------------------------------------------
		if(!$this->session->userdata('security')){ redirect(''); }
		#---------------------------------------------------------

		$this->load->model('All_m');
		$this->load->model('ArsipModel');
		$this->load->model('PangkatAdmin_m');
	}

	public function index(){ 
		//---menu---
		$data['htl'] = $this->ArsipModel->getMenu('htl');
		$data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
		$data['tendik'] = $this->ArsipModel->getMenu('tendik');
		$data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');
		//-----------
		$data['data'] = $this->All_m->get('tb_kp_periode'); 
		$this->load->view('pangkat/admin/periode',$data);
	}






	#========================================PERIODE========================================
	public function add_periode(){
		$slug = url_title($this->input->post('data1'), '-', true);
        $dat = array(
			'nama_periode' 		=> $this->input->post('data1'),
			'slug_periode' 		=> $slug,
			'waktu_mulai'  		=> $this->input->post('data2'),
			'waktu_selesai'   	=> $this->input->post('data3'),
			'catatan_periode'  	=> $this->input->post('data4')
		);
		$data = $this->All_m->add('tb_kp_periode',$dat);
		echo json_encode($data);
    }

	public function get_edit_periode(){
        $id   = $this->input->get('data1');
        $data = $this->PangkatAdmin_m->get_edit_periode($id);
        echo json_encode($data);
    }

    public function edit_periode(){
    	$slug = url_title($this->input->post('data2'), '-', true);
    	/*$tgl = date("Y-m-d");
    	$slug1 = $slug+$tgl;*/
		$dat = array(
			'nama_periode' 		=> $this->input->post('data2'),
			'slug_periode'		=> $slug,
			'waktu_mulai'  		=> $this->input->post('data3'),
			'waktu_selesai'   	=> $this->input->post('data4'),
			'catatan_periode'  	=> $this->input->post('data5')
		);
		$id    = array('id_periode' => $this->input->post('data1'));
		$data  = $this->All_m->edit('tb_kp_periode',$dat,$id);
		echo json_encode($data);
	}

	public function del_periode(){
		$id   = array('id_periode' => $this->input->post('data1'));
		$data = $this->All_m->del($id,'tb_kp_periode');
		echo json_encode($data);
	}






	#==============================PEGAWAI KP DOSEN========================================

	public function pegawai_kp_dosen($id_periode){
		//---menu---
		$data['htl'] = $this->ArsipModel->getMenu('htl');
		$data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
		$data['tendik'] = $this->ArsipModel->getMenu('tendik');
		$data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');
		//-----------

		$data['periode'] = $this->PangkatAdmin_m->get_periode($id_periode);
		$data['pegawai'] = $this->PangkatAdmin_m->get_dosen();
		$data['data'] = $this->PangkatAdmin_m->get_pegawai_kp_dosen($id_periode);
		$this->load->view('pangkat/admin/daftar_dosen',$data);
	}

	public function add_dosen(){
        $dat = array(
			'id_periode'	=> $this->input->post('data1'),
			'nip'   		=> $this->input->post('data2')
		);
		$data = $this->All_m->add('tb_kp_dosen',$dat);
		echo json_encode($data);
    }

    public function del_dosen(){
		$id   = array('id_kp_dosen' => $this->input->post('data1'));
		$data = $this->All_m->del($id,'tb_kp_dosen');
		echo json_encode($data);
	}






	#==============================PEGAWAI KP TENDIK========================================

	public function pegawai_kp_tendik($id_periode){
		//---menu---
		$data['htl'] = $this->ArsipModel->getMenu('htl');
		$data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
		$data['tendik'] = $this->ArsipModel->getMenu('tendik');
		$data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');
		//-----------

		$data['periode'] = $this->PangkatAdmin_m->get_periode($id_periode);
		$data['pegawai'] = $this->PangkatAdmin_m->get_tendik();
		$data['data'] = $this->PangkatAdmin_m->get_pegawai_kp_tendik($id_periode);
		$this->load->view('pangkat/admin/daftar_tendik',$data);
	}

	public function add_tendik(){
        $dat = array(
			'id_periode'	=> $this->input->post('data1'),
			'nip'   		=> $this->input->post('data2')
		);
		$data = $this->All_m->add('tb_kp_tendik',$dat);
		echo json_encode($data);
    }

    public function del_tendik(){
		$id   = array('id_kp_tendik' => $this->input->post('data1'));
		$data = $this->All_m->del($id,'tb_kp_tendik');
		echo json_encode($data);
	}






	#==============================DETAIL BERKAS DOSEN========================================

	public function detail_berkas_dosen($id_kp_dosen){
		//---menu---
		$data['htl'] = $this->ArsipModel->getMenu('htl');
		$data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
		$data['tendik'] = $this->ArsipModel->getMenu('tendik');
		$data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');
		//-----------

		$data['data'] = $this->PangkatAdmin_m->get_kp_dosen($id_kp_dosen);
		$this->load->view('pangkat/admin/detail_berkas_dosen',$data);
	}

	public function revisi_berkas_dosen(){
        $kolom_stt 	= $this->input->post('kolom_stt');
        $kolom_ket 	= $this->input->post('kolom_ket');
         
        $dat = array(
			$kolom_stt 	=> $this->input->post('status'),
			$kolom_ket 	=> $this->input->post('ket')
		);
		$id    = array('id_kp_dosen' => $this->input->post('id_kp_dosen'));
		$data  = $this->All_m->edit('tb_kp_dosen',$dat,$id);
		echo json_encode($data);
    }






    #==============================DETAIL BERKAS TENDIK========================================

	public function detail_berkas_tendik($id_kp_tendik){
		//---menu---
		$data['htl'] = $this->ArsipModel->getMenu('htl');
		$data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
		$data['tendik'] = $this->ArsipModel->getMenu('tendik');
		$data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');
		//-----------

		$data['data'] = $this->PangkatAdmin_m->get_kp_tendik($id_kp_tendik);
		$this->load->view('pangkat/admin/detail_berkas_tendik',$data);
	}

	public function revisi_berkas_tendik(){
        $kolom_stt 	= $this->input->post('kolom_stt');
        $kolom_ket 	= $this->input->post('kolom_ket');
         
        $dat = array(
			$kolom_stt 	=> $this->input->post('status'),
			$kolom_ket 	=> $this->input->post('ket')
		);
		$id    = array('id_kp_tendik' => $this->input->post('id_kp_tendik'));
		$data  = $this->All_m->edit('tb_kp_tendik',$dat,$id);
		echo json_encode($data);
    }


}