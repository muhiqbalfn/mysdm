<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

	public function get_edit($id){
		$query=$this->db->query("SELECT*FROM tb_pegawai WHERE idpegawai='$id'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'idpegawai'   			=> $value->idpegawai,
					'akses'        			=> $value->akses,
					'pass'        			=> $value->pass
				);
			}
		}
		return $data;
	}
	

}
