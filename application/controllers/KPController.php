<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KPController extends CI_Controller {

	public function __construct(){
		parent::__construct();

		#security-------------------------------------------------
		if(!$this->session->userdata('security')){ redirect(''); }
		#---------------------------------------------------------

		$this->load->model('KPModel');
	}

	public function add_kp(){
        $dat = array(
			'nip' 		   => $this->input->post('data1'),
			'nama' 	       => $this->input->post('data2'),
			'jabatan'      => $this->input->post('data3'),
			'gol'		   => $this->input->post('data4'),
			'unit_kerja'   => $this->input->post('data5'),
			'usulan_kp'	   => $this->input->post('data6'),
			'tgl_usulan'   => $this->input->post('data7'),
			'status'	   => $this->input->post('data8'),
			'jenis_pegawai'=> 'dosen'
		);
		$data = $this->KPModel->add_kp('tb_kp',$dat);
		echo json_encode($data);
    }

    public function del_kp(){
		$id   = array('id_kp' => $this->input->post('data1'));
		$data = $this->KPModel->del($id,'tb_kp');
		echo json_encode($data);
	}

	public function get_edit(){
        $id   = $this->input->get('data1');
        $data = $this->KPModel->get_edit($id);
        echo json_encode($data);
    }

    public function edit_kp(){
		$dat = array(
			'nip' 		  => $this->input->post('data2'),
			'nama' 	      => $this->input->post('data3'),
			'jabatan'     => $this->input->post('data4'),
			'gol'		  => $this->input->post('data5'),
			'unit_kerja'  => $this->input->post('data6'),
			'usulan_kp'	  => $this->input->post('data7'),
			'tgl_usulan'  => $this->input->post('data8'),
			'status'	  => $this->input->post('data9')
		);
		$id    = array('id_kp' => $this->input->post('data1'));
		$data  = $this->KPModel->edit_kp('tb_kp',$dat,$id);
		echo json_encode($data);
	}

	/*======================TENDIK===========================*/

	public function add_kp_tendik(){
        $dat = array(
			'nip' 		   => $this->input->post('data1'),
			'nama' 	       => $this->input->post('data2'),
			'jabatan'      => $this->input->post('data3'),
			'gol'		   => $this->input->post('data4'),
			'unit_kerja'   => $this->input->post('data5'),
			'usulan_kp'	   => $this->input->post('data6'),
			'tgl_usulan'   => $this->input->post('data7'),
			'status'	   => $this->input->post('data8'),
			'jenis_pegawai'=> 'tendik'
		);
		$data = $this->KPModel->add_kp('tb_kp',$dat);
		echo json_encode($data);
    }

}