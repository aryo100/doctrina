<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('doc');
	}
	  
	public function index()
	{
		$this->load->view('pendaftaran_donatur');
  }
  
  public function view_pene()
	{
		$this->load->view('pendaftaran_penerima');
  }
  
  public function view_dona()
	{
		$this->load->view('pendaftaran_donatur');
  }

	public function dona_simpan()
	{
		// $op = $this->input->post('op');
    
    // upload foto
    $config['upload_path'] = realpath(APPPATH . '../assets/upload/foto');
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = 2048;//~mb
    $config['max_width'] = 2732;//~px
    $config['max_height'] = 1536;//~px
    $this->load->library('upload',$config);

    if($this->upload->do_upload('foto_pas')){
      $files = $this->upload->data('file_name');
      $data1['foto'] = $files;
    }else{
      echo $this->upload->display_errors();
    }
    $this->session->set_flashdata('error_status', 'success');

    $config['upload_path'] = realpath(APPPATH . '../assets/upload/ss');
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = 2048;//~mb
    $config['max_width'] = 2732;//~px
    $config['max_height'] = 1536;//~px
    $this->load->library('upload',$config);

    if($this->upload->do_upload('ss_aktif')){
      $files = $this->upload->data('file_name');
      $data1['ss_a'] = $files;
    }else{
      echo $this->upload->display_errors();
    }
    $this->session->set_flashdata('error_status', 'success');

    //upload ss
    $config1['upload_path'] = realpath(APPPATH . '../assets/upload/ss');
    $config1['allowed_types'] = 'gif|jpg|png';
    $config1['max_size'] = 2048;//~mb
    $config1['max_width'] = 2732;//~px
    $config1['max_height'] = 1536;//~px
    $this->upload->initialize($config1);

    if($this->upload->do_upload('ss_gaji')){
      $data1['ss_g'] = $this->upload->data('file_name');
    }else{
      echo $this->upload->display_errors();
    }
    $this->session->set_flashdata('error_status', 'success');

    // $id_atlet = $this->input->post('id_atlet');
    $nama = $this->input->post('nama');
    $email = $this->input->post('email');
    $gender = $this->input->post('gender');
    $tanggal = $this->input->post('tanggal');
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $nik = $this->input->post('nik');
    $no_telp = $this->input->post('no_telp');
    $deskripsi = $this->input->post('deskripsi');
    $alamat = $this->input->post('alamat');
    $data = array(
        'nama' => $nama,
        'email' => $email,
        'gender' => $gender,
        'tanggal_lahir' => $tahun.'/'.$bulan.'/'.$tanggal,
        'foto_pas' => $data1['foto'],
        'ss_gaji' =>  $data1['ss_g'],
        'ss_aktif' =>  $data1['ss_a'],
        'no_ktp' => $nik,
        'no_telp' => $no_telp,
        'alamat' => $alamat,
        'status' => 'pending',
        'deskripsi' => $deskripsi
      );
	
    $this->doc->simpan($data,'donatur');
      
    echo '
			<html>
				<style>
				::selection { background-color: #E13300; color: white; }
				::-moz-selection { background-color: #E13300; color: white; }

				body {
					background-color: #fff;
					margin: 40px;
					font: 13px/20px normal Helvetica, Arial, sans-serif;
					color: #4F5155;
				}

				a {
					color: #003399;
					background-color: transparent;
					font-weight: normal;
				}

				h1 {
					color: #444;
					background-color: transparent;
					border-bottom: 1px solid #D0D0D0;
					font-size: 19px;
					font-weight: normal;
					margin: 0 0 14px 0;
					padding: 14px 15px 10px 15px;
				}

				code {
					font-family: Consolas, Monaco, Courier New, Courier, monospace;
					font-size: 12px;
					background-color: #f9f9f9;
					border: 1px solid #D0D0D0;
					color: #002166;
					display: block;
					margin: 14px 0 14px 0;
					padding: 12px 10px 12px 10px;
				}

				#container {
					margin: 10px;
					border: 1px solid #D0D0D0;
					box-shadow: 0 0 8px #D0D0D0;
				}

				p {
					margin: 12px 15px 12px 15px;
				}
				</style>
				<body>
					<div>
						<h1>
							Terima Kasih telah Mendaftar
						</h1>
						<p>
							Data telah berhasil Terkirim, data akan kami segera diverifikasi, <br>
							username serta password akan dikirim lewat email yang sudah diberikan.
							<br>
							<br>
							Terima kasih.
							<br>
							<a href="..">Back</a>
						</p>
					</div>

				</body>
			</html>
			';
  }

  public function pene_simpan()
	{
		// $op = $this->input->post('op');
    
    // upload foto
    $config['upload_path'] = realpath(APPPATH . '../assets/upload/foto');
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = 2048;//~mb
    $config['max_width'] = 2732;//~px
    $config['max_height'] = 1536;//~px
    $this->load->library('upload',$config);

    if($this->upload->do_upload('foto_pas')){
      $files = $this->upload->data('file_name');
      $data1['foto'] = $files;
    }else{
      echo $this->upload->display_errors();
    }
    $this->session->set_flashdata('error_status', 'success');

    //upload ss
    $config1['upload_path'] = realpath(APPPATH . '../assets/upload/ss');
    $config1['allowed_types'] = 'gif|jpg|png';
    $config1['max_size'] = 2048;//~mb
    $config1['max_width'] = 2732;//~px
    $config1['max_height'] = 1536;//~px
    $this->upload->initialize($config1);

    if($this->upload->do_upload('ss_sktm')){
      $data1['ss_s'] = $this->upload->data('file_name');
    }else{
      echo $this->upload->display_errors();
    }
    $this->session->set_flashdata('error_status', 'success');

    // $id_atlet = $this->input->post('id_atlet');
    $nama = $this->input->post('nama');
    $email = $this->input->post('email');
    $gender = $this->input->post('gender');
    $tanggal = $this->input->post('tanggal');
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $nik = $this->input->post('nik');
    $no_telp = $this->input->post('no_telp');
    $deskripsi = $this->input->post('deskripsi');
    $alamat = $this->input->post('alamat');
    $data = array(
        'nama' => $nama,
        'email' => $email,
        'gender' => $gender,
        'tanggal_lahir' => $tahun.'/'.$bulan.'/'.$tanggal,
        'foto_pas' => $data1['foto'],
        'ss_sktm' =>  $data1['ss_s'],
        'nip' => $nik,
        'no_telp' => $no_telp,
        'alamat' => $alamat,
        'status' => 'pending',
        'deskripsi' => $deskripsi
      );
	
    $this->doc->simpan($data,'penerima');
      
    echo '
			<html>
				<style>
				::selection { background-color: #E13300; color: white; }
				::-moz-selection { background-color: #E13300; color: white; }

				body {
					background-color: #fff;
					margin: 40px;
					font: 13px/20px normal Helvetica, Arial, sans-serif;
					color: #4F5155;
				}

				a {
					color: #003399;
					background-color: transparent;
					font-weight: normal;
				}

				h1 {
					color: #444;
					background-color: transparent;
					border-bottom: 1px solid #D0D0D0;
					font-size: 19px;
					font-weight: normal;
					margin: 0 0 14px 0;
					padding: 14px 15px 10px 15px;
				}

				code {
					font-family: Consolas, Monaco, Courier New, Courier, monospace;
					font-size: 12px;
					background-color: #f9f9f9;
					border: 1px solid #D0D0D0;
					color: #002166;
					display: block;
					margin: 14px 0 14px 0;
					padding: 12px 10px 12px 10px;
				}

				#container {
					margin: 10px;
					border: 1px solid #D0D0D0;
					box-shadow: 0 0 8px #D0D0D0;
				}

				p {
					margin: 12px 15px 12px 15px;
				}
				</style>
				<body>
					<div>
						<h1>
							Terima Kasih telah Mendaftar
						</h1>
						<p>
              Data telah berhasil Terkirim, data akan kami segera diverifikasi, <br>
              username serta password akan dikirim lewat email yang sudah diberikan.
							<br>
							<br>
							Terima kasih.
							<br>
							<a href="..">Back</a>
						</p>
					</div>

				</body>
			</html>
			';
  }

}
