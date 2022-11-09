<html>

<head>
	<title>Form Tambah Data Cerai</title>
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
		<h3>Form Add Cerai</h3>
	</div>
	<div class="card-body">
		<form id="form-tambah-cerai" method="post" action="<?=site_url('cerai/insert')?>" enctype="multipart/form-data">
			<div class="form-group">
				<label class="form-label">Nomor Surat Cerai</label>
				<input required maxlength="16" class="form-control" name="nomor_surat_cerai">
			</div>
			<div class="form-group">
				<label class="form-label">Nama Jemaat Pria</label>
				<select required class="form-control" name="nik">
					<option value="" disabled selected>-- PILIH --</option>
					<?php foreach($jemaatpria as $jp):?>
						<option value="<?= $jp['nik']?>"><?=$jp['nama_jemaat']?></option>
					<?php endforeach;?>
				</select>
			</div>
			<div class="form-group">
				<label class="form-label">Nama Jemaat Wanita</label>
				<select required class="form-control" name="nik_istri">
					<option value="" disabled selected>-- PILIH --</option>
					<?php foreach($jemaatwanita as $jw):?>
						<option value="<?= $jw['nik']?>"><?=$jw['nama_jemaat']?></option>
					<?php endforeach;?>
				</select>
			</div>
			<div class="form-group">
				<label class="form-label">Tanggal Cerai</label>
				<input required type="date" class="form-control" name="tanggal_cerai">
			</div>
			<div class="form-group">
				<label class="form-label">Tempat Cerai</label>
				<input required type="text" class="form-control" name="tempat_cerai">
			</div>
			<div class="form-group">
				<label for="alasan_cerai">Alasan Cerai</label>
				<select required name="alasan_cerai" id="alasan_cerai" class="form-control">
					<option value="" disabled selected>-- PILIH --</option>
					<option value="Cerai Hidup">Cerai Hidup</option>
					<option value="Cerai Mati">Cerai Mati</option>
					<option value="Dll">Dll</option>
				</select>
			</div>
			<div class="form-group">
				<label class="form-label">Foto</label>
				<input require type="file" class="form-control" name="userfile" size="20" required="">
			</div>

	</div>
	<div class="card-footer">
		<button type="submit" id="btn-save-cerai" class="btn btn-success btn-sm">
			<i class="fa fa-save"></i> Simpan
		</button>
		<a href="<?=site_url('cerai')?>" class="btn btn-primary btn-sm">
			<i class="fa fa-reply"></i> Kembali
		</a>
	</div>
	</form>
</div>
</body>

</html>
<script>
	$(function () {
		$("#btn-save-cerai").on("click", function() {
			let validate = $("#form-tambah-cerai").valid()
			if (validate) {
				$("#form-tambah-cerai").submit()
			}
		})
		$("#form-tambah-cerai").validates({
			rules: {
				nomor_surat_cerai: {
					digits: true
				},
				nama_jemaat_cerai1: {
					digits: true
				},
				nama_jemaat_cerai2: {
					digits: true
				},
				tanggal_cerai: {
					digits: true
				},
				tempat_cerai: {
					digits: true
				},
				alasan_cerai: {
					digits: true
				},
				foto: {
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


