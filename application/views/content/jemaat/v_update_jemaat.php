<html>
<head>

	<title>Form Ubah Data Jemaat</title>
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
		<h3>Form Update Data Jemaat</h3>
	</div>
	<div class="card-body">
		<form id="form-update-jemaat" method="post" action="<?=site_url('jemaat/update')?>"enctype="multipart/form-data">
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="form-label">Nomor KK</label>
						<input require type="number" maxlength="16" value="<?=$jemaat->nomor_keluarga?>" class="form-control" name="nomor_keluarga">
					</div>
					<div class="form-group">
						<label class="form-label">Nama Jemaat</label>
						<input require type="text"value="<?=$jemaat->nama_jemaat?>" class="form-control" name="nama_jemaat">
					</div>
					<div class="form-group">
						<label class="form-label">Tempat Lahir</label>
						<input require type="text"value="<?=$jemaat->tempat_lahir_jemaat?>" class="form-control" name="tempat_lahir_jemaat">
					</div>
					<div class="form-group">
						<label class="form-label">Tanggal Lahir</label>
						<input require type="date"value="<?=$jemaat->tanggal_lahir_jemaat?>" class="form-control" name="tanggal_lahir_jemaat">
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="form-label">Jenis Kelamin</label>
						<select required type="text"value="<?=$jemaat->jenis_kelamin_jemaat?>" class="form-control" name="jenis_kelamin_jemaat">
							<option value="" disabled selected>-- PILIH --</option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label class="form-label">Alamat</label>
						<input require type="text"value="<?=$jemaat->alamat_jemaat?>" class="form-control" name="alamat_jemaat">
					</div>
					<div class="form-group">
						<label class="form-label">Pekerjaan</label>
						<input require type="text"value="<?=$jemaat->pekerjaan_jemaat?>" class="form-control" name="pekerjaan_jemaat">
					</div>
					<div class="form-group">
						<label class="form-label">Status</label>
						<select require value="<?=$jemaat->status_jemaat?>" class="form-control" name="status_jemaat">
							<option value="Belum Menikah">Belum Menikah</option>
							<option value="Sudah Menikah">Sudah Menikah</option>
							<option value="Janda">Janda</option>
							<option value="Duda">Duda</option>
						</select>
					</div>
					<div class="form-group">
						<label class="form-label">Foto</label>
						<input require type="file"value="<?=$jemaat->foto?>" class="form-control" name="userfile" size="20" required="">
					</div>
				</div>
			</div>
			<input type="hidden" name="nik" value="<?=$jemaat->nik?>">

	</div>
	<div class="card-footer">
		<button type="submit" id="btn-update-jemaat" class="btn btn-success btn-sm">
			<i class="fa fa-save"></i> Simpan
		</button>
		<a href="<?=site_url('jemaat')?>" class="btn btn-primary btn-sm">
			<i class="fa fa-reply"></i> Kembali
		</a>
	</div>
	</form>
</div>
</body>

</html>

<script>
	$(function(){
		$("#btn-update-jemaat").on("click", function() {
			let validate = $("#form-update-jemaat").valid()
			if (validate) {
				$("#form-update-jemaat").submit()
			}
		})
		$("#form-update-jemaat").validates({
			rules: {
				nomor_keluarga: {
					digits: true
				},
				nama_jemaat: {
					digits: true
				},
				tempat_lahir_jemaat: {
					digits: true
				},
				tanggal_lahir_jemaat: {
					digits: true
				},
				jenis_kelamin_jemaat: {
					digits: true
				},
				alamat_jemaat: {
					digits: true
				},
				pekerjaan_jemaat: {
					digits: true
				},
				status_jemaat: {
					digits: true
				},
				foto: {
					digits: true
				}
			},
			errorElement: 'span',
			errorPlacement: function(error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function(element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			}
		})
	})
</script>
