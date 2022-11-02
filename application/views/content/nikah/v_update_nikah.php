<html>
<head>

	<title>Form Ubah Data Pernikahan</title>
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
		<h3>Form Update Data Pernikahan</h3>
	</div>
	<div class="card-body">
		<form id="form-update-nikah" method="post" action="<?=site_url('nikah/update')?>"enctype="multipart/form-data">
			<div class="form-group">
				<label class="form-label">Nomor Surat Nikah</label>
				<input required type="text"value="<?=$nikah->nomor_surat_nikah?>" class="form-control" name="nomor_surat_nikah">
			</div>
			<div class="form-group">
				<label class="form-label">Nama Jemaat Pria</label>
				<input required type="text" maxlength="16"value="<?=$nikah->nama_jemaat_nikah1?>" class="form-control" name="nama_jemaat_nikah1">
			</div>
			<div class="form-group">
				<label class="form-label">Nama Jemaat Wanita</label>
				<input required type="text" value="<?=$nikah->nama_jemaat_nikah2?>" class="form-control" name="nama_jemaat_nikah2">
			</div>
			<div class="form-group">
				<label class="form-label">Nama Pendeta</label>
				<input required type="text"value="<?=$nikah->nama_pendeta_nikah?>" class="form-control" name="nama_pendeta_nikah">
			</div>
			<div class="form-group">
				<label class="form-label">Tempat Menikah</label>
				<input required type="text"value="<?=$nikah->tempat_nikah?>" class="form-control" name="tempat_nikah">
			</div>
			<div class="form-group">
				<label class="form-label">Tanggal Menikah</label>
				<input required type="date"value="<?=$nikah->tanggal_nikah?>" class="form-control" name="tanggal_nikah">
			</div>
			<div class="form-group">
				<label class="form-label">Tanggal Bercerai</label>
				<input type="date"value="<?=$nikah->tanggal_cerai?>" class="form-control" name="tanggal_cerai">
			</div>
			<div class="form-group">
				<label class="form-label">Foto</label>
				<input require type="file"value="<?=$nikah->foto?>" class="form-control" name="userfile" size="20" required="">
			</div>
			<input type="hidden" name="id_nikah" value="<?=$nikah->id_nikah?>">

	</div>
	<div class="card-footer">
		<button type="submit" id="btn-update-nikah" class="btn btn-success btn-sm">
			<i class="fa fa-save"></i> Simpan
		</button>
		<a href="<?=site_url('nikah')?>" class="btn btn-primary btn-sm">
			<i class="fa fa-reply"></i> Kembali
		</a>
	</div>
	</form>
</div>
</body>

</html>

<script>
	$(function(){
		$("#btn-update-nikah").on("click", function() {
			let validate = $("#form-update-nikah").valid()
			if (validate) {
				$("#form-update-nikah").submit()
			}
		})
		$("#form-update-nikah").validates({
			rules: {
				nomor_surat_nikah: {
					digits: true
				},
				nama_pendeta_nikah: {
					digits: true
				},
				tempat_nikah: {
					digits: true
				},
				tanggal_nikah: {
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

