<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class doc extends CI_Model{

  public function get($table,$where){
    if($where == ''){
      $sql=$this->db->query("SELECT * FROM $table");
    }else{
      $sql=$this->db->query("SELECT * FROM $table where id = $where");
    }
    return $sql->result();
  }

  function proseslogin($user,$pass){
    $this->db->where('username',$user);
    $this->db->where('password',$pass);
    return $this->db->get('akun')->row();
  }

  function simpan($data,$tabel){
		$this->db->insert($tabel,$data);
	}

	function hapus_guru($id){
		$this->db->where("id_guru",$id);
		$this->db->delete('guru');
	}

  function hapus_siswa($id){
		$this->db->where("id_siswa",$id);
		$this->db->delete('siswa');
	}

	function edit_guru($id){
		$this->db->where("id_guru",$id);
		return $this->db->get('guru');
	}

  function edit_siswa($id){
		$this->db->where("id_siswa",$id);
		return $this->db->get('siswa');
	}

	function update($id,$data,$table){
		$this->db->where("id",$id);
		$this->db->update($table,$data);
	}

  function update_siswa($id,$data){
		$this->db->where("id_siswa",$id);
    $this->db->update('siswa',$data);
  }
  
  function update_ortu($id,$data){
		$this->db->where("id_ortu",$id);
    $this->db->update('orang_tua',$data);
  }

  function get_kelas(){
    $sql=$this->db->query("SELECT* FROM kelas");
    return $sql;
  }

  function hapus_kelas($id){
		$this->db->where("id_kelas",$id);
		$this->db->delete('kelas');
	}

  function simpan_kelas($data){
    $this->db->insert('kelas',$data);
  }

  function get_mata_pelajaran(){
    $sql=$this->db->query("SELECT* FROM mata_pelajaran");
    return $sql;
  }

  function hapus_mapel($id){
		$this->db->where("id_mapel",$id);
		$this->db->delete('mata_pelajaran');
	}

  function chat_simpan($data){
    $this->db->insert('pesan',$data);
  }

  function simpan_siswa($data){
    $this->db->insert('siswa',$data);
  }

  function simpan_ortu($data){
    $this->db->insert('orang_tua',$data);
  }

  function get_last_id(){
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }

  function get_ortu(){
    $sql=$this->db->query("SELECT* FROM orang_tua");
    return $sql;
  }

  public function detail($id,$table)
  {
    $data=array();
    $options = array('id' => $id );
    $Q=$this->db->get_where($table,$options,1);
    if ($Q->num_rows()>0) {
      $data = $Q->row_array();
    }
    $Q->free_result();
    return $data;
  }
  
  public function get_chat($id_penerima,$id_donatur)
  {
    $sql=$this->db->query("SELECT m.id_penerima as id_penerima , m.id_donatur as id_donatur , p.foto_pas as foto_p , d.foto_pas as foto_d, p.nama as nama_p, d.nama as nama_d, m.id as id_chat, m.isi as isi, m.waktu as waktu, m.status as 'pengirim' FROM ((pesan m INNER JOIN penerima p ON m.id_penerima = p.id) INNER JOIN donatur d ON d.id = m.id_donatur) where m.id_penerima = $id_penerima and m.id_donatur = $id_donatur");
    
    return $sql;
  }
}
 ?>
