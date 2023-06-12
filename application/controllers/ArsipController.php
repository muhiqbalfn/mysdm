<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArsipController extends CI_Controller {

	public function __construct(){
		parent::__construct();

		#security-------------------------------------------------
		if(!$this->session->userdata('security')){ redirect(''); }
		#---------------------------------------------------------

		$this->load->database();
		//$this->load->helper(array('url','file'));
		$this->load->model('ArsipModel');
	}

	/*=========================LOAD DATA DAN HALAMAN=======================*/
	public function menu_sub(){
		//---menu---
		$data['htl'] = $this->ArsipModel->getMenu('htl');
		$data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
		$data['tendik'] = $this->ArsipModel->getMenu('tendik');
		$data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');
		//-----------
		$this->load->view('home',$data);
	}

	//halaman dan data arsip
	public function arsip($id_jenis_file){
		//$id_jenis_file = $this->secure->decrypt_url($id_jenis_file_decrypt);

		//---menu-------
		$data['htl'] = $this->ArsipModel->getMenu('htl');
		$data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
		$data['tendik'] = $this->ArsipModel->getMenu('tendik');
		$data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');

		//--sub menu dropdown----
		$data['sub_parent'] = $this->ArsipModel->getSubMenuParent($id_jenis_file);
		$data['sub'] = $this->ArsipModel->getSubMenu($id_jenis_file);
		//get lokasi halaman (htl/pertor/st)-----
		$data['nama_sub'] = $this->ArsipModel->getNamaSub($id_jenis_file);
		
		//session1-------
		$data_session = array(
			'id_jenis_file' => $id_jenis_file
		);
		$this->session->set_userdata($data_session);

		//data utama--------
		$data['data'] = $this->ArsipModel->getArsip($id_jenis_file);
		$data['data2'] = $this->ArsipModel->getArsip2($id_jenis_file);
		$this->load->view('arsip/arsip',$data);
	}

	public function arsip_year($year){
		//$id_jenis_file = $this->secure->decrypt_url($id_jenis_file_decrypt);
		$id_jenis_file = $this->session->userdata('id_jenis_file');

		//---menu------
		$data['htl'] = $this->ArsipModel->getMenu('htl');
		$data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
		$data['tendik'] = $this->ArsipModel->getMenu('tendik');
		$data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');

		//--sub menu dropdown----
		$data['sub_parent'] = $this->ArsipModel->getSubMenuParent($id_jenis_file);
		$data['sub'] = $this->ArsipModel->getSubMenu($id_jenis_file);
		//get lokasi halaman (htl/pertor/st)-----
		$data['nama_sub'] = $this->ArsipModel->getNamaSub($id_jenis_file);

		//data utama--------
		$data['data'] = $this->ArsipModel->getArsipYear($id_jenis_file,$year);
		$data['data2'] = $this->ArsipModel->getArsipYear2($id_jenis_file,$year);
		$this->load->view('arsip/arsip',$data);
	}

	public function sub_arsip($id_sub_jenis_file){
		//$sub_jenis = $this->secure->decrypt_url($sub_jenis_decrypt);
		$id_jenis_file = $this->session->userdata('id_jenis_file');

		//---menu---
		$data['htl'] = $this->ArsipModel->getMenu('htl');
		$data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
		$data['tendik'] = $this->ArsipModel->getMenu('tendik');
		$data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');

		//--sub menu dropdown--
		$data['sub_parent'] = $this->ArsipModel->getSubMenuParent($id_jenis_file);
		$data['sub'] = $this->ArsipModel->getSubMenu($id_jenis_file);
		//get lokasi halaman (htl/pertor/st) -----
		$data['nama_sub'] = $this->ArsipModel->getNamaSub1($id_sub_jenis_file);

		//session2-------
		$data_session = array(
			'id_sub_jenis_file' => $id_sub_jenis_file
		);
		$this->session->set_userdata($data_session);

		//data utama---
		$data['data'] = $this->ArsipModel->getSubArsip($id_sub_jenis_file);
		$this->load->view('arsip/sub_arsip',$data);
	}

	public function sub_arsip_year($year){
		//$sub_jenis = $this->secure->decrypt_url($sub_jenis_decrypt);
		$id_jenis_file = $this->session->userdata('id_jenis_file');
		$id_sub_jenis_file = $this->session->userdata('id_sub_jenis_file');

		//---menu---
		$data['htl'] = $this->ArsipModel->getMenu('htl');
		$data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
		$data['tendik'] = $this->ArsipModel->getMenu('tendik');
		$data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');

		//--sub menu dropdown--
		$data['sub_parent'] = $this->ArsipModel->getSubMenuParent($id_jenis_file);
		$data['sub'] = $this->ArsipModel->getSubMenu($id_jenis_file);
		//get lokasi halaman (htl/pertor/st) -----
		$data['nama_sub'] = $this->ArsipModel->getNamaSub1($id_sub_jenis_file);

		//data utama---
		$data['data'] = $this->ArsipModel->getSubArsipYear($id_sub_jenis_file,$year);
		$this->load->view('arsip/sub_arsip',$data);
	}

	public function sub_arsip2($id_sub_jenis_file2){
		//$sub_jenis = $this->secure->decrypt_url($sub_jenis_decrypt);
		$id_jenis_file = $this->session->userdata('id_jenis_file');

		//---menu---
		$data['htl'] = $this->ArsipModel->getMenu('htl');
		$data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
		$data['tendik'] = $this->ArsipModel->getMenu('tendik');
		$data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');

		//--sub menu dropdown--
		$data['sub_parent'] = $this->ArsipModel->getSubMenuParent($id_jenis_file);
		$data['sub'] = $this->ArsipModel->getSubMenu($id_jenis_file);
		//get lokasi halaman (htl/pertor/st) -----
		$data['nama_sub'] = $this->ArsipModel->getNamaSub2($id_sub_jenis_file2);

		//session2-------
		$data_session = array(
			'id_sub_jenis_file2' => $id_sub_jenis_file2
		);
		$this->session->set_userdata($data_session);

		//data utama---
		$data['data'] = $this->ArsipModel->getSubArsip2($id_sub_jenis_file2);
		$this->load->view('arsip/sub_arsip2',$data);
	}

	public function sub_arsip2_year($year){
		//$sub_jenis = $this->secure->decrypt_url($sub_jenis_decrypt);
		$id_jenis_file = $this->session->userdata('id_jenis_file');
		$id_sub_jenis_file2 = $this->session->userdata('id_sub_jenis_file2');

		//---menu---
		$data['htl'] = $this->ArsipModel->getMenu('htl');
		$data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
		$data['tendik'] = $this->ArsipModel->getMenu('tendik');
		$data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');

		//--sub menu dropdown--
		$data['sub_parent'] = $this->ArsipModel->getSubMenuParent($id_jenis_file);
		$data['sub'] = $this->ArsipModel->getSubMenu($id_jenis_file);
		//get lokasi halaman (htl/pertor/st) -----
		$data['nama_sub'] = $this->ArsipModel->getNamaSub2($id_sub_jenis_file2);

		//data utama---
		$data['data'] = $this->ArsipModel->getSubArsip2Year($id_sub_jenis_file2,$year);
		$this->load->view('arsip/sub_arsip2',$data);
	}

	//halaman manajemen menu arsip--------------------------------
	public function TambahJenisArsip(){
		//---menu---
		$data['htl'] = $this->ArsipModel->getMenu('htl');
		$data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
		$data['tendik'] = $this->ArsipModel->getMenu('tendik');
		$data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');
		$this->load->view('arsip/jenis_file',$data);
	}













	/*=========================CRUD FILE ARSIP 1=========================*/
    public function add_arsip(){
        //id_sub_jenis_file
        if($this->input->post('id_sub_jenis_file')){      
        	$id_sub_jenis_file = $this->input->post('id_sub_jenis_file'); 
        }else{ 
        	$id_sub_jenis_file = '';
        }

        //status dokumen
        if($this->input->post('status')){      
        	$status = $this->input->post('status'); 
        }else{ 
        	$status = '-'; 
        }

        //mode_show (umum/khusus == 0/1)
        if($this->input->post('mode_show')){      
        	$mode_show = '1'; 
        }else{ 
        	$mode_show = '0'; 
        }

        //upload--------------------------------------
        $config['upload_path']="./assets/arsip";
        $config['allowed_types']='pdf';
        #$config['allowed_types']='pdf|xlsx|xls';
        $config['encrypt_name'] = TRUE;
	    //$config['file_name'] = date('d-m-Y').'_'.$this->input->post('nama_file');
        $this->load->library('upload',$config);

        //file1
        if($this->upload->do_upload("file")){  
        	$data1 = array('upload_data' => $this->upload->data()); 
        }

        //file2
        if($this->upload->do_upload("file2")){ 
        	$data2 = array('upload_data' => $this->upload->data()); 

        	$dat = array(
				'id_jenis_file' 	=> $this->input->post('id_jenis_file'),
				'id_sub_jenis_file' => $id_sub_jenis_file,
				'no_file'	  		=> $this->input->post('no_file'),
				'nama_file'    		=> $this->input->post('nama_file'),
				'tgl_file'      	=> $this->input->post('tgl_file'),
				'file'				=> $data1['upload_data']['file_name'],
				'file2'				=> $data2['upload_data']['file_name'],
				'status'    		=> $status,
				'mode_show'    		=> $mode_show
			);
        }else{
        	$dat = array(
				'id_jenis_file' 	=> $this->input->post('id_jenis_file'),
				'id_sub_jenis_file' => $id_sub_jenis_file,
				'no_file'	  		=> $this->input->post('no_file'),
				'nama_file'    		=> $this->input->post('nama_file'),
				'tgl_file'      	=> $this->input->post('tgl_file'),
				'file'				=> $data1['upload_data']['file_name'],
				'status'    		=> $status,
				'mode_show'    		=> $mode_show
			);	
        }

        $data = $this->ArsipModel->add('tb_file',$dat);
        echo json_decode($result);
    }

    public function del_arsip(){
		$id   = array('id_file' => $this->input->post('data1'));
		$data = $this->ArsipModel->del($id,'tb_file');
		echo json_encode($data);
	}

	public function get_edit(){
        $id   = $this->input->get('data1');
        $data = $this->ArsipModel->get_edit($id);
        echo json_encode($data);
    }

    public function edit_arsip(){
		$config['upload_path']="./assets/arsip";
        $config['allowed_types']='pdf';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload',$config);

	    //file=ada
        if($this->upload->do_upload("file1")){  
        	$data1 = array('upload_data' => $this->upload->data()); 

	        //file2=ada
	        if($this->upload->do_upload("file21")){ 
	        	$data2 = array('upload_data' => $this->upload->data()); 

	        	$dat = array(
					'no_file'	  		=> $this->input->post('no_file1'),
					'nama_file'    		=> $this->input->post('nama_file1'),
					'tgl_file'      	=> $this->input->post('tgl_file1'),
					'file'				=> $data1['upload_data']['file_name'],
					'file2'				=> $data2['upload_data']['file_name'],
					'status'    		=> $this->input->post('status1'),
					'mode_show'    		=> $this->input->post('mode_show1')
				);
	        }else{ //file2=tdk ada
	        	$dat = array(
					'no_file'	  		=> $this->input->post('no_file1'),
					'nama_file'    		=> $this->input->post('nama_file1'),
					'tgl_file'      	=> $this->input->post('tgl_file1'),
					'file'				=> $data1['upload_data']['file_name'],
					'status'    		=> $this->input->post('status1'),
					'mode_show'    		=> $this->input->post('mode_show1')
				);	
	        }
	    }else{ //file1=tdk ada
	    	//file2=ada
	        if($this->upload->do_upload("file21")){ 
	        	$data2 = array('upload_data' => $this->upload->data()); 

	        	$dat = array(
					'no_file'	  		=> $this->input->post('no_file1'),
					'nama_file'    		=> $this->input->post('nama_file1'),
					'tgl_file'      	=> $this->input->post('tgl_file1'),
					'file2'				=> $data2['upload_data']['file_name'],
					'status'    		=> $this->input->post('status1'),
					'mode_show'    		=> $this->input->post('mode_show1')
				);
	        }else{//file2=tdk ada
	        	$dat = array(
					'no_file'	  		=> $this->input->post('no_file1'),
					'nama_file'    		=> $this->input->post('nama_file1'),
					'tgl_file'      	=> $this->input->post('tgl_file1'),
					'status'    		=> $this->input->post('status1'),
					'mode_show'    		=> $this->input->post('mode_show1')
				);	
	        }
	    }


        $id    = array('id_file' => $this->input->post('id_file1'));
		$data  = $this->ArsipModel->edit('tb_file',$dat,$id);
		echo json_encode($data);
	}













	/*=========================CRUD FILE ARSIP 2=========================*/
    public function add_arsip2(){
        //status dokumen
        if($this->input->post('status')){      
        	$status = $this->input->post('status'); 
        }else{ 
        	$status = ''; 
        }

        //mode_show (umum/khusus == 0/1)
        if($this->input->post('mode_show')){      
        	$mode_show = '1'; 
        }else{ 
        	$mode_show = '0'; 
        }

        //upload--------------------------------------
        $config['upload_path']="./assets/arsip";
        $config['allowed_types']='pdf';
        $config['encrypt_name'] = TRUE;
        //$config['max_size'] = '1024';
	    //$config['max_width']  = '1024';
	    //$config['max_height']  = '768';
	    //$config['file_name'] = date('d-m-Y').'_'.$this->input->post('nama_file');
         
        $this->load->library('upload',$config);

        //file1
        if($this->upload->do_upload("file")){
            $data1 = array('upload_data' => $this->upload->data());
        }
        //jika ada file2
        if($this->upload->do_upload("file2")){
            $data2 = array('upload_data' => $this->upload->data());

        	$dat = array(
				'id_sub_jenis_file2'=> $this->input->post('id_sub_jenis_file2'),
				'no_file'	  		=> $this->input->post('no_file'),
				'nama_file'    		=> $this->input->post('nama_file'),
				'tgl_file'      	=> $this->input->post('tgl_file'),
				'file'				=> $data1['upload_data']['file_name'],
				'file2'				=> $data2['upload_data']['file_name'],
				'status'    		=> $status,
				'mode_show'    		=> $mode_show
			);
        }else{
        	$dat = array(
				'id_sub_jenis_file2'=> $this->input->post('id_sub_jenis_file2'),
				'no_file'	  		=> $this->input->post('no_file'),
				'nama_file'    		=> $this->input->post('nama_file'),
				'tgl_file'      	=> $this->input->post('tgl_file'),
				'file'				=> $data1['upload_data']['file_name'],
				'status'    		=> $status,
				'mode_show'    		=> $mode_show
			);
        }
			$data = $this->ArsipModel->add('tb_file2',$dat);
            echo json_decode($result);
    }

    public function del_arsip2(){
		$id   = array('id_file2' => $this->input->post('data1'));
		$data = $this->ArsipModel->del($id,'tb_file2');
		echo json_encode($data);
	}

	public function get_edit2(){
        $id   = $this->input->get('data1');
        $data = $this->ArsipModel->get_edit2($id);
        echo json_encode($data);
    }

    public function edit_arsip2(){
		$config['upload_path']="./assets/arsip";
        $config['allowed_types']='pdf';
        $config['encrypt_name'] = TRUE;
         
        $this->load->library('upload',$config);

        //file=ada
        if($this->upload->do_upload("file1")){  
        	$data1 = array('upload_data' => $this->upload->data()); 

	        //file2=ada
	        if($this->upload->do_upload("file21")){ 
	        	$data2 = array('upload_data' => $this->upload->data()); 

	        	$dat = array(
					'no_file'	  		=> $this->input->post('no_file1'),
					'nama_file'    		=> $this->input->post('nama_file1'),
					'tgl_file'      	=> $this->input->post('tgl_file1'),
					'file'				=> $data1['upload_data']['file_name'],
					'file2'				=> $data2['upload_data']['file_name'],
					'status'    		=> $this->input->post('status1'),
					'mode_show'    		=> $this->input->post('mode_show1')
				);
	        }else{ //file2=tdk ada
	        	$dat = array(
					'no_file'	  		=> $this->input->post('no_file1'),
					'nama_file'    		=> $this->input->post('nama_file1'),
					'tgl_file'      	=> $this->input->post('tgl_file1'),
					'file'				=> $data1['upload_data']['file_name'],
					'status'    		=> $this->input->post('status1'),
					'mode_show'    		=> $this->input->post('mode_show1')
				);	
	        }
	    }else{ //file1=tdk ada
	    	//file2=ada
	        if($this->upload->do_upload("file21")){ 
	        	$data2 = array('upload_data' => $this->upload->data()); 

	        	$dat = array(
					'no_file'	  		=> $this->input->post('no_file1'),
					'nama_file'    		=> $this->input->post('nama_file1'),
					'tgl_file'      	=> $this->input->post('tgl_file1'),
					'file2'				=> $data2['upload_data']['file_name'],
					'status'    		=> $this->input->post('status1'),
					'mode_show'    		=> $this->input->post('mode_show1')
				);
	        }else{//file2=tdk ada
	        	$dat = array(
					'no_file'	  		=> $this->input->post('no_file1'),
					'nama_file'    		=> $this->input->post('nama_file1'),
					'tgl_file'      	=> $this->input->post('tgl_file1'),
					'status'    		=> $this->input->post('status1'),
					'mode_show'    		=> $this->input->post('mode_show1')
				);	
	        }
	    }

        $id    = array('id_file2' => $this->input->post('id_file1'));
		$data  = $this->ArsipModel->edit('tb_file2',$dat,$id);
		echo json_encode($data);
	}













	//=========================CRUD JENIS ARSIP=========================
	public function add_jenis(){
        $dat = array(
			'id_sub_file'=> $this->input->post('data1'),
			'jenis_file' => $this->input->post('data2')
		);
		$data = $this->ArsipModel->add('tb_jenis_file',$dat);
		echo json_encode($data);
    }

    public function del_jenis(){
		$id   = array('id_jenis_file' => $this->input->post('data1'));
		$data = $this->ArsipModel->del($id,'tb_jenis_file');
		echo json_encode($data);
	}

	public function get_edit_jenis(){
        $id   = $this->input->get('data1');
        $data = $this->ArsipModel->get_edit_jenis($id);
        echo json_encode($data);
    }

    public function edit_jenis(){
		$dat = array(
			'jenis_file' => $this->input->post('data2')
		);
		$id    = array('id_jenis_file' => $this->input->post('data1'));
		$data  = $this->ArsipModel->edit('tb_jenis_file',$dat,$id);
		echo json_encode($data);
	}










	//=========================CRUD SUB JENIS ARSIP 1=========================
	public function add_sub(){
        $dat = array(
			'id_jenis_file'=> $this->input->post('data1'),
			'sub_jenis_file' => $this->input->post('data2')
		);
		$data = $this->ArsipModel->add('tb_sub_jenis_file',$dat);
		echo json_encode($data);
    }

    public function get_edit_sub(){
        $id   = $this->input->get('data1');
        $data = $this->ArsipModel->get_edit_sub($id);
        echo json_encode($data);
    }

    public function edit_sub(){
		$dat = array(
			'sub_jenis_file' => $this->input->post('data2')
		);
		$id    = array('id_sub_jenis_file' => $this->input->post('data1'));
		$data  = $this->ArsipModel->edit('tb_sub_jenis_file',$dat,$id);
		echo json_encode($data);
	}

    public function del_sub(){
		$id   = array('id_sub_jenis_file' => $this->input->post('data1'));
		$data = $this->ArsipModel->del($id,'tb_sub_jenis_file');
		echo json_encode($data);
	}














	//=========================CRUD SUB JENIS ARSIP 2=========================
	public function add_sub2(){
        $dat = array(
			'id_sub_jenis_file'=> $this->input->post('data1'),
			'sub_jenis_file2' => $this->input->post('data2')
		);
		$data = $this->ArsipModel->add('tb_sub_jenis_file2',$dat);

		//edit tb_sub_jenis_file parent
		$dat2 = array(
			  'parent' => '1'
		);
		$id    = array('id_sub_jenis_file' => $this->input->post('data1'));
		$data  = $this->ArsipModel->edit('tb_sub_jenis_file',$dat2,$id);

		echo json_encode($data);
    }

    public function get_edit_sub2(){
        $id   = $this->input->get('data1');
        $data = $this->ArsipModel->get_edit_sub2($id);
        echo json_encode($data);
    }

    public function edit_sub2(){
		$dat = array(
			'sub_jenis_file2' => $this->input->post('data2')
		);
		$id    = array('id_sub_jenis_file2' => $this->input->post('data1'));
		$data  = $this->ArsipModel->edit('tb_sub_jenis_file2',$dat,$id);
		echo json_encode($data);
	}

    public function del_sub2(){
		$id   = array('id_sub_jenis_file2' => $this->input->post('data1'));
		$data = $this->ArsipModel->del($id,'tb_sub_jenis_file2');
		echo json_encode($data);
	}

}
