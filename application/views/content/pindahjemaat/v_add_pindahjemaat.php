<html>

<head>
	<title>Form Tambah Data Pindah Jemaat</title>
	<!-- CSS only CDN -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- JQuery and Javascript CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
	<script async src="https://docs.opencv.org/master/opencv.js" type="text/javascript"></script>
	<!-- JQuery Validation CDN -->
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
</head>

<body>
<div style="width: 1200px;" class="card">
	<div class="card-header">
		<h3>Form Add Pindah Jemaat</h3>
	</div>
	<div class="card-body">
		<form id="form-tambah-pindahjemaat" method="post" action="<?=site_url('pindahjemaat/insert')?>" enctype="multipart/form-data">
			<div class="form-group">
				<label class="form-label">Nomor Surat</label>
				<input required type="number" maxlength="16" class="form-control" name="nomor_surat_pindahjemaat">
			</div>
			<div class="form-group">
				<label class="form-label">Nama Jemaat</label>
				<select required class="form-control" name="nik">
					<option value="" disabled selected>-- PILIH --</option>
					<?php foreach($jemaat as $j):?>
						<option value="<?= $j['nik']?>"><?=$j['nama_jemaat']?></option>
					<?php endforeach;?>
				</select>
			</div>
			<div class="form-group">
				<label class="form-label">Asal Gereja</label>
				<input required type="text" class="form-control" name="asal_gereja">
			</div>
			<div class="form-group">
				<label class="form-label">Tujuan Gereja</label>
				<input required type="text" class="form-control" name="tujuan_gereja">
			</div>
			<div class="form-group">
				<label class="form-label">Tahun Masuk</label>
				<input required type="date" class="form-control" name="tahun_masuk">
			</div>
			<div class="form-group">
				<label class="form-label">Tahun Keluar</label>
				<input required type="date" class="form-control" name="tahun_keluar">
			</div>

	</div>
	<div class="card-footer">
		<button type="submit" id="btn-save-pindahjemaat" class="btn btn-success btn-sm">
			<i class="fa fa-save"></i> Simpan
		</button>
		<a href="<?=site_url('pindahjemaat')?>" class="btn btn-primary btn-sm">
			<i class="fa fa-reply"></i> Kembali
		</a>
	</div>
	</form>
</div>
</body>

</html>
<script>
	$(function () {
		$("#btn-save-pindahjemaat").on("click", function() {
			let validate = $("#form-tambah-pindahjemaat").valid()
			if (validate) {
				$("#form-tambah-pindahjemaat").submit()
			}
		})
		$("#form-tambah-pindahjemaat").validates({
			rules: {
				nama_pindah_jemaat: {
					digits: true
				},
				asal_gereja: {
					digits: true
				},
				tujuan_gereja: {
					digits: true
				},
				tahun_masuk: {
					digits: true
				},
				tahun_keluar: {
					digits: true
				}
			},
			errorElement: 'span',
			errorPlacement: function (error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function (element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			}
		})
	})
</script>


