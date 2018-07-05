<?php
$id_guru = "";
$nama_depan = "";
$nama_tengah = "";
$nama_belakang = "";
$alamat = "";
$kelurahan = "";
$kecamatan = "";
$kota = "";
$provinsi = "";
$jenis_kelamin = "";
$tempat_lahir = "";
$tanggal_lahir = "";
$nip = "";
$email = "";
$no_telp = "";
$id_kelas = "";
$id_mapel = "";
if ($op=="edit") {
  foreach ($sql->result() as $obj) {
    $op = "edit";
    $id_guru = $obj->id_guru;
    $nama_depan = $obj->nama_depan;
    $nama_tengah = $obj->nama_tengah;
    $nama_belakang = $obj->nama_belakang;
    $alamat = $obj->alamat;
    $kelurahan = $obj->kelurahan;
    $kecamatan = $obj->kecamatan;
    $kota = $obj->kota;
    $provinsi = $obj->provinsi;
    $jenis_kelamin = $obj->jenis_kelamin;
    $tempat_lahir = $obj->tempat_lahir;
    $tanggal_lahir = $obj->tanggal_lahir;
    $nip = $obj->nip;
    $email = $obj->email;
    $no_telp = $obj->no_telp;
    $id_kelas = $obj->id_kelas;
    $id_mapel = $obj->id_mapel;
  }
}
?>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chosen.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker3.min.css" />
<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
<div class="page-content">
  <div class="page-header">
    <h1>

    </h1>
  </div><!-- /.page-header -->

  <div class="row">
    <div class="col-xs-12">
      <!-- PAGE CONTENT BEGINS -->
      <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/admin/guru_simpan" method="POST">
        <input type="hidden" name="op" value="<?php echo $op;?>" class="form-control">
        <input type="hidden" name="id_guru" value="<?php echo $id_guru;?>" class="form-control">
        <!-- Nama -->
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Lengkap </label>
          <div class="col-sm-3">
            <input type="text" id="form-field-1" placeholder="Nama Depan" name="nama_depan" value="<?php echo $nama_depan;?>" class="col-xs-12" required/>
          </div>
          <div class="col-sm-3">
            <input type="text" id="form-field-1" placeholder="Nama Tengah" name="nama_tengah" value="<?php echo $nama_tengah;?>" class="col-xs-12" required/>
          </div>
          <div class="col-sm-3">
            <input type="text" id="form-field-1" placeholder="Nama Belakang" name="nama_belakang" value="<?php echo $nama_belakang;?>" class="col-xs-12" required/>
          </div>
        </div>

        <!-- Alamat -->
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alamat </label>
          <div class="col-sm-6">
            <textarea class="form-control" id="form-field-8" placeholder="Alamat" name="alamat" required><?php echo $alamat;?></textarea>
          </div>
        </div>

        <!-- Kelurahan / Kecamatan-->
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kelurahan / Kecamatan </label>
          <div class="col-sm-3">
            <input type="text" id="form-field-1" placeholder="Kelurahan" class="col-xs-12" name="kelurahan" value="<?php echo $kelurahan;?>" required/>
          </div>
          <div class="col-sm-3">
            <input type="text" id="form-field-1" placeholder="Kecamatan" class="col-xs-12" name="kecamatan" value="<?php echo $kecamatan;?>" required/>
          </div>
        </div>

        <!-- Kota -->
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kota </label>
          <div class="col-sm-3">
            <input type="text" id="form-field-1" placeholder="Kota" class="col-xs-12" name="kota" value="<?php echo $kota;?>" required/>
          </div>
        </div>

        <!-- Propinsi-->
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Provinsi </label>
          <div class="col-sm-3">
            <select class="form-control" id="form-field-select-1" name="provinsi" required>
              <option value=""></option>
              <option value="Alabama" <?php if($provinsi == 'Alabama'){ echo 'selected'; } ?>>Alabama</option>
              <option value="Alaska" <?php if($provinsi == 'Alaska'){ echo 'selected'; } ?>>Alaska</option>
            </select>
          </div>
        </div>

        <!-- Jenis Kelamin -->
        <div class="form-group control-group">
          <label class=" col-sm-3 control-label no-padding-right">Jenis Kelamin</label>

          <div class="radio">
            <label>
              <input class="form-field-radio ace" type="radio" name="jenis_kelamin" value="Laki - laki" <?php if($jenis_kelamin == 'Laki - laki'){ echo 'checked'; } ?> required/>
              <span class="lbl"> Laki-laki</span>
            </label>

            <label>
              <input class="form-field-radio ace" type="radio" name="jenis_kelamin" value="Perempuan" <?php if($jenis_kelamin == 'Perempuan'){ echo 'checked'; } ?> required/>
              <span class="lbl"> Perempuan</span>
            </label>
          </div>
        </div>

        <!-- TTL -->
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tempat, tanggal lahir </label>
          <div class="col-sm-3">
            <input type="text" id="form-field-1" placeholder="Tempat" class="col-xs-12" name="tempat_lahir" value="<?php echo $tempat_lahir;?>" required/>
          </div>
          <div class="col-sm-3">
            <div class="input-group">
              <input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" name="tanggal_lahir" value="<?php echo $tanggal_lahir;?>" required/>
              <span class="input-group-addon">
                <i class="fa fa-calendar bigger-110"></i>
              </span>
            </div>
          </div>
        </div>

        <!-- NIP -->
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> NIP </label>
          <div class="col-sm-3">
            <input type="text" id="form-field-1" placeholder="NIP" class="col-xs-12" name="nip" value="<?php echo $nip;?>"required/>
          </div>
        </div>

        <!-- Email -->
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>
          <div class="col-sm-3">
            <input type="text" id="form-field-1" placeholder="Email" class="col-xs-12" name="email" value="<?php echo $email;?>" required/>
          </div>
        </div>

        <!-- No. Telpon -->
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No. Telpon </label>
          <div class="col-sm-3">
            <input type="text" id="form-field-1" placeholder="No. Telpon" class="col-xs-12" name="no_telp" value="<?php echo $no_telp;?>" required/>
          </div>
        </div>

        <!-- Kelas -->
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kelas </label>
          <div class="col-sm-3">
            <select class="form-control" id="form-field-select-1" name="id_kelas" required>
              <option value=""></option>
              <?php foreach ($kelas->result() as $row_kelas) {
                echo "<option value='".$row_kelas->id_kelas."'>
                ".$row_kelas->nama_kelas."
                </option>";
              } ?>
            </select>
          </div>
        </div>

        <!-- Mata Pelajaran -->
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mata Pelajaran </label>
          <div class="col-sm-3">
            <select class="form-control" id="form-field-select-1" name="id_mapel" required>
              <option value=""></option>
              <?php foreach ($mata_pelajaran->result() as $row_mata_pelajaran) {
                echo "<option value='".$row_mata_pelajaran->id_mapel."'>
                ".$row_mata_pelajaran->nama_mapel."
                </option>";
              } ?>
            </select>
          </div>
        </div>

        <!-- Submit -->
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right"></label>
          <div class="col-sm-3">
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
          </div>
        </div>
      </form>
      <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</div>
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
<script type="text/javascript">
//datepicker plugin
//link
$('.date-picker').datepicker({
  autoclose: true,
  todayHighlight: true
})
//show datepicker when clicking on the icon
.next().on(ace.click_event, function(){
  $(this).prev().focus();
});
</script>
