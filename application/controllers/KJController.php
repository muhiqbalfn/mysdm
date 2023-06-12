<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KJController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		#security-------------------------------------------------
		if(!$this->session->userdata('security')){ redirect(''); }
		#---------------------------------------------------------

		$this->load->model('KJModel');
	}

	public function add_kj(){
        $dat = array(
			'nip' 		   => $this->input->post('data1'),
			'nama' 	       => $this->input->post('data2'),
			'jabatan'      => $this->input->post('data3'),
			'gol'		   => $this->input->post('data4'),
			'unit_kerja'   => $this->input->post('data5'),
			'usulan_kj'	   => $this->input->post('data6'),
			'tgl_usulan'   => $this->input->post('data7'),
			'status'	   => $this->input->post('data8'),
			'jenis_pegawai'=> 'dosen'
		);
		$data = $this->KJModel->add_kj('tb_kj',$dat);
		echo json_encode($data);
    }

    public function del_kj(){
		$id   = array('id_kj' => $this->input->post('data1'));
		$data = $this->KJModel->del($id,'tb_kj');
		echo json_encode($data);
	}

	public function get_edit(){
        $id   = $this->input->get('data1');
        $data = $this->KJModel->get_edit($id);
        echo json_encode($data);
    }

    public function edit_kj(){
		$dat = array(
			'nip' 		  => $this->input->post('data2'),
			'nama' 	      => $this->input->post('data3'),
			'jabatan'     => $this->input->post('data4'),
			'gol'		  => $this->input->post('data5'),
			'unit_kerja'  => $this->input->post('data6'),
			'usulan_kj'	  => $this->input->post('data7'),
			'tgl_usulan'  => $this->input->post('data8'),
			'status'	  => $this->input->post('data9')
		);
		$id    = array('id_kj' => $this->input->post('data1'));
		$data  = $this->KJModel->edit_kj('tb_kj',$dat,$id);
		echo json_encode($data);
	}

	/*======================TENDIK=====================================*/

	public function add_kj_tendik(){
        $dat = array(
			'nip' 		   => $this->input->post('data1'),
			'nama' 	       => $this->input->post('data2'),
			'jabatan'      => $this->input->post('data3'),
			'gol'		   => $this->input->post('data4'),
			'unit_kerja'   => $this->input->post('data5'),
			'usulan_kj'	   => $this->input->post('data6'),
			'tgl_usulan'   => $this->input->post('data7'),
			'status'	   => $this->input->post('data8'),
			'jenis_pegawai'=> 'tendik'
		);
		$data = $this->KJModel->add_kj('tb_kj',$dat);
		echo json_encode($data);
    }

}