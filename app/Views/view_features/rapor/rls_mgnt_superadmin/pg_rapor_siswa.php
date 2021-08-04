<style>
  .tb-title {
    margin-top: 30px;
    margin-bottom: 30px;
  }

  .tb-title tbody td {
    padding-top: 2px;
    padding-bottom: 2px;
    border: none;
  }

  .hed-1 {
    width: 20%;
  }

  .hed-3 {
    width: 1px;
    padding-left: 0px;
    padding-right: 0px;
  }

  .tb-content thead th {
    padding-top: 2px;
    padding-bottom: 2px;
    text-align: center;
    vertical-align: middle;
    font-size: 13px;
  }

  .tb-content tbody td {
    padding-top: 2px;
    padding-bottom: 2px; 
  }

  .id-no {
    width: 2%;
  }

  .id-matkul{
    width: 42%;
  }

  .id-deskrip{
    width: 26%;
  }

  .id-kkm{
    width: 4%;
  }

  .id-angka{
    width: 4%;
  }

  .id-huruf{
    width: 22%;
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
  <p style="text-align: center; font-size:14px;"> <b>
      Laporan hasil Belajar Siswa Tengah Semester <br>
      Tahun Ajaran 2019/2020 </b>
  </p>
  <table class="table tb-title">
    <tbody>
      <tr>
        <td scope="col" class="hed-1">Nama </td>
        <td scope="col" class="hed-3">:</td>
        <td scope="col" class="hed-2"><?=$data['siswa']['stu_fullname']?></td>
        <td scope="col" class="hed-1">Tahun Ajaran</td>
        <td scope="col" class="hed-3">:</td>
        <td scope="col" class="hed-2"><?=$data['evaluasi']['ach_years']?></td>
      </tr>
      <tr>
        <td scope="col">Nomor Induk</td>
        <td scope="col" class="hed-3">:</td>
        <td scope="col"><?=$data['siswa']['stu_id']?></td>
        <td scope="col">Semester</td>
        <td scope="col" class="hed-3">:</td>
        <td scope="col"><?=$data['evaluasi']['cat_category_name']?></td>
      </tr>
      <tr>
        <td scope="col">Kelas</td>
        <td scope="col" class="hed-3">:</td>
        <td scope="col"><?=$data['kelas']['cls_name']?></td>
        <td scope="col">Email</td>
        <td scope="col" class="hed-3">:</td>
        <td scope="col"><?=$data['siswa']['stu_email']?></td>
      </tr>
    </tbody>
  </table>

  <table class="table tb-content table-bordered">
    <thead>
      <tr>
        <th class="id-no" rowspan="2" scope="col">No.</th>
        <th class="id-matkul" rowspan="2" scope="col">Mata Pelajaran</th>
        <th class="id-kkm" rowspan="2" scope="col">KKM</th>
        <th class="id-nim" colspan="2" scope="col">Nilai</th>
        <th class="id-deskrip" rowspan="2" scope="col">Deskripsi Kemajuan Belajar</th>
      </tr>
      <tr>
        <th class="id-angka" scope="col">Angka</th>
        <th class="id-huruf" scope="col">Huruf</th> 
      </tr>
    </thead>
    <tbody>
      
    </tbody>
  </table>
</div>