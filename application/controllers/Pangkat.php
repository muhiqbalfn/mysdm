<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pangkat extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		#security-------------------------------------------------
		if(!$this->session->userdata('security')){ redirect(''); }
		#---------------------------------------------------------

		$this->load->model('All_m');
		$this->load->model('Pangkat_m');
	}

	public function index(){
		$data['periode'] = $this->Pangkat_m->get_kp_periode();
		$data['dosen']   = $this->Pangkat_m->get_kp_dosen();
		$data['tendik']  = $this->Pangkat_m->get_kp_tendik();
		$this->load->view('pangkat/home',$data);
	}

	public function detail_berkas_dosen($id_kp_dosen){
		$data['data'] = $this->Pangkat_m->get_berkas_dosen($id_kp_dosen);
		$this->load->view('pangkat/detail_berkas_dosen',$data);
	}

	public function detail_berkas_tendik($id_kp_tendik){
		$data['data'] = $this->Pangkat_m->get_berkas_tendik($id_kp_tendik);
		$this->load->view('pangkat/detail_berkas_tendik',$data);
	}




	#===========================DETAIL BERKAS==========================

	public function revisi_berkas_dosen(){
        $config['upload_path']		= "./assets/dokumen/pangkat";
        $config['allowed_types']	= 'pdf';
        $config['encrypt_name'] 	= TRUE;

        $kolom_file 	= $this->input->post('kolom_file');
        $kolom_status 	= $this->input->post('kolom_status');
         
        $this->load->library('upload',$config);
        if($this->upload->do_upload('berkas')){
            $data = array('upload_data' => $this->upload->data());
             
            $dat = array(
				$kolom_file 	=> $data['upload_data']['file_name'],
				$kolom_status 	=> 1
			);
			
			$id    = array('id_kp_dosen' => $this->input->post('id_kp_dosen'));
			$data  = $this->All_m->edit('tb_kp_dosen',$dat,$id);
			echo json_encode($data);
        }
 
    }

    public function revisi_berkas_tendik(){
        $config['upload_path']		= "./assets/dokumen/pangkat";
        $config['allowed_types']	= 'pdf';
        $config['encrypt_name'] 	= TRUE;

        $kolom_file 	= $this->input->post('kolom_file');
        $kolom_status 	= $this->input->post('kolom_status');
         
        $this->load->library('upload',$config);
        if($this->upload->do_upload('berkas')){
            $data = array('upload_data' => $this->upload->data());
             
            $dat = array(
				$kolom_file 	=> $data['upload_data']['file_name'],
				$kolom_status 	=> 1
			);
			
			$id    = array('id_kp_tendik' => $this->input->post('id_kp_tendik'));
			$data  = $this->All_m->edit('tb_kp_tendik',$dat,$id);
			echo json_encode($data);
        }
 
    }


}