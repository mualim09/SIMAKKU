<?php
$page = @$_GET['page'];
$clsnm = substr($k->nama_kelas, 0, 2);
$cekwali = $cekyo;
?>
<script type='text/javascript'>
  $(function() {
    $("#list-of-data").hide();
    $("#list-nilai").hide();
    $(".xyz").click(function() {
      $("#list-of-data").slideToggle('slow');
      $("#list-nilai").slideUp(1000);
    });
    $(".click-nilai").click(function() {
      $("#list-nilai").slideToggle("slow");
      $("#list-of-data").slideUp(1000);
    });
  });
</script>
<ul class="nav nav-pills nav-stacked">
  <li role="presentation" class="active">
    <a href="<?= base('siswa/dashboard'); ?>"><span class="glyphicon glyphicon-dashboard"></span>&nbsp; Dashboard</a>
  </li>
  <li role="presentation" id="parent-data">
    <a href="#" class="xyz"><span class="glyphicon glyphicon-calendar"></span>&nbsp; Master Data &nbsp;<span class="caret"></span></a>
    <ul class="nav nav-pills nav-stacked" id="list-of-data">
      <li role="presentation" class="data-jadwal">
        <a href="<?= base('siswa/data-jadwal'); ?>"><span class="glyphicon glyphicon-calendar"></span>&nbsp; Data Jadwal</a>
      </li>
      <li role="presentation" class="data-siswa">
        <a href="<?= base('absensi'); ?>"><span class="glyphicon glyphicon-user"></span>&nbsp; Absensi Harian</a>
      </li>
      <li role="presentation" class="data-kehadiran">
        <a href="<?= base('siswa/data-kehadiran'); ?>"><span class="glyphicon glyphicon-signal"></span>&nbsp; Data Kehadiran</a>
      </li>
      <li role="presentation" class="data-keuangan">
        <a href="<?= base('siswa/data-keuangan'); ?>"><span class="glyphicon glyphicon-signal"></span>&nbsp; Keuangan</a>
      </li>
    </ul>
  </li>
  <li role="presentation" id="nilai">
    <a href="#" class="click-nilai"><span class="glyphicon glyphicon-file"></span>&nbsp; Nilai &nbsp; <span class="caret"></span></a>
    <ul class="nav nav-pills nav-stacked" id="list-nilai">
      <li role="presentation" class="lihat-nilai">
        <a href="<?= base('siswa/lihat-nilai'); ?>" class=""><span class="glyphicon glyphicon-file"></span>&nbsp; Lihat Nilai</a>
      </li>
      <li role="presentation" class="nilai-rapot">
        <a href="<?= base('siswa/nilai-rapot'); ?>"><span class="glyphicon glyphicon-book"></span>&nbsp; Nilai Rapot</a>
      </li>
    </ul>
  </li>
  <li role="presentation" class="pengaturan">
    <a href="<?= base('siswa/pengaturan'); ?>"><span class="glyphicon glyphicon-cog"></span>&nbsp; Pengaturan</a>
  </li>
  <li role="<?= base('siswa/presentation" class="hub-admin">
    <a href="hubungi-admin'); ?>"><span class="glyphicon glyphicon-earphone"></span>&nbsp; Hub. Admin</a>
  </li>
  <li role="presentation" style="height: 600px;background: #eee;">&nbsp;</li>
</ul>