<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PensiunController extends CI_Controller {

	public function __construct(){
		parent::__construct();

		#security-------------------------------------------------
		if(!$this->session->userdata('security')){ redirect(''); }
		#---------------------------------------------------------

		$this->load->model('PensiunModel');
	}

	public function add_pensiun(){
        $dat = array(
			'nip' 		  		=> $this->input->post('data1'),
			'nama' 	      		=> $this->input->post('data2'),
			'tmp_lahir'     	=> $this->input->post('data3'),
			'tgl_lahir'		  	=> $this->input->post('data4'),
			'gol'  				=> $this->input->post('data5'),
			'tgl_pensiun'  		=> $this->input->post('data6'),
			'tgl_kirim' 		=> $this->input->post('data7'),
			'status_sk'		  	=> $this->input->post('data8'),
			'tgl_terima'  		=> $this->input->post('data9'),
			'ket'  			  	=> $this->input->post('data10'),
			'jabatan'	  	  	=> $this->input->post('data11'),
			'unit_kerja'	  	=> $this->input->post('data12'),
			'jenis_pegawai'	  	=> $this->input->post('data13'),
			'jenis_pensiun'	  	=> $this->input->post('data14')
		);
		$data = $this->PensiunModel->add_pensiun('tb_pensiun',$dat);
		echo json_encode($data);
    }

    public function del_pensiun(){
		$id   = array('id_pensiun' => $this->input->post('data1'));
		$data = $this->PensiunModel->del($id,'tb_pensiun');
		echo json_encode($data);
	}

	public function get_edit(){
        $id   = $this->input->get('data1');
        $data = $this->PensiunModel->get_edit($id);
        echo json_encode($data);
    }

    public function edit_pensiun(){
		$dat = array(
			'nip' 		  		=> $this->input->post('data2'),
			'nama' 	      		=> $this->input->post('data3'),
			'tmp_lahir'     	=> $this->input->post('data4'),
			'tgl_lahir'		  	=> $this->input->post('data5'),
			'gol'  				=> $this->input->post('data6'),
			'tgl_pensiun'  		=> $this->input->post('data7'),
			'tgl_kirim' 		=> $this->input->post('data8'),
			'status_sk'		  	=> $this->input->post('data9'),
			'tgl_terima'  		=> $this->input->post('data10'),
			'ket'  			  	=> $this->input->post('data11'),
			'jabatan'	  	  	=> $this->input->post('data12'),
			'unit_kerja'	  	=> $this->input->post('data13'),
			'jenis_pegawai'	  	=> $this->input->post('data14'),
			'jenis_pensiun'	  	=> $this->input->post('data15')
		);
		$id    = array('id_pensiun' => $this->input->post('data1'));
		$data  = $this->PensiunModel->edit_pensiun('tb_pensiun',$dat,$id);
		echo json_encode($data);
	}

}