<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_m extends CI_Model {


	public function get_profil(){
		$nip = $this->session->userdata('nip');
		$this->db->from('tb_pegawai');
		$this->db->where('nip',$nip);
		return $this->db->get()->result();
	}



}
