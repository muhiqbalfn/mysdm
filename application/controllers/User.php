<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        #security-------------------------------------------------
        if(!$this->session->userdata('security')){ redirect(''); }
        #---------------------------------------------------------

        $this->load->model('All_m');
        $this->load->model('User_m');
        $this->load->model('ArsipModel');
    }

    public function pegawai(){
        //---menu---
        $data['htl'] = $this->ArsipModel->getMenu('htl');
        $data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
        $data['tendik'] = $this->ArsipModel->getMenu('tendik');
        $data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');
        //-----------

        $data['pegawai'] = $this->All_m->get('tb_pegawai'); 
        $this->load->view('user/pegawai',$data);
    }

    public function user(){
        //---menu---
        $data['htl'] = $this->ArsipModel->getMenu('htl');
        $data['pendidik'] = $this->ArsipModel->getMenu('pendidik');
        $data['tendik'] = $this->ArsipModel->getMenu('tendik');
        $data['permintaan_data'] = $this->ArsipModel->getMenu('permintaan_data');
        //-----------

        $data['user'] = $this->All_m->get('tb_pegawai'); 
        $this->load->view('user/user',$data);
    }




    


    #==================================================================
    #EDIT AKSES USER
    #==================================================================
    public function get_edit(){
        $id   = $this->input->get('data1');
        $data = $this->User_m->get_edit($id);
        echo json_encode($data);
    }

    public function edit_user(){
        $dat = array(
            'akses' => $this->input->post('data2'),
            'pass'  => $this->input->post('data3')
        );
        $id    = array('idpegawai' => $this->input->post('data1'));
        $data  = $this->All_m->edit('tb_pegawai',$dat,$id);
        echo json_encode($data);
    }



}