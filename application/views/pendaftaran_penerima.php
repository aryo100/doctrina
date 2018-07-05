<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Pendaftaran</title>
    
      <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> -->

    <!-- <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'> -->
      <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/style.css">

    
  </head>
  <body>
    <div class="container">  
      <h2>Form Pendaftaran Peneriama</h2>
      <!-- <form method="post" action="<?php echo base_url();?>/Daftar/dona_simpan"> -->
      <?php echo form_open_multipart('Daftar/pene_simpan');?>
        <div class="row">
          <h4>Data Akun</h4>
          <div class="input-group input-group-icon">
            <input type="text" name="nama" placeholder="Nama Lengkap" required/>
            <div class="input-icon"><i class="fa fa-user"></i></div>
          </div>
          <div class="input-group input-group-icon">
            <input name="email" type="email" placeholder="Email" required/>
            <div class="input-icon"><i class="fa fa-envelope"></i></div>
          </div>
          <div class="input-group input-group-icon">
            <input type="number" name="nik" placeholder="no. pelajar" required/>
            <div class="input-icon"><i class="fa fa-key"></i></div>
          </div>
          <div class="input-group input-group-icon">
            <input type="number" name="no_telp" placeholder="No.Telp" required/>
            <div class="input-icon"><i class="fa fa-key"></i></div>
          </div>
        </div>
        <div class="row">
          <div class="input-group">
              <h4>Alamat</h4>

              <textarea name="alamat" ></textarea>
          </div>
        </div>
        <div class="row">
          <div class="input-group">
              <h4>Deskripsi</h4>

              <textarea name="deskripsi" ></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-half">
            <h4>Tanggal Lahir</h4>
            <div class="input-group">
              <div class="col-third">
                <input name="tanggal" type="text" placeholder="DD" required/>
              </div>
              <div class="col-third">
                <input name="bulan" type="text" placeholder="MM" required/>
              </div>
              <div class="col-third">
                <input name="tahun" type="text" placeholder="YYYY" required/>
              </div>
            </div>
          </div>
          <div class="col-half">
            <h4>Jenis Kelamin</h4>
            <div class="input-group">
              <input type="radio" name="gender" value="cowok" id="gender-male" checked/>
              <label for="gender-male">laki -laki</label>
              <input type="radio" name="gender" value="cewek" id="gender-female" />
              <label for="gender-female" >Perempuan</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="input-group foto">
            <h4>Pas Foto</h4>
            <div class="col-third">
                <div class="image_preview foto">
                  <img class="pict_url" src="">
                </div>
            </div>
            <div class="col-ninth">
              <input name="foto_pas" class="upload_btn_foto" data-target=".foto" type="file" accept="image/*" style="float: left;" required/>
            </div>
        </div>
        <div class="row">
            <div class="input-group slip_gaji">
              <h4>Upload Bukti Surat Keterangan Tidak Mampu</h4>
              <div class="col-third">
                <div class="image_preview gaji">
                  <img class="pict_url" src="">
                </div>
              </div>
              <div class="col-ninth">
                <input name="ss_sktm" class="upload_btn_slip_gaji" data-target=".gaji" type="file" accept="image/*" style="float: left;">
              </div>
        </div>
        <div class="row">
          <div class="input-group">
              <h4>Submit</h4>
            <div class="col-half">
              <input type="submit" value="Submit">
            </div>

            <div class="col-half">
                <input type="reset" value="Reset">
            </div>
          </div>
        </div>
      </form>
    </div>
    <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
    
    <script src="<?php echo base_url();?>/assets/js/jquery-2.1.4.min.js"></script>
    <script  src="<?php echo base_url();?>/assets/js/index.js"></script>
    <script src="<?php echo base_url();?>/assets/js/upload.js"></script>

  </body>

</html>
