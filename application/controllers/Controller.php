<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('All_m');
        $this->load->model('Controller_m');
		$this->load->library('secure');
	}

	public function home(){
        $this->load->view('sso/homeku');
    }

    public function index(){
        $data['peraturan'] = $this->All_m->get('tb_dok_peraturan');
        $data['dokumen'] = $this->All_m->get('tb_dok_dokumen');
        $data['materi'] = $this->All_m->get('tb_dok_materi');
		$this->load->view('sso/home',$data);
	}



    #TENTANG SDM --------------------------------------------------------------------------
    public function tentang_kami(){
        $this->load->view('sso/topbar/tentang_kami');
    }

    public function struktur_organisasi(){
        $this->load->view('sso/topbar/struktur_organisasi');
    }
        
    public function layanan(){
        $this->load->view('sso/topbar/layanan');
    }



    #DOKUMEN ------------------------------------------------------------------------------
    public function peraturan(){
        $data['dok'] = $this->All_m->get('tb_dok_peraturan');
        $this->load->view('sso/topbar/dok_peraturan',$data);
    }

    public function dokumen(){
        $data['dok'] = $this->All_m->get('tb_dok_dokumen');
        $this->load->view('sso/topbar/dok_dokumen',$data);
    }
        
    public function materi(){
        $data['dok'] = $this->All_m->get('tb_dok_materi');
        $this->load->view('sso/topbar/dok_materi',$data);
    }






    #PROFIL ----------------------------------------------------------------------
    public function profil(){
        $data['profil'] = $this->Controller_m->get_profil(); 
        $this->load->view('sso/topbar/profil',$data);
    }

    public function edit_password(){
        $dat = array(
            'pass'  => $this->input->post('data2')
        );
        $id = array(
            'nip'   => $this->input->post('data1')
        );
        $data  = $this->All_m->edit('tb_pegawai',$dat,$id);
        echo json_encode($data);
    } 







    #LOGIN SSO ----------------------------------------------------------------------------
    public function proses_login(){
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');

        $cek  = $this->db->select('*')->from('tb_pegawai')->where('nip',$user)->get()->row();
        if($cek){
            if($pass == $cek->pass){
                $data = array(
                    'session_id'    => strtotime(date('Y-m-d H:i:s')),
                    'security'      => 'masuk',
                    'nip'           => $cek->nip,
                    'namapeg'       => $cek->namalengkap,
                    'email'         => $cek->email_unesa,
                    'namajf'        => $cek->namajfungsional,
                    'statuspeg'     => $cek->namastatuspegawai,
                    'unitkerja'     => $cek->namaparentsatker,
                    'parentsatker'  => $cek->namaparentsatker,
                    'satker'        => $cek->namasatker,
                    'mkthngol'      => $cek->mkthngol,
                    'mkblngol'      => $cek->mkblngol,
                    'isdosen'       => $cek->isdosen,
                    'akses'         => $cek->akses
                );
                $this->session->set_userdata($data);
                $respon = array(
                    'is_true' => 1,
                    'title'   => 'Success',
                    'msg'     => 'Akses diberikan !',
                    'icon'    => 'success' 
                );
            }else{
                $respon = array(
                    'is_true' => 0,
                    'title'   => 'Oopss.. !',
                    'msg'     => 'Password yang anda masukan salah',
                    'icon'    => 'error' 
                );
            }
        }else{
            $respon = array(
                'is_true' => 0,
                'title' => 'Oopss.. !',
                'msg' => 'Username yang anda masukan salah',
                'icon' => 'error' 
            );
        }
        echo json_encode($respon);
    }
    

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url(''));
    }

}
