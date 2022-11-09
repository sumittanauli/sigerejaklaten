<html>
<head>

	<title>Form Ubah Data Pengurus</title>
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
		<h3>Form Update Data Pengurus</h3>
	</div>
	<div class="card-body">
		<form id="form-update-pengurus" method="post" action="<?=site_url('pengurus/update')?>"enctype="multipart/form-data">
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="form-label">Nomor Surat Pengurus</label>
						<input required type="number"value="<?=$pengurus->nomor_surat_pengurus?>" class="form-control" name="nomor_surat_pengurus">
					</div>
					<div class="form-group">
						<label class="form-label">Asal</label>
						<input required type="text"value="<?=$pengurus->asal_pengurus?>" class="form-control" name="asal_pengurus">
					</div>
					<div class="form-group">
						<label class="form-label">Pendidikan</label>
						<select required type="text"value="<?=$pengurus->pendidikan_pengurus?>" class="form-control" name="pendidikan_pengurus">
							<option value="Tidak Sekolah">Tidak Sekolah</option>
							<option value="SD">SD</option>
							<option value="SMP">SMP</option>
							<option value="SLTA">SLTA</option>
							<option value="SLTU">SLTU</option>
							<option value="D1">D1</option>
							<option value="D2">D2</option>
							<option value="D3">D3</option>
							<option value="S1">S1</option>
							<option value="S2">S2</option>
							<option value="S3">S3</option>
							<option value="Dll">Dan Lain Lain</option>
						</select>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="form-label">Tanggal Mulai</label>
						<input required type="date"value="<?=$pengurus->tanggal_mulai_pengurus?>" class="form-control" name="tanggal_mulai_pengurus">
					</div>
					<div class="form-group">
						<label class="form-label">Tanggal Selesai</label>
						<input required type="date"value="<?=$pengurus->tanggal_selesai_pengurus?>" class="form-control" name="tanggal_selesai_pengurus">
					</div>
					<div class="form-group">
						<label class="form-label">Status Pengurus</label>
						<select required value="<?=$pengurus->status_pengurus?>" class="form-control" name="status_pengurus">
							<option value="Tidak Aktif">Tidak Aktif</option>
							<option value="Aktif">Aktif</option>
						</select>
					</div>
					<div class="form-group">
						<label class="form-label">Foto</label>
						<input require type="file"value="<?=$pengurus->foto?>" class="form-control" name="userfile" size="20" required="">
					</div>
				</div>
			</div>
			<input type="hidden" name="nik" value="<?=$pengurus->nik?>">

	</div>
	<div class="card-footer">
		<button type="submit" id="btn-update-pengurus" class="btn btn-success btn-sm">
			<i class="fa fa-save"></i> Simpan
		</button>
		<a href="<?=site_url('pengurus')?>" class="btn btn-primary btn-sm">
			<i class="fa fa-reply"></i> Kembali
		</a>
	</div>
	</form>
</div>
</body>

</html>

<script>
	$(function(){
		$("#btn-update-pengurus").on("click", function() {
			let validate = $("#form-update-pengurus").valid()
			if (validate) {
				$("#form-update-pengurus").submit()
			}
		})
		$("#form-update-pengurus").validates({
			rules: {
				nomor_surat_pengurus: {
					digits: true
				},
				nama_pengurus: {
					digits: true
				},
				tanggal_mulai_pengurus: {
					digits: true
				},
				tanggal_selesai_pengurus: {
					digits: true
				},
				status_pengurus: {
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
