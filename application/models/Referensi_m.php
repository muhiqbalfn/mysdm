<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Referensi_m extends CI_Model {

	public function get_unit_distinc(){
		$this->db->distinct();
		$this->db->select('idparentsatker, namaparentsatker');
		$this->db->from('tb_pegawai');
		$this->db->where('idparentsatker !=','');
		$this->db->order_by('namaparentsatker','asc');
		return $this->db->get()->result();
	}

}