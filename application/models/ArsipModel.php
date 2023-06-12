<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArsipModel extends CI_Model {

	public function getMenu($sub){
		$this->db->from('tb_jenis_file');
		$this->db->join('tb_sub_file','tb_sub_file.id_sub_file=tb_jenis_file.id_sub_file');
		$this->db->where('nama_sub',$sub);
		return $this->db->get()->result();
	}

	public function getArsip($id_jenis_file){
		$this->db->from('tb_file');
		$this->db->join('tb_jenis_file','tb_jenis_file.id_jenis_file=tb_file.id_jenis_file');
		$this->db->where('tb_jenis_file.id_jenis_file',$id_jenis_file);
		$this->db->order_by('id_file','desc');

		$sub_user = $this->session->userdata('sub');
		if($sub_user!='super' and $sub_user!='htl' and $sub_user!='pendidik' and $sub_user!='tendik'){
			$this->db->where('mode_show','Umum');	
		}
		return $this->db->get()->result();
	}

	#getArsip2 agar tampil ALL di awal
	public function getArsip2($id_jenis_file){
		$this->db->from('tb_file2 a');
		$this->db->join('tb_sub_jenis_file2 b','b.id_sub_jenis_file2=a.id_sub_jenis_file2');
		$this->db->join('tb_sub_jenis_file c','c.id_sub_jenis_file=b.id_sub_jenis_file');
		$this->db->join('tb_jenis_file d','d.id_jenis_file=c.id_jenis_file');
		$this->db->where('d.id_jenis_file',$id_jenis_file);
		$this->db->order_by('a.id_file2','desc');

		$sub_user = $this->session->userdata('sub');
		if($sub_user!='super' and $sub_user!='htl' and $sub_user!='pendidik' and $sub_user!='tendik'){
			$this->db->where('mode_show','Umum');	
		}
		return $this->db->get()->result();
	}


	public function getArsipYear($id_jenis_file,$year){
		$this->db->from('tb_file');
		$this->db->join('tb_jenis_file','tb_jenis_file.id_jenis_file=tb_file.id_jenis_file');
		$this->db->where('tb_jenis_file.id_jenis_file',$id_jenis_file);
		$this->db->where('year(tgl_file)',$year);
		//$this->db->where('id_sub_jenis_file','0');
		$this->db->order_by('id_file','desc');

		$sub_user = $this->session->userdata('sub');
		if($sub_user!='super' and $sub_user!='htl' and $sub_user!='pendidik' and $sub_user!='tendik'){
			$this->db->where('mode_show','Umum');	
		}
		return $this->db->get()->result();
	}

	public function getArsipYear2($id_jenis_file,$year){
		$this->db->from('tb_file2');
		$this->db->join('tb_sub_jenis_file2','tb_sub_jenis_file2.id_sub_jenis_file2=tb_file2.id_sub_jenis_file2');
		$this->db->join('tb_sub_jenis_file','tb_sub_jenis_file.id_sub_jenis_file=tb_sub_jenis_file2.id_sub_jenis_file');
		$this->db->join('tb_jenis_file','tb_jenis_file.id_jenis_file=tb_sub_jenis_file.id_jenis_file');
		$this->db->where('tb_jenis_file.id_jenis_file',$id_jenis_file);
		$this->db->where('year(tgl_file)',$year);
		//$this->db->where('id_sub_jenis_file','0');
		$this->db->order_by('id_file2','desc');

		$sub_user = $this->session->userdata('sub');
		if($sub_user!='super' and $sub_user!='htl' and $sub_user!='pendidik' and $sub_user!='tendik'){
			$this->db->where('mode_show','Umum');	
		}
		return $this->db->get()->result();
	}

	public function getSubArsipYear($id_sub_jenis_file,$year){
		$this->db->from('tb_file');
		$this->db->join('tb_sub_jenis_file','tb_sub_jenis_file.id_sub_jenis_file=tb_file.id_sub_jenis_file');
		$this->db->where('tb_sub_jenis_file.id_sub_jenis_file',$id_sub_jenis_file);
		$this->db->where('year(tgl_file)',$year);
		$this->db->order_by('id_file','desc');

		$sub_user = $this->session->userdata('sub');
		if($sub_user!='super' and $sub_user!='htl' and $sub_user!='pendidik' and $sub_user!='tendik'){
			$this->db->where('mode_show','Umum');	
		}
		return $this->db->get()->result();
	}

	//sub menu parent
	public function getSubMenuParent($id_jenis_file){
		$this->db->from('tb_sub_jenis_file');
		$this->db->where('id_jenis_file',$id_jenis_file);
		$this->db->where('id_sub_jenis_file !=','0');
		$this->db->where('parent','1');
		return $this->db->get()->result();
	}

	//sub menu non parent
	public function getSubMenu($id_jenis_file){
		$this->db->from('tb_sub_jenis_file');
		$this->db->where('id_jenis_file',$id_jenis_file);
		$this->db->where('id_sub_jenis_file !=','0');
		$this->db->where('parent','0');
		return $this->db->get()->result();
	}

	public function getSubArsip($id_sub_jenis_file){
		$this->db->from('tb_file');
		$this->db->join('tb_sub_jenis_file','tb_sub_jenis_file.id_sub_jenis_file=tb_file.id_sub_jenis_file');
		$this->db->where('tb_sub_jenis_file.id_sub_jenis_file',$id_sub_jenis_file);
		$this->db->order_by('id_file','desc');

		$sub_user = $this->session->userdata('sub');
		if($sub_user!='super' and $sub_user!='htl' and $sub_user!='pendidik' and $sub_user!='tendik'){
			$this->db->where('mode_show','Umum');	
		}
		return $this->db->get()->result();
	}

	//get nama halaman sub arsip
	public function getNamaSub($id_jenis){
		$this->db->select('*');
	  	$this->db->from('tb_sub_file');
	  	$this->db->join('tb_jenis_file','tb_jenis_file.id_sub_file=tb_sub_file.id_sub_file');
	  	$this->db->where('tb_jenis_file.id_jenis_file',$id_jenis);
	  	$this->db->limit('1');
		return $this->db->get()->result();
	}

	//get nama halaman TB_JENIS_FILE
	public function getNamaSub1($id_sub_jenis){
		$this->db->select('*');
	  	$this->db->from('tb_sub_file');
	  	$this->db->join('tb_jenis_file','tb_jenis_file.id_sub_file=tb_sub_file.id_sub_file');
	  	$this->db->join('tb_sub_jenis_file','tb_sub_jenis_file.id_jenis_file=tb_jenis_file.id_jenis_file');
	  	$this->db->where('tb_sub_jenis_file.id_sub_jenis_file',$id_sub_jenis);
	  	$this->db->limit('1');
		return $this->db->get()->result();
	}

	//get nama halaman TB_JENIS_FILE
	public function getNamaSub2($id_sub_jenis){
		$this->db->select('*');
	  	$this->db->from('tb_sub_file');
	  	$this->db->join('tb_jenis_file','tb_jenis_file.id_sub_file=tb_sub_file.id_sub_file');
	  	$this->db->join('tb_sub_jenis_file','tb_sub_jenis_file.id_jenis_file=tb_jenis_file.id_jenis_file');
	  	$this->db->join('tb_sub_jenis_file2','tb_sub_jenis_file2.id_sub_jenis_file=tb_sub_jenis_file.id_sub_jenis_file');
	  	$this->db->where('tb_sub_jenis_file2.id_sub_jenis_file2',$id_sub_jenis);
	  	$this->db->limit('1');
		return $this->db->get()->result();
	}

	//===========================================CRUD=============================================
	public function add($tb,$dat){  
        $result = $this->db->insert($tb,$dat);
        return $result;
    }

    public function del($id,$table){
		$this->db->where($id);
		$this->db->delete($table);
	}

	public function get_edit($id){
		$query=$this->db->query("SELECT*FROM tb_file WHERE id_file='$id'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_file'      => $value->id_file,
					'no_file'      => $value->no_file,
					'nama_file'    => $value->nama_file,
					'tgl_file'     => $value->tgl_file,
					'file'     	   => $value->file,
					'file2'    	   => $value->file2,
					'status'   	   => $value->status,
					'mode_show'    => $value->mode_show
				);
			}
		}
		return $data;
	}

	public function get_edit_jenis($id){
		$query=$this->db->query("SELECT*FROM tb_jenis_file WHERE id_jenis_file='$id'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_jenis_file'=> $value->id_jenis_file,
					'jenis_file'   => $value->jenis_file
				);
			}
		}
		return $data;
	}

	public function get_edit_sub($id){
		$query=$this->db->query("SELECT*FROM tb_sub_jenis_file WHERE id_sub_jenis_file='$id'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_sub_jenis_file'=> $value->id_sub_jenis_file,
					'sub_jenis_file'   => $value->sub_jenis_file
				);
			}
		}
		return $data;
	}

	public function get_edit_sub2($id){
		$query=$this->db->query("SELECT*FROM tb_sub_jenis_file2 WHERE id_sub_jenis_file2='$id'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_sub_jenis_file2'=> $value->id_sub_jenis_file2,
					'sub_jenis_file2'   => $value->sub_jenis_file2
				);
			}
		}
		return $data;
	}

	public function edit($table,$data,$id){
		$this->db->set($data);
		$this->db->where($id);
		$this->db->update($table,$data);
	}

	//=======================================CRUD ARSIP SUB 2==================================

	public function getSubArsip2($jenis){
		$this->db->from('tb_file2');
		$this->db->join('tb_sub_jenis_file2','tb_sub_jenis_file2.id_sub_jenis_file2=tb_file2.id_sub_jenis_file2');
		$this->db->join('tb_sub_jenis_file','tb_sub_jenis_file.id_sub_jenis_file=tb_sub_jenis_file2.id_sub_jenis_file');
		$this->db->where('tb_sub_jenis_file2.id_sub_jenis_file2',$jenis);
		$this->db->order_by('id_file2','desc');

		$sub_user = $this->session->userdata('sub');
		if($sub_user!='super' and $sub_user!='htl' and $sub_user!='pendidik' and $sub_user!='tendik'){
			$this->db->where('mode_show','Umum');	
		}
		return $this->db->get()->result();
	}

	public function getSubArsip2Year($id_sub_jenis_file2, $year){
		$this->db->from('tb_file2');
		$this->db->join('tb_sub_jenis_file2','tb_sub_jenis_file2.id_sub_jenis_file2=tb_file2.id_sub_jenis_file2');
		$this->db->where('tb_sub_jenis_file2.id_sub_jenis_file2',$id_sub_jenis_file2);
		$this->db->where('year(tgl_file)',$year);
		$this->db->order_by('id_file2','desc');

		$sub_user = $this->session->userdata('sub');
		if($sub_user!='super' and $sub_user!='htl' and $sub_user!='pendidik' and $sub_user!='tendik'){
			$this->db->where('mode_show','Umum');	
		}
		return $this->db->get()->result();
	}

	public function get_edit2($id){
		$query=$this->db->query("SELECT*FROM tb_file2 WHERE id_file2='$id'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_file2'     => $value->id_file2,
					'no_file'      => $value->no_file,
					'nama_file'    => $value->nama_file,
					'tgl_file'     => $value->tgl_file,
					'file'     	   => $value->file,
					'status'       => $value->status,
					'mode_show'    => $value->mode_show
				);
			}
		}
		return $data;
	}

	
}
