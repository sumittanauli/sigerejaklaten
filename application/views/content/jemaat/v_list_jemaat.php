<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>List Data Jemaat</title>
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
	<!-- JQuery and Javascript CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
	<script async src="https://docs.opencv.org/master/opencv.js" type="text/javascript"></script>
	<!-- JQuery Validation CDN -->
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div style="width: 1200px;" class="card">
	<div class="card-header bg-white text-dark">
		<h3 class="card-title">Data Jemaat</h3>
	</div>
	<div  class="card-body">
		<a href="<?=site_url('jemaat/tambah')?>" class="btn btn-outline-dark btn-sm mb-3">
			<i class="fa fa-plus"></i> Tambah Data Jemaat
		</a>
		<a href="<?=site_url('jemaat/print')?>" class="btn btn-outline-dark btn-sm mb-3">
			<i class="fa fa-print"></i> Print
		</a>
<!--		<a href="--><?//=site_url('jemaat/pdf')?><!--" class="btn btn-primary btn-sm mb-3">-->
<!--			<i class="fa fa-file-pdf-o"></i> Export PDF-->
<!--		</a>-->
		<table class="table table-bordered table-hover table-sm">
			<thead>
			<tr>
				<th>No</th>
				<th>NIK</th>
				<th>Nomor KK</th>
				<th>Nama</th>
				<th>Tempat Lahir</th>
				<th>Tanggal Lahir</th>
				<th>Jenis Kelamin</th>
				<th>Alamat</th>
				<th>Pekerjaan</th>
				<th>Status</th>
				<th>Foto</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			foreach ($jemaats as $j) {
				?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $j->nik ?></td>
					<td><?= $j->nomor_keluarga ?></td>
					<td><?= $j->nama_jemaat ?></td>
					<td><?= $j->tempat_lahir_jemaat ?></td>
					<td><?= $j->tanggal_lahir_jemaat ?></td>
					<td><?= $j->jenis_kelamin_jemaat ?></td>
					<td><?= $j->alamat_jemaat ?></td>
					<td><?= $j->pekerjaan_jemaat ?></td>
					<td><?= $j->status_jemaat ?></td>
					<td><img src="<?= base_url().'/foto/' . $j->foto ?>" width="100px;"></td>
					<td>
						<a href="<?=site_url("jemaat/ubah/$j->nik")?>" class="btn btn-warning btn-sm">
							<i class="fa fa-pencil"></i>
						</a>
						<a href="#" data-id="<?=$j->nik?>" class="btn btn-danger btn-sm btn-delete-jemaat">
							<i class="fa fa-trash"></i>
						</a>
					</td>
				</tr>
				<?php
			}
			?>

			</tbody>
		</table>
	</div>
</div>
<div class="modal" id="modal-confirm-delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<h4>Anda Yakin Hapus data ini?</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Tidak</button>
				<button type="button" class="btn btn-danger" id="btn-delete">Hapus</button>
			</div>
		</div>
	</div>
</div>
<form id="form-delete" method="post" action="<?= site_url('jemaat/delete') ?>">

</form>
</body>

</html>
<script>
	$(function() {
		let idJemaat = 0
		$(".btn-delete-jemaat").on("click", function() {
			idJemaat = $(this).data("id");
			console.log(idJemaat);
			$("#modal-confirm-delete").modal('show');
		});
		$("#btn-delete").on("click", function() {
			//panggil url untuk hapus data
			let inputId = $("<input>")
				.attr("type", "hidden")
				.attr("name", "id_jemaat")
				.val(idJemaat);
			let formDelete = $("#form-delete");
			formDelete.empty().append(inputId);
			formDelete.submit();
			$("#modal-confirm-delete").modal('hide');
		});
	})
</script>
