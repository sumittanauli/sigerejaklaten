<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>List Data Jemaat yang Bercerai</title>
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
		<h3>Data Jemaat Yang Cerai</h3>
	</div>
	<div class="card-body">
		<a href="<?=site_url('cerai/tambah')?>" class="btn btn-outline-dark btn-sm mb-3">
			<i class="fa fa-plus"></i> Tambah Data Jemaat Cerai
		</a>
		<a href="<?=site_url('cerai/print')?>" class="btn btn-outline-dark btn-sm mb-3">
			<i class="fa fa-print"></i> Print
		</a>
		<!--		<a href="--><?//=site_url('pindahjemaat/pdf')?><!--" class="btn btn-primary btn-sm mb-3">-->
		<!--			<i class="fa fa-file-pdf-o"></i> Export PDF-->
		<!--		</a>-->
		<table class="table table-bordered table-hover table-sm">
			<thead>
			<tr>
				<th>No</th>
				<th>Nomor Surat Cerai</th>
				<th>Nama Jemaat Pria</th>
				<th>Nama Jemaat Wanita</th>
				<th>Tanggal Cerai</th>
				<th>Tempat Cerai</th>
				<th>Alasan</th>
				<th>Foto</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			foreach ($cerais as $c) {
					$this->db->where('nik',$c->nik_istri);
					$istri = $this->db->get('jemaat')->row();
				?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $c->nomor_surat_cerai ?></td>
					<td><?= $c->nama_jemaat ?></td>
					<td><?= $istri->nama_jemaat ?></td>
					<td><?= $c->tanggal_cerai ?></td>
					<td><?= $c->tempat_cerai ?></td>
					<td><?= $c->alasan_cerai ?></td>
					<td><img src="<?= base_url().'/foto/' . $c->foto ?>" width="100px;"></td>
					<td>
						<a href="<?=site_url("cerai/ubah/$c->nik")?>" class="btn btn-warning btn-sm">
							<i class="fa fa-pencil"></i>
						</a>
						<a href="#" data-id="<?=$c->nik?>" class="btn btn-danger btn-sm btn-delete-cerai">
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
<form id="form-delete" method="post" action="<?= site_url('cerai/delete') ?>">

</form>
</body>

</html>
<script>
	$(function() {
		let idCerai = 0
		$(".btn-delete-cerai").on("click", function() {
			idCerai = $(this).data("id");
			console.log(idCerai);
			$("#modal-confirm-delete").modal('show');
		});
		$("#btn-delete").on("click", function() {
			//panggil url untuk hapus data
			let inputId = $("<input>")
				.attr("type", "hidden")
				.attr("name", "id_cerai")
				.val(idCerai);
			let formDelete = $("#form-delete");
			formDelete.empty().append(inputId);
			formDelete.submit();
			$("#modal-confirm-delete").modal('hide');
		});
	})
</script>

