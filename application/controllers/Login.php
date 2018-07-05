<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('doc');
	}
	
	public function index()
	{
		$this->load->view('login');
	}

	function ceklogin(){
		if (isset($_POST['login'])) {
			$user=$this->input->post('username',true);
			$pass=md5($this->input->post('password',true));
			$cek=$this->doc->proseslogin($user, $pass);
			$hasil=count($cek);
			if ($hasil > 0) {
				$yglogin=$this->db->get_where('akun',array('username'=>$user, 'password'=>$pass))->row();
				$data = array('udhmasuk' => true,
				'username'=>$yglogin->username,
				'id'=> $yglogin->id,
				'role' => $yglogin->status);
				$this->session->set_userdata($data);
				if ($yglogin->status == 'admin') {
					redirect('admin');
				}elseif ($yglogin->status == 'donatur') {
					redirect('donatur');
				}elseif ($yglogin->status == 'penerima') {
					redirect('penerima');
				}
			}else {
				echo "<script type='text/javascript'>alert ('Maaf Username Dan Password Anda Salah !');
				document.location='index';
				</script>";
			}
		}
		else
		{
			echo 'gak bisa!! '.isset($_POST['login']);
		}
	}

	function keluar(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
