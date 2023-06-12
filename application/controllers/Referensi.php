<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Referensi extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        #security-------------------------------------------------
        if(!$this->session->userdata('security')){ redirect(''); }
        #---------------------------------------------------------

        $this->load->model('All_m');
        $this->load->model('Referensi_m');
        $this->load->model('ArsipModel');
    }

    public function unit(){
        //---menu---
        $data['htl'] = $this->ArsipModel->getMenu('htl');
        $data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
        $data['tendik'] = $this->ArsipModel->getMenu('tendik');
        $data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');
        //-----------

        $data['unit'] = $this->Referensi_m->get_unit_distinc(); 
        $this->load->view('referensi/unit',$data);
    }



}