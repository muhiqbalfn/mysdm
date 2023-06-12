<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TubelController extends CI_Controller {

	public function __construct(){
		parent::__construct();

		#security-------------------------------------------------
		if(!$this->session->userdata('security')){ redirect(''); }
		#---------------------------------------------------------

		$this->load->model('TubelModel');
	}

	public function add_tubel(){
        $dat = array(
			'nip' 		  			=> $this->input->post('data1'),
			'nama' 	      			=> $this->input->post('data2'),
			'tujuan'     			=> $this->input->post('data3'),
			'negara'		  		=> $this->input->post('data4'),
			'bidang_ilmu'  			=> $this->input->post('data5'),
			'mulai'					=> $this->input->post('data6'),
			'selesai'  				=> $this->input->post('data7'),
			'tgl_surat_usulan'		=> $this->input->post('data8'),
			'sumber_biaya'	  		=> $this->input->post('data9'),
			'status'	  			=> $this->input->post('data10'),
			'unit_kerja'	  		=> $this->input->post('data11'),
			'jurusan'	  			=> $this->input->post('data12'),
			'status_sk'	  			=> $this->input->post('data13'),
			'status_sk_perpanjangan'=> $this->input->post('data14'),
			'akhir_sk_perpanjangan'	=> $this->input->post('data15'),
			'jenis_pegawai'			=> $this->input->post('data16')
		);
		$data = $this->TubelModel->add_tubel('tb_tubel',$dat);
		echo json_encode($data);
    }

    public function del_tubel(){
		$id   = array('id_tubel' => $this->input->post('data1'));
		$data = $this->TubelModel->del($id,'tb_tubel');
		echo json_encode($data);
	}

	public function get_edit(){
        $id   = $this->input->get('data1');
        $data = $this->TubelModel->get_edit($id);
        echo json_encode($data);
    }

    public function edit_tubel(){
		$dat = array(
			'nip' 		  			=> $this->input->post('data2'),
			'nama' 	      			=> $this->input->post('data3'),
			'tujuan'     			=> $this->input->post('data4'),
			'negara'		  		=> $this->input->post('data5'),
			'bidang_ilmu'  			=> $this->input->post('data6'),
			'mulai'					=> $this->input->post('data7'),
			'selesai'  				=> $this->input->post('data8'),
			'tgl_surat_usulan'		=> $this->input->post('data9'),
			'sumber_biaya'	  		=> $this->input->post('data10'),
			'status'	  			=> $this->input->post('data11'),
			'unit_kerja'	  		=> $this->input->post('data12'),
			'jurusan'	  			=> $this->input->post('data13'),
			'status_sk'	  			=> $this->input->post('data14'),
			'status_sk_perpanjangan'=> $this->input->post('data15'),
			'akhir_sk_perpanjangan'	=> $this->input->post('data16'),
			'jenis_pegawai'			=> $this->input->post('data17')
		);
		$id    = array('id_tubel' => $this->input->post('data1'));
		$data  = $this->TubelModel->edit_tubel('tb_tubel',$dat,$id);
		echo json_encode($data);
	}

}