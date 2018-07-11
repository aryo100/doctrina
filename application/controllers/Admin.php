<?php

class Admin extends CI_Controller
{

  function __construct(){
    parent::__construct();
    $this->load->model('doc');
    $this->load->library('email');
    if ($this->session->userdata('udhmasuk')==false) {
      redirect('login');
    }
  }

  function index(){
    // $data['title'] = "Dashboard";
		// $this->load->view('layout/header');
    // $this->load->view('layout/sidebar',$data);
    // $this->load->view('layout/dashboard');
    // $this->load->view('layout/footer');
    redirect('admin/view_dona');
  }

  function view_dona(){
    $data['title'] = "Data Donatur";
    $data['sql1']=$this->doc->get('donatur','');
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_view_data_dona',$data);
    $this->load->view('layout/footer');
  }

  function view_pene(){
    $data['title'] = "Data Penerima";
    $data['sql1']=$this->doc->get('penerima','');
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_view_data_pene',$data);
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
    // $password = $this->input->post('password');
    $this->load->library('email');
    //use for random string
    $this->load->helper('string');
    $password = random_string('alnum',7);
    $myfile = fopen("pass.txt", "a") or die("Unable to open file!");
    $txt = $username."  ".$password."\r\n";
    fwrite($myfile, $txt);
    fclose($myfile);
    $subject = 'Konfirmasi Akun DOCTRINA';
    // $message = '<p>Selamat Mail nya Berhasil Yey :) <br> Username : '.$username.'<br> Password : '.$password.'</p>';
    $body = 
    '<html>
      <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Konfirmasi Akun Doctrina</title>
        <style type="text/css">
        
          @media (min-width: 500px) {
            .avatar__media .media__fluid {
              margin-top: 3px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .button,
            .button__shadow {
              font-size: 16px !important;
              display: inline-block !important;
              width: auto !important;
            }
          }
    
    
          @media (min-width: 500px) {
            footer li {
              display: inline-block !important;
              margin-right: 20px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .mt1--lg {
              margin-top: 10px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .mt2--lg {
              margin-top: 20px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .mt3--lg {
              margin-top: 30px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .mt4--lg {
              margin-top: 40px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .mb1--lg {
              margin-bottom: 10px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .mb2--lg {
              margin-bottom: 20px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .mb3--lg {
              margin-bottom: 30px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .mb4--lg {
              margin-bottom: 40px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .pt1--lg {
              padding-top: 10px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .pt2--lg {
              padding-top: 20px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .pt3--lg {
              padding-top: 30px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .pt4--lg {
              padding-top: 40px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .pb1--lg {
              padding-bottom: 10px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .pb2--lg {
              padding-bottom: 20px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .pb3--lg {
              padding-bottom: 30px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .pb4--lg {
              padding-bottom: 40px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            pre {
              font-size: 14px !important;
            }
            .body {
              font-size: 14px !important;
              line-height: 24px !important;
            }
            h1 {
              font-size: 22px !important;
            }
            h2 {
              font-size: 16px !important;
            }
            small {
              font-size: 12px !important;
            }
          }
    
    
          @media (min-width: 500px) {
            .user-content pre,
            .user-content code {
              font-size: 14px !important;
              line-height: 24px !important;
            }
            .user-content ul,
            .user-content ol,
            .user-content pre {
              margin-top: 12px !important;
              margin-bottom: 12px !important;
            }
            .user-content hr {
              margin: 12px 0 !important;
            }
            .user-content h1 {
              font-size: 22px !important;
            }
            .user-content h2 {
              font-size: 16px !important;
            }
            .user-content h3 {
              font-size: 14px !important;
            }
          }
        </style>
      </head>
  
      <body class="body" style="font-family: -apple-system, BlinkMacSystemFont, Roboto, Ubuntu, Helvetica, sans-serif; line-height: initial; max-width: 580px;">
        <header class="mt2 mb2" style="margin-bottom: 20px; margin-top: 20px;">
        </header>
    
        <h1 style="box-sizing: border-box; font-size: 1.25rem; margin: 0; margin-bottom: 0.5em; padding: 0; color: #333;">Terima Kasih telah Mendaftar di DOCTRINA</h1>
        <p style="color: #999; box-sizing: border-box; margin: 0; margin-bottom: 0.5em; padding: 0; margin-bottom: 24px;">Berikut Ini Username dan Password yang dapat digunakan untuk login di website DOCTRINA</p>
        
        <div style="padding: 12px 14px; border: 1px solid #dadada; margin-bottom: 24px; display: inline-block;">
          <div style="display: inline-block">
            <h2 style="color: #333; font-size: 16px; font-weight: 400; margin: 0;">Username</h2>
            <p style="color: #999; font-size: 14px; font-weight: 400; margin: 0;">'.$username.'</p>
          </div>
          
          <div style="display: inline-block; margin-left: 42px;">
              <h2 style="color: #333; font-size: 16px; font-weight: 400; margin: 0;">Password</h2>
              <p style="color: #999; font-size: 14px; font-weight: 400; margin: 0;">'.$password.'</p>
          </div>
        </div>
      </body>
    </html>';
    // Also, for getting full html you may use the following internal method:
    $body = $this->email->full_html($subject, $body);

    $result = $this->email
        ->from('doctrina.net@gmail.com')
        // ->reply_to('aryo100@gmail.com')    // Optional, an account where a human being reads.
        ->to($username)
        ->subject($subject)
        ->message($body)
        ->send();
    var_dump($result);
    if($result > 0){
      echo "<script type='text/javascript'>alert ('Berhasil Terkirim !');
      </script>";
    } else{
      echo "<script type='text/javascript'>alert ('Gagal Mengirim !');
      </script>";
    }

    echo '<br />';
    echo $this->email->print_debugger();
    
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
    $this->doc->hapus($id_akun,'akun');
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

  public function simpan_kelas(){
    $kelas = $this->input->post('kelas');
    $data['nama_kelas'] = $kelas;
    $this->sik->simpan_kelas($data);
    redirect('admin/view_kelas');
  }

  public function view_mapel(){
    $data['title'] = "mata pelajaran";
    $data['sql'] = $this->sik->get_mata_pelajaran();
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_view_mapel',$data);
    $this->load->view('layout/footer');
  }

  public function hapus_mapel($id){
		$this->sik->hapus_mapel($id);
		redirect('admin/view_mapel');
	}

  public function simpan_mapel(){
    $mapel = $this->input->post('mapel');
    $data['nama_mapel'] = $mapel;
    $this->sik->simpan_mapel($data);
    redirect('admin/view_mapel');
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


  public function data_lengkap_dona()
  {
    $data['title'] = "Profil Donatur";
    $data['sql']=$this->doc->detail($this->uri->segment(3),'donatur');
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_profil_lengkap',$data);
    $this->load->view('layout/footer');
  }

  public function data_lengkap_pene()
  {
    $data['title'] = "Profil Penerima";
    $data['sql']=$this->doc->detail($this->uri->segment(3),'penerima');
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('pages/admin_profil_lengkap',$data);
    $this->load->view('layout/footer');
  }

}
?>
