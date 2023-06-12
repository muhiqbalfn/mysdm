<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gelar extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		#security-------------------------------------------------
		if(!$this->session->userdata('security')){ redirect(''); }
		#---------------------------------------------------------

		$this->load->model('All_m');
		$this->load->model('Gelar_m');
	}

	public function index(){ 
		$data['data'] = $this->Gelar_m->get_pg_pegawai();
		$this->load->view('gelar/home',$data);
	}

	public function detail_berkas($id_pg){
		$data['data'] = $this->Gelar_m->get_pg_berkas($id_pg);
		$this->load->view('gelar/detail_berkas',$data);
	}




	#============================ CRUD USULAN ============================

	public function tambah_usulan(){ 
		$data['pegawai'] = $this->Gelar_m->get_pegawai_unit();
		$this->load->view('gelar/tambah_usulan',$data);
	}

    public function add_usulan(){
        $config['upload_path']		= "./assets/dokumen/gelar";
        $config['allowed_types']	= "pdf";
        $config['encrypt_name'] 	= TRUE;
	    //$config['file_name'] 		= date('d-m-Y').'_'.$this->input->post('nama_file');

        $this->load->library('upload',$config);

        $this->upload->do_upload("file_ijazah");  
        $data1 = array('upload_data' => $this->upload->data());
        $this->upload->do_upload("file_transkrip");  
        $data2 = array('upload_data' => $this->upload->data());
        $this->upload->do_upload("file_sktubel");  
        $data3 = array('upload_data' => $this->upload->data());
        $this->upload->do_upload("file_akreditasiprodi");  
        $data4 = array('upload_data' => $this->upload->data());
        $this->upload->do_upload("file_skkp");  
        $data5 = array('upload_data' => $this->upload->data());
        $this->upload->do_upload("file_skcpns");  
        $data6 = array('upload_data' => $this->upload->data());
        $this->upload->do_upload("file_skpns");  
        $data7 = array('upload_data' => $this->upload->data());
        $this->upload->do_upload("file_skp2thn");  
        $data8 = array('upload_data' => $this->upload->data());
        $this->upload->do_upload("file_skjf");  
        $data9 = array('upload_data' => $this->upload->data());
        $this->upload->do_upload("file_suratpengantar");  
        $data10 = array('upload_data' => $this->upload->data());
        $this->upload->do_upload("file_suketizindikti");  
        $data11 = array('upload_data' => $this->upload->data());

    	$dat = array(
			'nip'			 		=> $this->input->post('nip'),
			'jenjang'	  			=> $this->input->post('jenjang'),

			'file_ijazah'			=> $data1['upload_data']['file_name'],
			'status_ijazah'    		=> 1,
			'ket_ijazah'    		=> '-',

			'file_transkrip'		=> $data2['upload_data']['file_name'],
			'status_transkrip'    	=> 1,
			'ket_transkrip'    		=> '-',

			'file_sktubel'			=> $data3['upload_data']['file_name'],
			'status_sktubel'    	=> 1,
			'ket_sktubel'    		=> '-',

			'file_akreditasiprodi'	=> $data4['upload_data']['file_name'],
			'status_akreditasiprodi'=> 1,
			'ket_akreditasiprodi'   => '-',

			'file_skkp'				=> $data5['upload_data']['file_name'],
			'status_skkp'    		=> 1,
			'ket_skkp'    			=> '-',

			'file_skcpns'			=> $data6['upload_data']['file_name'],
			'status_skcpns'    		=> 1,
			'ket_skcpns'    		=> '-',

			'file_skpns'			=> $data7['upload_data']['file_name'],
			'status_skpns'    		=> 1,
			'ket_skpns'    			=> '-',

			'file_skp2thn'			=> $data8['upload_data']['file_name'],
			'status_skp2thn'    	=> 1,
			'ket_skp2thn'    		=> '-',

			'file_skjf'				=> $data9['upload_data']['file_name'],
			'status_skjf'    		=> 1,
			'ket_skjf'    			=> '-',

			'file_suratpengantar'	=> $data10['upload_data']['file_name'],
			'status_suratpengantar' => 1,
			'ket_suratpengantar'    => '-',

			'file_suketizindikti'	=> $data11['upload_data']['file_name'],
			'status_suketizindikti' => 1,
			'ket_suketizindikti'    => '-',

			'status_pg'    			=> '1'

		);

        $data = $this->All_m->add('tb_pg',$dat);
        echo json_decode($result);
    }

    public function del_usulan(){
		$id   = array('id_pg' => $this->input->post('data1'));
		$data = $this->All_m->del($id,'tb_pg');
		echo json_encode($data);
	}

	public function revisi_berkas(){
        $config['upload_path']		= "./assets/dokumen/gelar";
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
			
			$id    = array('id_pg' => $this->input->post('id_pg'));
			$data  = $this->All_m->edit('tb_pg',$dat,$id);
			echo json_encode($data);
        }
 
    }

}