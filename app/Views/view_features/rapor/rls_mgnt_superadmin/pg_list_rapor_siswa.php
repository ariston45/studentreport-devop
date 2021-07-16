<style>
  .table thead th {
    padding-top: 2px;
    padding-bottom: 2px;
  }

  .table-responsive {
    margin-top: 20px;
  }

  .btn-custom {
    padding-top: 6px;
    padding-bottom: 6px;
  }

  .input-group {
    padding-left: 0px;
  }

  .table thead th{
    border: 0px;
    padding-left: 0px;
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
    <b>List Rapor Siswa</b><br>
    Berikut ini merupakan list rapor siswa yang sudah dihimpun.
  </p>
  <hr>
  <?php
  if (!empty($_SESSION['data_siswa'])) {
    $list = $_SESSION['data_siswa'];
  ?>
    <div class="table-responsive">
      <table class="table table-striped col-9">
        <thead>
          <tr>
            <th colspan="3">Tahun Ajaran : -</th>
          </tr>
          <tr>
            <th colspan="3">Kelas : -</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($list as $key => $value) { ?>
            <tr>
              <td scope="col" style="width: 10px;"><?= $no?>.</td>
              <td scope="col"><?= $value['stu_id'] ?></td>
              <td scope="col" style="width: 10px;">
                <div class="dropdown">
                  <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <i class="dw dw-more"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="<?= $content['pg_link'] . '/list-rapor-siswa' . '/' . $value['stu_num'] ?>"><i class="dw dw-eye"></i> Lihat Rapor</a>
                  </div>
                </div>
              </td>
            </tr>
          <?php $no++;
          } ?>
        </tbody>
      </table>
    </div>
  <?php } ?>
</div>