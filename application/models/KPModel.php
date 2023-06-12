<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KPModel extends CI_Model {

	public function add_kp($tb,$dat){  
        $result = $this->db->insert($tb,$dat);
        return $result;
    }

    public function del($id,$table){
		$this->db->where($id);
		$this->db->delete($table);
	}

	public function get_edit($id){
		$query=$this->db->query("SELECT*FROM tb_kp WHERE id_kp='$id'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_kp'      => $value->id_kp,
					'nip'        => $value->nip,
					'nama'       => $value->nama,
					'jabatan'    => $value->jabatan,
					'gol'        => $value->gol,
					'unit_kerja' => $value->unit_kerja,
					'usulan_kp'  => $value->usulan_kp,
					'tgl_usulan' => $value->tgl_usulan,
					'status'     => $value->status
				);
			}
		}
		return $data;
	}

	public function edit_kp($table,$data,$id){
		$this->db->set($data);
		$this->db->where($id);
		$this->db->update($table,$data);
	}

}
