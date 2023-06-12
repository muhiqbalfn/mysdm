<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TubelModel extends CI_Model {

	public function add_tubel($tb,$dat){  
        $result = $this->db->insert($tb,$dat);
        return $result;
    }

    public function del($id,$table){
		$this->db->where($id);
		$this->db->delete($table);
	}

	public function get_edit($id){
		$query=$this->db->query("SELECT*FROM tb_tubel WHERE id_tubel='$id'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_tubel'   			=> $value->id_tubel,
					'nip'        			=> $value->nip,
					'nama'       			=> $value->nama,
					'tujuan'    			=> $value->tujuan,
					'negara'        		=> $value->negara,
					'bidang_ilmu' 			=> $value->bidang_ilmu,
					'mulai'					=> $value->mulai,
					'selesai' 				=> $value->selesai,
					'tgl_surat_usulan'		=> $value->tgl_surat_usulan,
					'sumber_biaya'     		=> $value->sumber_biaya,
					'status'     			=> $value->status,
					'unit_kerja'     		=> $value->unit_kerja,
					'jurusan'     			=> $value->jurusan,
					'status_sk'     		=> $value->status_sk,	
					'status_sk_perpanjangan'=> $value->status_sk_perpanjangan,
					'akhir_sk_perpanjangan' => $value->akhir_sk_perpanjangan,
					'jenis_pegawai'			=> $value->jenis_pegawai
				);
			}
		}
		return $data;
	}

	public function edit_tubel($table,$data,$id){
		$this->db->set($data);
		$this->db->where($id);
		$this->db->update($table,$data);
	}

}
