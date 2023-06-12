<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CutiAdmin extends CI_Controller {

	public function __construct(){
		parent::__construct();

		#security--------------------------------------------------
		if (!$this->session->userdata('security')){ redirect(''); }
		#----------------------------------------------------------
		
		$this->load->model('All_m');
		$this->load->model('CutiAdmin_m');
		$this->load->model('ArsipModel');
	}

	public function index(){
		//---menu---
		$data['htl'] = $this->ArsipModel->getMenu('htl');
		$data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
		$data['tendik'] = $this->ArsipModel->getMenu('tendik');
		$data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');
		//-----------

		$data['getusulan'] = $this->CutiAdmin_m->getusulancuti(); 
		$this->load->view('cuti/admin/usulancuti',$data);
	}







	/*
	STATUS USULAN CUTI
	0 = () Proses pengisian
	1 = (diusulkan) Usulan sudah di submit (tapi masih bisa cancel)
	2 = (disetujui) Sudah disetujui oleh staf cuti (tidak bisa cancel)
	3 = (selesai) Sudah terbit surat izin cuti
	*/

	public function setujui_usulan(){
    	$dat = array(
			'statususulancuti' => 2
		);
    	$id    = array('idusulancuti' => $this->input->post('data1'));
		$data  = $this->All_m->edit('tb_cuti_usulancuti',$dat,$id);
		echo json_encode($data);
    }

    public function batal_setujui_usulan(){
    	$dat = array(
			'statususulancuti' => 1
		);
    	$id    = array('idusulancuti' => $this->input->post('data1'));
		$data  = $this->All_m->edit('tb_cuti_usulancuti',$dat,$id);
		echo json_encode($data);
    }







	#PROSES USULAN CUTI ===================================================================
	public function get_edit_proses(){
        $id   = $this->input->get('data1');
        $data = $this->CutiAdmin_m->get_edit_proses($id);
        echo json_encode($data);
    }

    public function edit_proses(){
		$config['upload_path']="./assets/berkascuti/suratizin";
        $config['allowed_types']='pdf';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload',$config);

        if($this->upload->do_upload("file_izincuti1")){  
        	$data_file = array('upload_data' => $this->upload->data()); 

        	$dat = array(
        		'file_izincuti'		=> $data_file['upload_data']['file_name'],
				'no_suratizin'	   	=> $this->input->post('no_suratizin1'),
				'tgl_suratizin'	   	=> $this->input->post('tgl_suratizin1'),
				'statususulancuti' 	=> 3
			);
	    }else{
        	$dat = array(
				'no_suratizin'	=> $this->input->post('no_suratizin1'),
				'tgl_suratizin'	=> $this->input->post('tgl_suratizin1')
			);
	    }

        $id    = array('idusulancuti' => $this->input->post('idusulancuti1'));
		$data  = $this->All_m->edit('tb_cuti_usulancuti',$dat,$id);
		echo json_encode($data);
	}






	#EDIT USULAN CUTI ===================================================================

	public function get_edit_usulan(){
        $id   = $this->input->get('data1');
        $data = $this->CutiAdmin_m->get_edit_usulan($id);
        echo json_encode($data);
    }

    public function edit_usulan(){
		$config['upload_path']="./assets/berkascuti";
        $config['allowed_types']='pdf';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload',$config);

        $file1 = $this->upload->do_upload("file_usulancuti1");
        #$file2 = $this->upload->do_upload("file_suratdokter1");

        if($file1){ $data_file1 = array('upload_data' => $this->upload->data()); }
        #if($file2){ $data_file2 = array('upload_data' => $this->upload->data()); }

        if($file1){
		    $dat = array(
		    	'tgl_mulai' 		=> $this->input->post('tgl_mulai1'),
		    	'tgl_selesai' 		=> $this->input->post('tgl_selesai1'),
		    	'anak_ke' 			=> $this->input->post('anak_ke1'),
		    	'id_jeniscuti' 		=> $this->input->post('id_jeniscuti1'),
		    	'id_cutipenting' 	=> $this->input->post('id_cutipenting1'),
				'file_usulancuti'	=> $data_file1['upload_data']['file_name']
			);
		}else{
			$dat = array(
		    	'tgl_mulai' 		=> $this->input->post('tgl_mulai1'),
		    	'tgl_selesai' 		=> $this->input->post('tgl_selesai1'),
		    	'anak_ke' 			=> $this->input->post('anak_ke1'),
		    	'id_jeniscuti' 		=> $this->input->post('id_jeniscuti1'),
		    	'id_cutipenting' 	=> $this->input->post('id_cutipenting1')
			);
		}

        $id    = array('idusulancuti' => $this->input->post('idusulancuti1'));
		$data  = $this->All_m->edit('tb_cuti_usulancuti',$dat,$id);
		echo json_encode($data);
	}


	public function del_usulan(){
		$id   = array('idusulancuti' => $this->input->post('data1'));
		$data = $this->All_m->del($id,'tb_cuti_usulancuti');
		echo json_encode($data);
	}









	#SURAT IZIN CUTI ======================================================================

	public function suratizin($idusulan){
		//---menu---
		$data['htl'] = $this->ArsipModel->getMenu('htl');
		$data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
		$data['tendik'] = $this->ArsipModel->getMenu('tendik');
		$data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');
		//-----------

		#merubah statususulancuti = 2
		//$dat = array('statususulancuti' => 2);
		//$id = array('idusulancuti' => $idusulan);
		//$data  = $this->All_m->edit('tb_cuti_usulancuti',$dat,$id);

		$data['suratizin'] = $this->CutiAdmin_m->getsuratizin($idusulan); 
		$this->load->view('cuti/admin/suratizin',$data);
	}







	#REKAPAN CUTI =========================================================================

	public function rekapancuti(){
		//---menu---
		$data['htl'] = $this->ArsipModel->getMenu('htl');
		$data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
		$data['tendik'] = $this->ArsipModel->getMenu('tendik');
		$data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');
		//-----------

		$data['getusulan'] = $this->CutiAdmin_m->getusulancuti(); 
		$this->load->view('cuti/admin/rekapancuti',$data);
	}


}