<style>
  .table thead th {
    padding-top: 2px;
    padding-bottom: 2px;
  }

  .table-responsive {
    margin-top: 20px;
  }
  p {
    font-size: 13px;
  }
</style>
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
  <!-- # -->
  <h6>Rapor Siswa - <?= $content['pg_title'] ?></h6>
  <p style="font-size: 13px;" class="mb-20"><?= $content['pg_subtitle'] ?></p>
  <hr>
  <!--  -->
  <?= view($content['content_menu']) ?>
  <!--  -->
  <p style="font-size: 13px;">
    <b>Cari Siswa</b><br>
    Gunakan pencari rapor siswa secara instan dengan menginputkan nomor induk, nama siswa.
  </p>
  <hr>
  <form action="<?= $content['pg_link'] ?>/eksekusi-cari-rapor-siswa" method="POST">
    <div class="form-group row">
      <label class="col-sm-12 col-md-4 col-form-label">Cari Siswa (Nomor Induk, Nama, Email)</label>
      <div class="col-sm-12 col-md-8">
        <input type="text" name="keywords" class="form-control col-12 fh-35" placeholder="Nomor induk, nama, email" autocomplete="off" required>
      </div>
    </div>
    <div class="text-right">
      <button type="reset" class="btn btn-sm btn-outline-secondary">Batal</button>
      <button type="submit" class="btn btn-sm btn-primary">Cari</button>
    </div>
  </form>
  <?php
  if (!empty($_SESSION['data_siswa'])) { 
    $list = $_SESSION['data_siswa'];
    ?>
    <p> <i>Berikut ini data dari hasil pencarian: "<?=$_SESSION['keywords']?>" </i> </p>
    <button type="button" class="btn btn-sm btn-light" style="font-size: 13px;"><i class="icon-copy dw dw-delete-3" style="color: red;"></i> Bersihkan Data</button>  
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>No Induk</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($list as $key => $value) { ?>
            <tr>
              <td scope="col"><?= $no ?></td>
              <td scope="col"><?= $value['stu_id'] ?></td>
              <td scope="col"><?= $value['nama'] ?></td>
              <td scope="col"><?= $value['email'] ?></td>
              <td scope="col">
                <div class="dropdown">
                  <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <i class="dw dw-more"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="<?= $content['pg_link']. '/list-rapor-siswa'.'/'.$value['stu_num'] ?>"><i class="dw dw-eye"></i> Lihat Rapor</a>
                  </div>
                </div>
              </td>
            </tr>
          <?php $no++;
          } ?>
        </tbody>
      </table>
    </div>
  <?php }elseif (!empty($_SESSION['keywords'])) { ?>
   <p> <i>Mohon maaf data dari hasil pecarian "<?=$_SESSION['keywords']?>" tidak tersedia.</i> </p>
  <?php }else { ?>
    <p><i>*/Inputkan keyword pada form diatas.</i></p>
  <?php } ?>
</div>