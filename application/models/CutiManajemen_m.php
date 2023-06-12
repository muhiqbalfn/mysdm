<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CutiManajemen_m extends CI_Model {

	public function kurangicutidosen($jml){
		$this->db->set('jml_sisacuti -=',$jml);
		$this->db->where('isdosen',1);
		$this->db->where('thn_sisacuti',2023);
		$this->db->update('tb_pegawai JOIN tb_cuti_sisacutitahunan ON tb_pegawai.nip=tb_cuti_sisacutitahunan.nip');
	}

	public function kurangicutidosen1($jml,$thn){
		$this->db->query("
			UPDATE tb_cuti_sisacutitahunan  
			INNER JOIN tb_pegawai ON tb_pegawai.nip = tb_cuti_sisacutitahunan.nip  
			SET jml_sisacuti = jml_sisacuti-$jml
			WHERE thn_sisacuti = $thn AND isdosen = 1;
		");
	}

}
