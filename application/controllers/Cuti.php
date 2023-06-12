<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		#security-------------------------------------------------
		if(!$this->session->userdata('security')){ redirect(''); }
		#---------------------------------------------------------

		$this->load->model('All_m');
		$this->load->model('Cuti_m');
	}

	public function index(){
		$data['jeniscuti'] = $this->All_m->get('tb_cuti_jeniscuti'); 
		$this->load->view('cuti/home',$data);
	}

	public function tahunan(){
		$this->load->view('cuti/tahunan');
	}




	#LIST CUTI UNTUK ADMIN FAKULTAS -----------------------------
	public function listcuti(){
		$data['getusulan'] = $this->Cuti_m->getusulancuti(); 
		$this->load->view('cuti/listcuti',$data);
	}	




	#CEKIDENTITAS -----------------------------------
	public function identitas($kodejeniscuti){
		#session----
		if($kodejeniscuti){
			$cek  = $this->db->from('tb_cuti_jeniscuti')->where('kodejeniscuti',$kodejeniscuti)->get()->row();
			$data_ses = array(
				'id_jeniscuti'   => $cek->id_jeniscuti,
				'kodejeniscuti'  => $cek->kodejeniscuti,
				'namajeniscuti'	 => $cek->namajeniscuti
			);
			$this->session->set_userdata($data_ses);
		}
		
		$idjeniscuti   = $this->session->userdata('idjeniscuti');

		$data['judulcuti'] = $this->Cuti_m->judulcuti($idjeniscuti);
		$this->load->view('cuti/cekidentitas',$data);
	} 

	public function cekidentitas(){
		$this->load->view('cuti/cekidentitas');
	} 

	public function simpan_cekidentitas(){
        $dat = array(
			'id_jeniscuti' 		=> $this->input->post('data1'),
			'nip' 				=> $this->input->post('data2'),
			'statususulancuti' 	=> 0
		);
		$data = $this->All_m->add('tb_cuti_usulancuti',$dat);
		echo json_encode($data);
	}






	#PENGISIANDATA ------------------------------------
	public function pengisiandata(){
		#get list jenis cuti alasanpenting
		#$data['cutipenting'] = $this->All_m->get('tb_cuti_cutipenting');
		$data['cutipenting'] = $this->Cuti_m->getcutipenting();

		#get data usulan cuti where nip and statususulan=0
		$data['datausulan'] = $this->Cuti_m->getdatausulan();

		$this->load->view('cuti/pengisiandata',$data);
	}

	public function edit_pengisiandata(){
	$config['upload_path']="./assets/berkascuti";
        $config['allowed_types']='pdf';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload',$config);

        $this->upload->do_upload("file_usulancuti");
        $file1 = array('upload_data' => $this->upload->data()); 
        $this->upload->do_upload("file_suratdokter");
        $file2 = array('upload_data' => $this->upload->data()); 

        
        #opsi berdasarkan kodejeniscuti
        $kdcuti = $this->input->post('kodejeniscuti');

        if($kdcuti=='cutitahun'){
			$dat = array(
				'tgl_mulai' 		=> $this->input->post('tgl_mulai'),
				'tgl_selesai'		=> $this->input->post('tgl_selesai'),
				'file_usulancuti'  	=> $file1['upload_data']['file_name']
			);
		}else if($kdcuti=='cutisakit'){
			$dat = array(
				'tgl_mulai' 		=> $this->input->post('tgl_mulai'),
				'tgl_selesai'		=> $this->input->post('tgl_selesai'),
				'file_usulancuti'  	=> $file1['upload_data']['file_name'],
				'file_suratdokter'  => $file2['upload_data']['file_name']
			);
		}else if($kdcuti=='cutilahir'){
			$dat = array(
				'tgl_mulai' 		=> $this->input->post('tgl_mulai'),
				'tgl_selesai'		=> $this->input->post('tgl_selesai'),
				'anak_ke'			=> $this->input->post('anak_ke'),
				'file_usulancuti'  	=> $file1['upload_data']['file_name'],
				'file_suratdokter'  => $file2['upload_data']['file_name']
			);
		}else if($kdcuti=='cutipenting'){
			$dat = array(
				'tgl_mulai' 		=> $this->input->post('tgl_mulai'),
				'tgl_selesai'		=> $this->input->post('tgl_selesai'),
				'id_cutipenting'	=> $this->input->post('id_cutipenting'),
				'file_usulancuti'  	=> $file1['upload_data']['file_name'],
				'file_suratdokter'  => $file2['upload_data']['file_name']
			);
		}else if($kdcuti=='cutibesar'){
			$dat = array(
				'tgl_mulai' 		=> $this->input->post('tgl_mulai'),
				'tgl_selesai'		=> $this->input->post('tgl_selesai'),
				'file_usulancuti'  	=> $file1['upload_data']['file_name'],
				'file_suratdokter'  => $file2['upload_data']['file_name']
			);
		}else{
			die('Tidak ada jenis cuti yang dipilih.');
		}


		$id = array(
			'nip' 				=> $this->session->userdata('nip'),
			'statususulancuti' 	=> 0
		);
		$data  = $this->All_m->edit('tb_cuti_usulancuti',$dat,$id);
		echo json_encode($data);
	}








	#VERIFIKASI -----------------------------------
	public function verifikasi(){
		#get data usulan cuti where nip and statususulan=0
		$data['datausulan'] = $this->Cuti_m->getdatausulan();
		$this->load->view('cuti/verifikasi',$data);
	} 

	public function edit_verifikasi(){
		$kodejeniscuti  = $this->session->userdata('kodejeniscuti');
		$nip 			= $this->session->userdata('nip');
		$thn_now 		= date('Y'); //tahun sekarang

		#untuk meneruskan aksi coding jika perhitungan sisa cuti memenuhi, jika gagal maka else (nilai $aksi=1)
		$aksi = 0; 


		#jika cuti tahunan
		if($kodejeniscuti=='cutitahun'){

			//perhitungan sisa cuti ----------------------------------------------------------------
			$sisacutithn_2   = $this->input->post('sisacutithn_2');   //sisa cuti 2 thn yg lalu
			$sisacutithn_1   = $this->input->post('sisacutithn_1');	  //sisa cuti 1 thn yg lalu
			$sisacutithn_now = $this->input->post('sisacutithn_now'); //sisa cuti thn now
			$totalcuti       = $this->input->post('totalcuti');       //total durasi cuti yg akan diambil


			#jika $totalcuti <= sisa cuti 2 thn yg lalu
			if($totalcuti <= $sisacutithn_2){

				
				$sisa_2 = $sisacutithn_2 - $totalcuti;
				
				//update sisa cuti 2 thn yg lalu
				$dat_2 = array(
					'jml_sisacuti' 	=> $sisa_2
				);
				$id_2 = array(
					'nip'          => $nip,
					'thn_sisacuti' => $thn_now-2
				);
				$this->All_m->edit('tb_cuti_sisacutitahunan',$dat_2,$id_2);


			#jika $totalcuti > sisa cuti 2 thn yg lalu DAN $totalcuti <= (2 thn lalu + 1 thn lalu)
			}else if( ($totalcuti > $sisacutithn_2) && ($totalcuti <= ($sisacutithn_2+$sisacutithn_1)) ){

				
				$sisa_2 = $sisacutithn_2 - $totalcuti;
				$sisa_1 = $sisacutithn_1 + $sisa_2;     // (+) karena hasil dari $sisa_2 adalah (-)

				//update sisa cuti 2 thn yg lalu----------------
				$dat_2 = array(
					'jml_sisacuti' 	=> 0
				);
				$id_2 = array(
					'nip'          => $nip,
					'thn_sisacuti' => $thn_now-2
				);
				$this->All_m->edit('tb_cuti_sisacutitahunan',$dat_2,$id_2);


				//update sisa cuti 1 thn yg lalu----------------
				$dat_1 = array(
					'jml_sisacuti' 	=> $sisa_1
				);
				$id_1 = array(
					'nip'          => $nip,
					'thn_sisacuti' => $thn_now-1
				);
				$this->All_m->edit('tb_cuti_sisacutitahunan',$dat_1,$id_1);

			#jika $totalcuti > sisa cuti 2 thn lalu DAN > (sisa 2 thn lalu + 1 thn lalu) DAN <= (sisa 2 thn lalu + 1 thn lalu + sisa thn now) 
			}else if( ($totalcuti > $sisacutithn_2) && ($totalcuti > ($sisacutithn_2+$sisacutithn_1)) && ($totalcuti <= ($sisacutithn_2+$sisacutithn_1+$sisacutithn_now)) ){


				$sisa_2   = $sisacutithn_2 - $totalcuti;
				$sisa_1   = $sisacutithn_1 + $sisa_2;     // (+) karena hasil dari $sisa_2 adalah (-)  
				$sisa_now = $sisacutithn_now + $sisa_1;	  // (+) karena hasil dari $sisa_1 adalah (-)

	 			//update sisa cuti 2 thn yg lalu----------------
				$dat_2 = array(
					'jml_sisacuti' 	=> 0
				);
				$id_2 = array(
					'nip'          => $nip,
					'thn_sisacuti' => $thn_now-2
				);
				$this->All_m->edit('tb_cuti_sisacutitahunan',$dat_2,$id_2);


				//update sisa cuti 1 thn yg lalu----------------
				$dat_1 = array(
					'jml_sisacuti' 	=> 0
				);
				$id_1 = array(
					'nip'          => $nip,
					'thn_sisacuti' => $thn_now-1
				);
				$this->All_m->edit('tb_cuti_sisacutitahunan',$dat_1,$id_1);


				//update sisa cuti thn now----------------------
				$dat_now = array(
					'jml_sisacuti' 	=> $sisa_now
				);
				$id_now = array(
					'nip'          => $nip,
					'thn_sisacuti' => $thn_now
				);
				$this->All_m->edit('tb_cuti_sisacutitahunan',$dat_now,$id_now);


			}else{

				$aksi = 1; //sebagai tanda jika perhitungan sisa cuti tidak memenuhi

			}
			//---------------------------------------------------------------------------------------

			#jika perhitungan sisa cuti memenuhi
			if($aksi == 0){

				//merubah statususulancuti di tb_usulancuti
				$dat = array(
					'statususulancuti' 	=> 1
				);
				$id = array(
					'nip' 				=> $nip,
					'statususulancuti' 	=> 0
				);
				$data  = $this->All_m->edit('tb_cuti_usulancuti',$dat,$id);

			}


		#jika bukan cuti tahunan
		}else{
			
			//merubah statususulancuti di tb_usulancuti
			$dat = array(
				'statususulancuti' 	=> 1
			);
			$id = array(
				'nip' 				=> $nip,
				'statususulancuti' 	=> 0
			);
			$data  = $this->All_m->edit('tb_cuti_usulancuti',$dat,$id);
		}
		echo json_encode($data);
	} 








	#RIWAYATCUTI ----------------------------------
	public function riwayatcuti(){
		$data['riwayat'] = $this->Cuti_m->getriwayat(); 
		$this->load->view('cuti/riwayatcuti',$data);
	}

	public function delriwayat_belumfinal(){
		$id   = array('idusulancuti' => $this->input->post('data1'));
		$data = $this->All_m->del($id,'tb_cuti_usulancuti');
		echo json_encode($data);
	}
	





	#GANTI PASSWORD ----------------------------------
	public function gantipass(){
		$data['data'] = $this->Cuti_m->getpass(); 
		$this->load->view('cuti/gantipass',$data);
	}

	public function edit_pass(){
		$dat = array(
			'pass' 	=> $this->input->post('data2')
		);
		$id = array(
			'nip' 	=> $this->input->post('data1')
		);
		$data  = $this->All_m->edit('tb_pegawai',$dat,$id);
		echo json_encode($data);
	} 

	#login ----------------------------------------------------
	public function proses_login(){
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');

        $cek  = $this->db->select('*')->from('tb_pegawai')->where('nip',$user)->get()->row();
        if($cek){
            if($pass == $cek->pass){
                $data = array(
                    'session_id'=> strtotime(date('Y-m-d H:i:s')),
                    'nip'       => $cek->nip,
                    'namapeg'   => $cek->namalengkap,
                    'namajf'    => $cek->namajfungsional,
                    'statuspeg' => $cek->namastatuspegawai,
                    'unitkerja' => $cek->namaparentsatker,
                    'mkthngol'  => $cek->mkthngol,
                    'mkblngol'  => $cek->mkblngol,
                    'isdosen'   => $cek->isdosen
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


}