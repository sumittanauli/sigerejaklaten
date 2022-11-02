<html>

<body>
<div style="width: 1200px;" class="card">
	<div class="card-header bg-white text-dark">
		<h3 class="card-title">Print Data Pindah Jemaat</h3>
	</div>
	<div class="card-body">
		<table class="table table-bordered table-hover table-sm">
			<thead>
			<tr>
				<th>No</th>
				<th>Nama Jemaat</th>
				<th>Asal Gereja</th>
				<th>Tujuan Gereja</th>
				<th>Tahun Masuk</th>
				<th>Tahun Keluar</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			foreach ($pindahjemaat as $t) : ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $t->nama_pindah_jemaat ?></td>
				<td><?= $t->asal_gereja ?></td>
				<td><?= $t->tujuan_gereja ?></td>
				<td><?= $t->tahun_masuk ?></td>
				<td><?= $t->tahun_keluar ?></td>
			</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<div class="card-footer">
		<a href="<?=site_url('pindahjemaat')?>" class="btn btn-primary btn-sm">
			<i class="fa fa-reply"></i> Kembali
		</a>
	</div>
</div>
<script type="text/javascript">
	window.print();
</script>
</body>

</html>
