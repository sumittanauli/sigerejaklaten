<html>

<body>
<div style="width: 1200px;" class="card">
	<div class="card-header bg-white text-dark">
		<h3 class="card-title">Print Data Kematian</h3>
	</div>
	<div class="card-body">
		<table class="table table-bordered table-hover table-sm">
			<thead>
			<tr>
				<th>No</th>
				<th>Nomor Surat Mati</th>
				<th>Nama Jemaat</th>
				<th>Tanggal Mati</th>
				<th>Tempat Mati</th>
				<th>Alasan</th>
				<th>Foto</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			foreach ($mati as $m) : ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $m->nomor_surat_mati ?></td>
					<td><?= $m->nama_jemaat_mati ?></td>
					<td><?= $m->tanggal_mati ?></td>
					<td><?= $m->tempat_mati ?></td>
					<td><?= $m->alasan_mati ?></td>
					<td><img src="<?= base_url().'/foto/' . $m->foto ?>" width="100px;"></td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<div class="card-footer">
		<a href="<?=site_url('mati')?>" class="btn btn-primary btn-sm">
			<i class="fa fa-reply"></i> Kembali
		</a>
	</div>
</div>
<script type="text/javascript">
	window.print();
</script>
</body>

</html>
