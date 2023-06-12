<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct(){
		parent::__construct();

		#security--------------------------------------------------
		if (!$this->session->userdata('security')){ redirect(''); }
		#----------------------------------------------------------
		
		$this->load->model('All_m');
	}


	#==========================================================================================
	#CONTOH API
	#==========================================================================================
	public function data_api(){
		$this->curl->create('https://i-sdm.unesa.ac.id/api/data/pegawai/list');
		$result = $this->curl->execute();
		print_r($result);exit();

		#$data['pegawai'] = json_decode($result);
		#$this->load->view('');
	}



	#==========================================================================================
	#IMPORT DATA PEGAWAI ALL (API LAMA)
	#==========================================================================================

	public function update_pegawai(){
		#API----------
		$result = file_get_contents('https://i-sdm.unesa.ac.id/api/data/pegawai/list');
		$dataku = json_decode($result, true);
		$data = $dataku['data'];

		foreach($data as $row){
			$nip = $row['nip'];
			$cek_nip  = $this->db->select('nip')->from('tb_pegawai')->where('nip',$nip)->get()->row();

			#jika nip sudah ada-------------------------------------
			if($cek_nip){
				$dat = array(
				'nip' 					=> $row['nip'],
				'namalengkap' 			=> $row['namalengkap'],
				'namastatuspegawai' 	=> $row['namastatuspegawai'],
				'isdosen'   			=> $row['isdosen'],
				'tmplahir'  			=> $row['tmplahir'],
				'tgllahir'  			=> $row['tgllahir'],
				'tglpensiun'  			=> $row['tglpensiun'],
				'tglpensiunasli'  		=> $row['tglpensiunasli'],
				'nidn'  				=> $row['nidn'],
				'idstatusaktif'  		=> $row['idstatusaktif'],
				'namastatusaktif'  		=> $row['namastatusaktif'],
				'npwp'  				=> $row['npwp'],
				'idagama'  				=> $row['idagama'],
				'agama'  				=> $row['agama'],
				'jeniskelamin'  		=> $row['jeniskelamin'],
				'tmtcpns'  				=> $row['tmtcpns'],
				'tmtpns'  				=> $row['tmtpns'],
				'karpeg'  				=> $row['karpeg'],
				'pangkat'  				=> $row['pangkat'],
				'namapangkat'  			=> $row['namapangkat'],
				'tmtgolongan'  			=> $row['tmtgolongan'],
				'namajfungsional'  		=> $row['namajfungsional'],
				'tmtfungsional'  		=> $row['tmtfungsional'],
				'namajstruktural'  		=> $row['namajstruktural'],
				'tmtstruktural'  		=> $row['tmtstruktural'],
				'alamat'  				=> $row['alamat'],
				'noktp'  				=> $row['noktp'],
				'kodepos'  				=> $row['kodepos'],
				'nohp'  				=> $row['nohp'],
				'email_unesa'  			=> $row['email_unesa'],
				'jmlanak'  				=> $row['jmlanak'],
				'jmlissu'  				=> $row['jmlissu'],
				'namasatker'  			=> $row['namasatker'],
				'namaparentsatker'  	=> $row['namaparentsatker'],
				'namabidang'  			=> $row['namabidang'],
				'pendidikanterakhir'  	=> $row['pendidikanterakhir'],
				'th_s1'  				=> $row['th_s1'],
				'th_s2'  				=> $row['th_s2'],
				'th_s3'  				=> $row['th_s3'],
				'pt_s1'  				=> $row['pt_s1'],
				'pt_s2'  				=> $row['pt_s2'],
				'pt_s3'  				=> $row['pt_s3'],
				'jur_s1'  				=> $row['jur_s1'],
				'jur_s2'  				=> $row['jur_s2'],
				'jur_s3'  				=> $row['jur_s3'],
				'mkgol'  				=> $row['mkgol'],
				'kodepegawai'  			=> $row['kodepegawai'],
				'mkthngol'  			=> $row['mkthngol'],
				'mkblngol'  			=> $row['mkblngol']
				);

				$id = array(
					'nip' 	=> $row['nip']
				);

				$data  = $this->All_m->edit('tb_pegawai',$dat,$id);

			#jika NIP belum ada ---------------------------------------
			}else{
				$namalengkap = $row['namalengkap'];

				$dat = array(
				'nip' 					=> $row['nip'],
				'namalengkap' 			=> $row['namalengkap'],
				'namastatuspegawai' 	=> $row['namastatuspegawai'],
				'isdosen'   			=> $row['isdosen'],
				'tmplahir'  			=> $row['tmplahir'],
				'tgllahir'  			=> $row['tgllahir'],
				'tglpensiun'  			=> $row['tglpensiun'],
				'tglpensiunasli'  		=> $row['tglpensiunasli'],
				'nidn'  				=> $row['nidn'],
				'idstatusaktif'  		=> $row['idstatusaktif'],
				'namastatusaktif'  		=> $row['namastatusaktif'],
				'npwp'  				=> $row['npwp'],
				'idagama'  				=> $row['idagama'],
				'agama'  				=> $row['agama'],
				'jeniskelamin'  		=> $row['jeniskelamin'],
				'tmtcpns'  				=> $row['tmtcpns'],
				'tmtpns'  				=> $row['tmtpns'],
				'karpeg'  				=> $row['karpeg'],
				'pangkat'  				=> $row['pangkat'],
				'namapangkat'  			=> $row['namapangkat'],
				'tmtgolongan'  			=> $row['tmtgolongan'],
				'namajfungsional'  		=> $row['namajfungsional'],
				'tmtfungsional'  		=> $row['tmtfungsional'],
				'namajstruktural'  		=> $row['namajstruktural'],
				'tmtstruktural'  		=> $row['tmtstruktural'],
				'alamat'  				=> $row['alamat'],
				'noktp'  				=> $row['noktp'],
				'kodepos'  				=> $row['kodepos'],
				'nohp'  				=> $row['nohp'],
				'email_unesa'  			=> $row['email_unesa'],
				'jmlanak'  				=> $row['jmlanak'],
				'jmlissu'  				=> $row['jmlissu'],
				'namasatker'  			=> $row['namasatker'],
				'namaparentsatker'  	=> $row['namaparentsatker'],
				'namabidang'  			=> $row['namabidang'],
				'pendidikanterakhir'  	=> $row['pendidikanterakhir'],
				'th_s1'  				=> $row['th_s1'],
				'th_s2'  				=> $row['th_s2'],
				'th_s3'  				=> $row['th_s3'],
				'pt_s1'  				=> $row['pt_s1'],
				'pt_s2'  				=> $row['pt_s2'],
				'pt_s3'  				=> $row['pt_s3'],
				'jur_s1'  				=> $row['jur_s1'],
				'jur_s2'  				=> $row['jur_s2'],
				'jur_s3'  				=> $row['jur_s3'],
				'mkgol'  				=> $row['mkgol'],
				'kodepegawai'  			=> $row['kodepegawai'],
				'mkthngol'  			=> $row['mkthngol'],
				'mkblngol'  			=> $row['mkblngol'],
				'pass'  				=> $row['nip']
				);

				$data = $this->All_m->add('tb_pegawai',$dat);

				echo '<h4>- '.$namalengkap.'<br></h4>';

			}
		}

		echo("<br>Berhasil import API dari i-sdm ke my-hk");
		echo "<br><a href=".base_url('ImportData').">Back Home</a>";
	}


	#==========================================================================================
	#IMPORT DATA PEGAWAI PER PAGE (API BARU)
	#==========================================================================================

	public function update_pegawai_page($page){
		#API----------
		$result = file_get_contents('https://i-sdm.unesa.ac.id/api/data/list-pegawai?per_page=500&page='.$page);
		$dataku = json_decode($result, true);
		$data = $dataku['data'];

		foreach($data as $row){
			$nip = $row['nip'];
			$cek_nip  = $this->db->select('nip')->from('tb_pegawai')->where('nip',$nip)->get()->row();

			#jika nip sudah ada-------------------------------------
			if($cek_nip){
				$dat = array(
				'nip' 					=> $row['nip'],
				'namalengkap' 			=> $row['namalengkap'],
				'namastatuspegawai' 	=> $row['namastatuspegawai'],
				'isdosen'   			=> $row['isdosen'],
				'tmplahir'  			=> $row['tmplahir'],
				'tgllahir'  			=> $row['tgllahir'],
				'tglpensiun'  			=> $row['tglpensiun'],
				'tglpensiunasli'  		=> $row['tglpensiunasli'],
				'nidn'  				=> $row['nidn'],
				'idstatusaktif'  		=> $row['idstatusaktif'],
				'namastatusaktif'  		=> $row['namastatusaktif'],
				'npwp'  				=> $row['npwp'],
				'idagama'  				=> $row['idagama'],
				'agama'  				=> $row['agama'],
				'jeniskelamin'  		=> $row['jeniskelamin'],
				'tmtcpns'  				=> $row['tmtcpns'],
				'tmtpns'  				=> $row['tmtpns'],
				'karpeg'  				=> $row['karpeg'],
				'pangkat'  				=> $row['pangkat'],
				'namapangkat'  			=> $row['namapangkat'],
				'tmtgolongan'  			=> $row['tmtgolongan'],
				'namajfungsional'  		=> $row['namajfungsional'],
				'tmtfungsional'  		=> $row['tmtfungsional'],
				'namajstruktural'  		=> $row['namajstruktural'],
				'tmtstruktural'  		=> $row['tmtstruktural'],
				'alamat'  				=> $row['alamat'],
				'noktp'  				=> $row['noktp'],
				'kodepos'  				=> $row['kodepos'],
				'nohp'  				=> $row['nohp'],
				'email_unesa'  			=> $row['email_unesa'],
				'jmlanak'  				=> $row['jmlanak'],
				'jmlissu'  				=> $row['jmlissu'],
				'idsatker'  			=> $row['idsatker'],
				'namasatker'  			=> $row['namasatker'],
				'idparentsatker'  		=> $row['idparentsatker'],
				'namaparentsatker'  	=> $row['nama_parentsatker_real'],
				'namabidang'  			=> $row['namabidang'],
				'pendidikanterakhir'  	=> $row['pendidikanterakhir'],
				'th_s1'  				=> $row['th_s1'],
				'th_s2'  				=> $row['th_s2'],
				'th_s3'  				=> $row['th_s3'],
				'pt_s1'  				=> $row['pt_s1'],
				'pt_s2'  				=> $row['pt_s2'],
				'pt_s3'  				=> $row['pt_s3'],
				'jur_s1'  				=> $row['jur_s1'],
				'jur_s2'  				=> $row['jur_s2'],
				'jur_s3'  				=> $row['jur_s3'],
				'mkgol'  				=> $row['mkgol'],
				'kodepegawai'  			=> $row['kodepegawai'],
				'mkthngol'  			=> $row['mkthngol'],
				'mkblngol'  			=> $row['mkblngol']

				);

				$id = array(
					'nip' 	=> $row['nip']
				);

				$data  = $this->All_m->edit('tb_pegawai',$dat,$id);

			#jika NIP belum ada ---------------------------------------
			}else{
				$namalengkap = $row['namalengkap'];

				$dat = array(
				'nip' 					=> $row['nip'],
				'namalengkap' 			=> $row['namalengkap'],
				'namastatuspegawai' 	=> $row['namastatuspegawai'],
				'isdosen'   			=> $row['isdosen'],
				'tmplahir'  			=> $row['tmplahir'],
				'tgllahir'  			=> $row['tgllahir'],
				'tglpensiun'  			=> $row['tglpensiun'],
				'tglpensiunasli'  		=> $row['tglpensiunasli'],
				'nidn'  				=> $row['nidn'],
				'idstatusaktif'  		=> $row['idstatusaktif'],
				'namastatusaktif'  		=> $row['namastatusaktif'],
				'npwp'  				=> $row['npwp'],
				'idagama'  				=> $row['idagama'],
				'agama'  				=> $row['agama'],
				'jeniskelamin'  		=> $row['jeniskelamin'],
				'tmtcpns'  				=> $row['tmtcpns'],
				'tmtpns'  				=> $row['tmtpns'],
				'karpeg'  				=> $row['karpeg'],
				'pangkat'  				=> $row['pangkat'],
				'namapangkat'  			=> $row['namapangkat'],
				'tmtgolongan'  			=> $row['tmtgolongan'],
				'namajfungsional'  		=> $row['namajfungsional'],
				'tmtfungsional'  		=> $row['tmtfungsional'],
				'namajstruktural'  		=> $row['namajstruktural'],
				'tmtstruktural'  		=> $row['tmtstruktural'],
				'alamat'  				=> $row['alamat'],
				'noktp'  				=> $row['noktp'],
				'kodepos'  				=> $row['kodepos'],
				'nohp'  				=> $row['nohp'],
				'email_unesa'  			=> $row['email_unesa'],
				'jmlanak'  				=> $row['jmlanak'],
				'jmlissu'  				=> $row['jmlissu'],
				'namasatker'  			=> $row['namasatker'],
				'namaparentsatker'  	=> $row['namaparentsatker'],
				'namabidang'  			=> $row['namabidang'],
				'pendidikanterakhir'  	=> $row['pendidikanterakhir'],
				'th_s1'  				=> $row['th_s1'],
				'th_s2'  				=> $row['th_s2'],
				'th_s3'  				=> $row['th_s3'],
				'pt_s1'  				=> $row['pt_s1'],
				'pt_s2'  				=> $row['pt_s2'],
				'pt_s3'  				=> $row['pt_s3'],
				'jur_s1'  				=> $row['jur_s1'],
				'jur_s2'  				=> $row['jur_s2'],
				'jur_s3'  				=> $row['jur_s3'],
				'mkgol'  				=> $row['mkgol'],
				'kodepegawai'  			=> $row['kodepegawai'],
				'mkthngol'  			=> $row['mkthngol'],
				'mkblngol'  			=> $row['mkblngol'],
				'pass'  				=> $row['nip']
				);

				$data = $this->All_m->add('tb_pegawai',$dat);

				echo '<h4>- '.$namalengkap.'<br></h4>';

			}
		}

		echo("<br>Berhasil import API dari i-sdm ke my-hk");
		echo "<br><a href=".base_url('ImportData').">Back Home</a>";
	}



	#==========================================================================================
	#IMPORT DATA PEGAWAI ALL
	#==========================================================================================

	/*public function update_pegawai(){
		#API----------
		$result = file_get_contents('https://i-sdm.unesa.ac.id/api/data/list-pegawai');
		$dataku = json_decode($result, true);
		$data = $dataku['data'];

		foreach($data as $row){
			$nip = $row['nip'];
			$cek_nip  = $this->db->select('nip')->from('tb_pegawai')->where('nip',$nip)->get()->row();

			#jika nip sudah ada-------------------------------------
			if($cek_nip){
				$dat = array(
				'nip' 					=> $row['nip'],
				'namalengkap' 			=> $row['namalengkap'],
				'namastatuspegawai' 	=> $row['namastatuspegawai'],
				'isdosen'   			=> $row['isdosen'],
				'tmplahir'  			=> $row['tmplahir'],
				'tgllahir'  			=> $row['tgllahir'],
				'tglpensiun'  			=> $row['tglpensiun'],
				'tglpensiunasli'  		=> $row['tglpensiunasli'],
				'nidn'  				=> $row['nidn'],
				'idstatusaktif'  		=> $row['idstatusaktif'],
				'namastatusaktif'  		=> $row['namastatusaktif'],
				'npwp'  				=> $row['npwp'],
				'idagama'  				=> $row['idagama'],
				'agama'  				=> $row['agama'],
				'jeniskelamin'  		=> $row['jeniskelamin'],
				'tmtcpns'  				=> $row['tmtcpns'],
				'tmtpns'  				=> $row['tmtpns'],
				'karpeg'  				=> $row['karpeg'],
				'pangkat'  				=> $row['pangkat'],
				'namapangkat'  			=> $row['namapangkat'],
				'tmtgolongan'  			=> $row['tmtgolongan'],
				'namajfungsional'  		=> $row['namajfungsional'],
				'tmtfungsional'  		=> $row['tmtfungsional'],
				'namajstruktural'  		=> $row['namajstruktural'],
				'tmtstruktural'  		=> $row['tmtstruktural'],
				'alamat'  				=> $row['alamat'],
				'noktp'  				=> $row['noktp'],
				'kodepos'  				=> $row['kodepos'],
				'nohp'  				=> $row['nohp'],
				'email_unesa'  			=> $row['email_unesa'],
				'jmlanak'  				=> $row['jmlanak'],
				'jmlissu'  				=> $row['jmlissu'],
				'namasatker'  			=> $row['namasatker'],
				'namaparentsatker'  	=> $row['namaparentsatker'],
				'namabidang'  			=> $row['namabidang'],
				'pendidikanterakhir'  	=> $row['pendidikanterakhir'],
				'th_s1'  				=> $row['th_s1'],
				'th_s2'  				=> $row['th_s2'],
				'th_s3'  				=> $row['th_s3'],
				'pt_s1'  				=> $row['pt_s1'],
				'pt_s2'  				=> $row['pt_s2'],
				'pt_s3'  				=> $row['pt_s3'],
				'jur_s1'  				=> $row['jur_s1'],
				'jur_s2'  				=> $row['jur_s2'],
				'jur_s3'  				=> $row['jur_s3'],
				'mkgol'  				=> $row['mkgol'],
				'kodepegawai'  			=> $row['kodepegawai'],
				'mkthngol'  			=> $row['mkthngol'],
				'mkblngol'  			=> $row['mkblngol']
				);

				$id = array(
					'nip' 	=> $row['nip']
				);

				$data  = $this->All_m->edit('tb_pegawai',$dat,$id);

			#jika NIP belum ada ---------------------------------------
			}else{
				$namalengkap = $row['namalengkap'];

				$dat = array(
				'nip' 					=> $row['nip'],
				'namalengkap' 			=> $row['namalengkap'],
				'namastatuspegawai' 	=> $row['namastatuspegawai'],
				'isdosen'   			=> $row['isdosen'],
				'tmplahir'  			=> $row['tmplahir'],
				'tgllahir'  			=> $row['tgllahir'],
				'tglpensiun'  			=> $row['tglpensiun'],
				'tglpensiunasli'  		=> $row['tglpensiunasli'],
				'nidn'  				=> $row['nidn'],
				'idstatusaktif'  		=> $row['idstatusaktif'],
				'namastatusaktif'  		=> $row['namastatusaktif'],
				'npwp'  				=> $row['npwp'],
				'idagama'  				=> $row['idagama'],
				'agama'  				=> $row['agama'],
				'jeniskelamin'  		=> $row['jeniskelamin'],
				'tmtcpns'  				=> $row['tmtcpns'],
				'tmtpns'  				=> $row['tmtpns'],
				'karpeg'  				=> $row['karpeg'],
				'pangkat'  				=> $row['pangkat'],
				'namapangkat'  			=> $row['namapangkat'],
				'tmtgolongan'  			=> $row['tmtgolongan'],
				'namajfungsional'  		=> $row['namajfungsional'],
				'tmtfungsional'  		=> $row['tmtfungsional'],
				'namajstruktural'  		=> $row['namajstruktural'],
				'tmtstruktural'  		=> $row['tmtstruktural'],
				'alamat'  				=> $row['alamat'],
				'noktp'  				=> $row['noktp'],
				'kodepos'  				=> $row['kodepos'],
				'nohp'  				=> $row['nohp'],
				'email_unesa'  			=> $row['email_unesa'],
				'jmlanak'  				=> $row['jmlanak'],
				'jmlissu'  				=> $row['jmlissu'],
				'namasatker'  			=> $row['namasatker'],
				'namaparentsatker'  	=> $row['namaparentsatker'],
				'namabidang'  			=> $row['namabidang'],
				'pendidikanterakhir'  	=> $row['pendidikanterakhir'],
				'th_s1'  				=> $row['th_s1'],
				'th_s2'  				=> $row['th_s2'],
				'th_s3'  				=> $row['th_s3'],
				'pt_s1'  				=> $row['pt_s1'],
				'pt_s2'  				=> $row['pt_s2'],
				'pt_s3'  				=> $row['pt_s3'],
				'jur_s1'  				=> $row['jur_s1'],
				'jur_s2'  				=> $row['jur_s2'],
				'jur_s3'  				=> $row['jur_s3'],
				'mkgol'  				=> $row['mkgol'],
				'kodepegawai'  			=> $row['kodepegawai'],
				'mkthngol'  			=> $row['mkthngol'],
				'mkblngol'  			=> $row['mkblngol'],
				'pass'  				=> $row['nip']
				);

				$data = $this->All_m->add('tb_pegawai',$dat);

				echo '<h4>- '.$namalengkap.'<br></h4>';

			}
		}

		echo("<br>Berhasil import API dari i-sdm ke my-hk");
		echo "<br><a href=".base_url('ImportData').">Back Home</a>";
	}*/



}
