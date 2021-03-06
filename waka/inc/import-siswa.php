<div class="col-md-12">
	<div class="row">
		<div class="col-md-8">
			<h4>Import Data Siswa</h4>
			<hr>
			<br>
			<div class="panel panel-default">
				<div class="panel-body">
					<center>
						<a href="<?= base('waka/download/file/sample_siswa.xlsx'); ?>" class="btn btn-success">Download Template</a>
						<a href="<?= base('waka/siswa'); ?>" class="btn btn-primary">Kembali</a>
					</center>
					<br>
					<form action="" class="form form-group" method="post" enctype="multipart/form-data">
						<div class="col-sm-10">
							<input type="file" name="file" class="form form-control">
						</div>
						<div class="col-sm-2">
							<label for=""></label>
							<input type="submit" name="submit" class="btn btn-default" value="Import">
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Petunjuk
				</div>
				<div class="panel-body">
					<ul class="list-group">
						<li class="list-group-item">1. Silahkan downlod contoh file terlebih dahulu</li>
						<li class="list-group-item">2. Ikuti format data seperti pada template/contoh</li>
						<li class="list-group-item">3. Setelah file data sudah disiapkan, pilih file yang akan diimport</li>
						<li class="list-group-item">4. Klik Import dan tunggu hingga data selesai di load</li>
						<li class="list-group-item">5. Selesai</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
if (isset($_POST['submit'])) {
	$filename = @$_FILES['file']['name'];
	$tempname = @$_FILES['file']['tmp_name'];
	$filetype = @$_FILES['file']['type'];
	$folder = "../upload/";

	if (empty($filename) || $filename == "") {
		echo "<script>sweetAlert('Oops!', 'Mohon pilih file yang akan diimport!', 'error');</script>";
		echo notice(0);
	} else {

		$type = strtolower($filename);
		$type = explode(".", $filename);
		$realtype = end($type);
		$listext = array("xls", "xlsx", "XLS", "XLSX");

		if (in_array($realtype, $listext)) {

			$move = move_uploaded_file($tempname, $folder . $filename);

			if ($move) {
				$excelfile = $folder . $filename;

				$excelReader  = PHPExcel_IOFactory::createReaderForFile($excelfile);
				$excelObj     = $excelReader->load($excelfile);
				$worksheet    = $excelObj->getActiveSheet();
				$lastRow      = $worksheet->getHighestRow();

				for ($i = 2; $i <= $lastRow; $i++) :
					$nis = anti_inject($worksheet->getCell('B' . $i)->getValue());
					$nisn = anti_inject($worksheet->getCell('C' . $i)->getValue());
					$nama = addslashes($worksheet->getCell('D' . $i)->getValue());
					$nama = ucwords($nama);
					$kelas = anti_inject($worksheet->getCell('E' . $i)->getValue());
					$rombel = anti_inject($worksheet->getCell('F' . $i)->getValue());
					$jk = anti_inject($worksheet->getCell('G' . $i)->getValue());
					$tempat = anti_inject($worksheet->getCell('H' . $i)->getValue());
					$tanggal_lahir = anti_inject($worksheet->getCell('I' . $i)->getValue());
					$alamat_lengkap = anti_inject($worksheet->getCell('J' . $i)->getValue());
					$email = anti_inject($worksheet->getCell('K' . $i)->getValue());
					$nomer_telp = anti_inject($worksheet->getCell('L' . $i)->getValue());
					$pass       = password_hash("123456", PASSWORD_DEFAULT, ['cost' => 12]);

					$insert = insert('tbl_siswa', "id, nis, nisn, nama, kelas, rombel, jk, tempat, tanggal_lahir, alamat_lengkap, email, nomer_telp, password", "NULL, '$nis', '$nisn', '$nama', '$kelas', '$rombel', '$jk', '$tempat', '$tanggal_lahir', '$alamat_lengkap', '$email', '$nomer_telp', '$pass'");

				endfor;

				if ($insert) {
					echo "<script>swal('Yosh!', 'Data siswa berhasil diimport!', 'success');</script>";
					echo notice(1);
					echo location(base('waka/siswa'));
				} else {
					echo "<script>sweetAlert('Oops!', 'Data Siswa Gagal diimport!', 'error');</script>";
					echo notice(0);
				}
			} else {
				echo "<script>sweetAlert('Oops!', 'File tidak dapat diupload ke System!', 'error');</script>";
				echo notice(0);
			}
		} else {
			echo "<script>sweetAlert('Oops!', 'Type file harus XLS/XLSX!', 'error');</script>";
			echo notice(0);
		}
	}
}

?>