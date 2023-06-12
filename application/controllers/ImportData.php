<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ImportData extends CI_Controller {

	public function __construct(){
		parent::__construct();

		#security-------------------------------------------------
		if(!$this->session->userdata('security')){ redirect(''); }
		#---------------------------------------------------------

		$this->load->model('All_m');
		$this->load->model('ArsipModel');
	}

	public function index(){
		//---menu---
		$data['htl'] = $this->ArsipModel->getMenu('htl');
		$data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
		$data['tendik'] = $this->ArsipModel->getMenu('tendik');
		$data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');
		//-----------
		$this->load->view('fungsikusus/importdata',$data);
	}

	public function importexcel_mknonpns(){
        if(isset($_FILES["file"]["name"])){
            //upload
            $file_tmp  = $_FILES['file']['tmp_name'];
            $file_name = $_FILES['file']['name'];
            $file_size = $_FILES['file']['size'];
            $file_type = $_FILES['file']['type'];
            // move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads
            //require 'PHPExcel/Classes/PHPExcel.php';
            
            $object = PHPExcel_IOFactory::load($file_tmp);
    
            foreach($object->getWorksheetIterator() as $worksheet){
    
                $highestRow 	= $worksheet->getHighestRow();
                $highestColumn 	= $worksheet->getHighestColumn();
    
                for($row=3; $row<=$highestRow; $row++){
    
                    $nip 		= $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $mkthn 		= $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $mkbln	    = $worksheet->getCellByColumnAndRow(3, $row)->getValue();

                    $dat = array(
						'mkthngol'	    => $mkthn,
						'mkblngol'  	=> $mkbln
                    );

                    $id = array(
						'nip' 	=> $nip
					);

                    $data  = $this->All_m->edit('tb_pegawai',$dat,$id);

                }
            }
    		
    		$message = array(
                'message'=>'<div class="alert alert-success">Import file excel berhasil</div>',
            );
            $this->session->set_flashdata($message);
            redirect('ImportData');
        }
        else
        {
            $message = array(
                'message'=>'<div class="alert alert-danger">Import file excel gagal</div>',
            );
            $this->session->set_flashdata($message);
            redirect('ImportData');
        }
    }

    public function importexcel_sisacuti(){
        if(isset($_FILES['file']['name'])){
            //upload
            $file_tmp  = $_FILES['file']['tmp_name'];
            $file_name = $_FILES['file']['name'];
            $file_size = $_FILES['file']['size'];
            $file_type = $_FILES['file']['type'];
            // move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads
            //require 'PHPExcel/Classes/PHPExcel.php';
            
            $object = PHPExcel_IOFactory::load($file_tmp);
    
            foreach($object->getWorksheetIterator() as $worksheet){
    
                $highestRow     = $worksheet->getHighestRow();
                $highestColumn  = $worksheet->getHighestColumn();
    
                for($row=3; $row<=$highestRow; $row++){
    
                    $nip        = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $tahun      = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $sisacuti   = $worksheet->getCellByColumnAndRow(3, $row)->getValue();

                    $dat = array(
                        'nip'           => $nip,
                        'thn_sisacuti'  => $tahun,
                        'jml_sisacuti'  => $sisacuti
                    );

                    $this->All_m->add('tb_cuti_sisacutitahunan',$dat);
                }
            }
            
            $message = array(
                'message'=>'<div class="alert alert-success">Import file excel sisa cuti berhasil</div>',
            );
            $this->session->set_flashdata($message);
            redirect('ImportData');
        }
        else
        {
            $message = array(
                'message'=>'<div class="alert alert-danger">Import file excel sisa cuti gagal</div>',
            );
            $this->session->set_flashdata($message);
            redirect('ImportData');
        }
    }



}
