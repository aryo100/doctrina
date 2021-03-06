<?php

class Penerima extends CI_Controller
{

  function __construct(){
    parent::__construct();
    $this->load->model('doc');
    if ($this->session->userdata('udhmasuk')==false) {
      redirect('login');
    }
  }

  function index(){
    $data['title'] = "Dashboard";
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    // $this->load->view('layout/dashboard');
    $this->load->view('layout/footer');
    // redirect('admin/view_dona');
  }

  function view_dona(){
    $data['title'] = "Waiting List Donatur";
    $data['sql1']=$this->doc->get_beasiswa($this->session->userdata('id'),'penerima','d');
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_view_data_beasiswa',$data);
    $this->load->view('layout/footer');
  }

  function view_nilai(){
    $data['title'] = "Data Nilai Siswa";
    $data['sql1']=$this->sik->get_nilai();
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_view_data_nilai',$data);
    $this->load->view('layout/footer');
  }

  // function viewTable(){
  //   $page = isset($_GET['page']) ? $_GET['page'] : 1 ; 
  //   $limit = isset($_GET['rows']) ? $_GET['rows'] : 10;
  //   $sidx = isset($_GET['id'])? $_GET['id'] : 'id_nilai';
  //   $sord = isset($_GET['sord'])? $_GET['sord'] : 'ASC';
  //   $table_name ="((nilai INNER JOIN siswa ON nilai.id_siswa = siswa.id_siswa) INNER JOIN jenis_ujian ON nilai.id_jenis = jenis_ujian.id_jenis)";
    
  //   $count = $this->sik->getRows($table_name);
  //   $total_pages = $this->sik->getNumOfPages($count, $limit);

  //   //echo $page . " " . $limit." ".$total_pages;
  //   if ($page > $total_pages) $page = $total_pages;
  //   $start = $limit*$page - $limit;

  //   $data_arr = $this->sik->getSelectedData($table_name, $sidx, $sord, $start, $limit);

  //   $this->sik->createJSON($page, $total_pages, $count, $data_arr);
  // }

  function add_guru(){
    $data['title'] = "Tambah data Guru";
    $data['op'] = 'tambah';
    $data['kelas'] = $this->sik->get_kelas();
    $data['mata_pelajaran'] = $this->sik->get_mata_pelajaran();
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_add_data_guru',$data);
    $this->load->view('layout/footer');
  }

  function add_siswa(){
    $data['title'] = "Tambah data Siswa";
    $data['op'] = 'tambah';
    $data['kelas'] = $this->sik->get_kelas();
    $data['ortu'] = $this->sik->get_ortu();
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_add_data_siswa',$data);
    $this->load->view('layout/footer');
  }

  function view_calendar()
  {
    $data['title'] = "Kalender event";
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_calendar');
    $this->load->view('layout/footer');
  }

  public function akun_simpan()
	{
    // echo $this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5);
		// $op = $this->input->post('op');
    $id_akun = $this->uri->segment(3);
    $status = $this->uri->segment(4);
    $get['akun'] = $this->doc->get($status,$id_akun);
    foreach ($get['akun'] as $obj1) {
      $username = $obj1->email;
    }
    $password = $this->input->post('password');
    $this->load->helper('string');
      // $myfile = fopen("pass.txt", "a") or die("Unable to open file!");
      // $password = random_string('alnum',7);
    // $subject = 'nyoba';
    // $message = '<p>Selamat Mail nya Berhasil Yey :)</p>';
    // $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    // <html xmlns="http://www.w3.org/1999/xhtml">
    // <head>
    //     <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
    //     <title>' . html_escape($subject) . '</title>
    //     <style type="text/css">
    //         body {
    //             font-family: Arial, Verdana, Helvetica, sans-serif;
    //             font-size: 16px;
    //         }
    //     </style>
    // </head>
    // <body>
    // ' . $message . '
    // </body>
    // </html>';
    // Also, for getting full html you may use the following internal method:
    //$body = $this->email->full_html($subject, $message);

    // $result = $this->email
    //     ->from('aryo100@gmail.com')
    //     ->reply_to('aryo100@gmail.com')    // Optional, an account where a human being reads.
    //     ->to($username)
    //     ->subject($subject)
    //     ->message($body)
    //     ->send();
    // var_dump($result);
    // echo '<br />';
    // echo $this->email->print_debugger();
    $txt = $username."  ".$password."\r\n";
    fwrite($myfile, $txt);
    fclose($myfile);
		$pt = $this->input->post('pt');
		$data = array(
      'username' => $username,
      'password' =>  md5($password),
      'id' => $id_akun,
      'status' => $status
			);
    $this->doc->simpan($data,'akun');
    $data1['status'] = 'approved';
    $this->doc->update($id_akun,$data1,$status);
		redirect('admin/view_dona');
  }

  public function unapproved()
	{
    $id_akun = $this->uri->segment(3);
    $status = $this->uri->segment(4);
    $data1['status'] = 'unapproved';
    $this->doc->update($id_akun,$data1,$status);
		redirect('admin/view_dona');
  }

	public function guru_hapus($id){
		$this->sik->hapus_guru($id);
		redirect('admin/view_guru');
	}

  public function siswa_hapus($id){
		$this->sik->hapus_siswa($id);
		redirect('admin/view_siswa');
	}

	public function guru_edit($id){
    $data['title'] = "Edit data Guru";
		$data['op'] = 'edit';
		$data['sql'] = $this->sik->edit_guru($id);
    $data['kelas'] = $this->sik->get_kelas();
    $data['mata_pelajaran'] = $this->sik->get_mata_pelajaran();
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_add_data_guru',$data);
    $this->load->view('layout/footer');
	}

  public function siswa_edit($id){
    $data['title'] = "Edit data Siswa";
		$data['op'] = 'edit';
		$data['sql'] = $this->sik->edit_siswa($id);
    $data['kelas'] = $this->sik->get_kelas();
    $data['ortu'] = $this->sik->get_ortu();
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_add_data_siswa',$data);
    $this->load->view('layout/footer');
	}

  public function view_kelas(){
    $data['title'] = "kelas";
    $data['sql'] = $this->sik->get_kelas();
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_view_kelas',$data);
    $this->load->view('layout/footer');
  }

  public function hapus_kelas($id){
		$this->sik->hapus_kelas($id);
		redirect('admin/view_kelas');
	}

  public function buat_beasiswa(){
    $id_penerima = $this->uri->segment(4);
    $id_donatur = $this->uri->segment(3);
    $data = array(
      'id_penerima' => $id_penerima,
      'id_donatur' => $id_donatur,
      'status' => 'menunggu'
      );
    
    $query = $this->doc->get('beasiswa', '');
    if(count($query) >= 2) {
      echo "<script type='text/javascript'>alert ('Maaf Username Dan Password Anda Salah !');
				document.location='<?php echo base_url(); ?>/index.php/list_dona';
        </script>";
    }

    else {
      $this->doc->simpan($data,'beasiswa');
      redirect('penerima/view_dona');
    }
    // redirect('penerima/data_lengkap_dona/'.$id_donatur.'/donatur');
  }

  public function view_chat(){
    $data['sql1'] = $this->doc->get('donatur',$this->uri->segment(3));
    $data['sql'] = $this->doc->get_chat($this->session->userdata('id'),$this->uri->segment(3));
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_view_chat',$data);
    $this->load->view('layout/footer');
  }

  public function des_simpan(){
    $id = $this->input->post('id');
    $deskripsi = $this->input->post('deskripsi');
    $data['deskripsi'] = $deskripsi;
    $data['id'] = $id;
    $this->doc->update($id,$data,'penerima');
    redirect('penerima/data_lengkap_pene/'.$id.'/penerima');
  }

  public function simpan_chat(){
    $id_penerima = $this->uri->segment(3);
    $status = $this->uri->segment(5);
    $id_donatur = $this->uri->segment(4);
    $isi = $this->input->post('isi');
    $data = array(
      'id_penerima' => $id_penerima,
      'id_donatur' => $id_donatur,
      'isi' => $isi,
      'waktu' => date('Y-m-d'),
      'status' => $status
			);
    $this->doc->chat_simpan($data);
    redirect('penerima/view_chat/'.$id_donatur);
  }

  public function data_lengkap_pene()
  {
    $data['title'] = "Profil Penerima";
    $data['sql']=$this->doc->detail($this->session->userdata('id'),'penerima');
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_profil_lengkap',$data);
    $this->load->view('layout/footer');
  }

  public function data_lengkap()
  {
    $data['title'] = "Profil Donatur";
    $data['sql']=$this->doc->detail($this->uri->segment(3),'donatur');
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_profil_lengkap',$data);
    $this->load->view('layout/footer');
  }

  public function list_dona()
  {
    $data['title'] = "Donatur";
    $data['sql']=$this->doc->get('donatur','');
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_dona_list',$data);
    $this->load->view('layout/footer');
  }

}
?>
