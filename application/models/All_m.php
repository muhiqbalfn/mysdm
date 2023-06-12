<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_m extends CI_Model {

	public function get($tb){
		$this->db->from($tb);
		return $this->db->get()->result();
	}

	public function add($tb,$dat){  
        $result = $this->db->insert($tb,$dat);
        return $result;
    }

	public function edit($table,$data,$id){
		$this->db->set($data);
		$this->db->where($id);
		$this->db->update($table,$data);
	}

	public function del($id,$table){
		$this->db->where($id);
		$this->db->delete($table);
	}

}
