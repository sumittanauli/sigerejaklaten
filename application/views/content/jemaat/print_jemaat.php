<html>

<body>
<div style="width: 1200px;" class="card">
	<div class="card-header bg-white text-dark">
		<h3 class="card-title">Print Data Jemaat</h3>
	</div>
	<div class="card-body">
		<table class="table table-bordered table-hover table-sm">
			<thead>
			<tr>
				<th>No</th>
				<th>NIK</th>
				<th>Nomor Keluarga</th>
				<th>Nama Jemaat</th>
				<th>Tempat Lahir</th>
				<th>Tanggal Lahir</th>
				<th>Jenis Kelamin</th>
				<th>Alamat</th>
				<th>Pekerjaan</th>
				<th>Status</th>
				<th>Foto</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			foreach ($jemaat as $j) : ?>
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
			</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<div class="card-footer">
		<a href="<?=site_url('jemaat')?>" class="btn btn-primary btn-sm">
			<i class="fa fa-reply"></i> Kembali
		</a>
	</div>
</div>
<script type="text/javascript">
	window.print();
</script>
</body>

</html>
