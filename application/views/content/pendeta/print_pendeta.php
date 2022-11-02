<html>

<body>
<div style="width: 1200px;" class="card">
	<div class="card-header bg-white text-dark">
		<h3 class="card-title">Print Data Pendeta</h3>
	</div>
	<div class="card-body">
		<table class="table table-bordered table-hover table-sm">
			<thead>
			<tr>
				<th>No</th>
				<th>Nomor Surat Pendeta</th>
				<th>Nama Pendeta</th>
				<th>Asal</th>
				<th>Pendidikan</th>
				<th>Tahun Mulai</th>
				<th>Tahun Selesai</th>
				<th>Periode</th>
				<th>Status</th>
				<th>Foto</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			foreach ($pendeta as $p) : ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $p->nomor_surat_pendeta ?></td>
				<td><?= $p->nama_pendeta ?></td>
				<td><?= $p->asal_pendeta ?></td>
				<td><?= $p->pendidikan_pendeta ?></td>
				<td><?= $p->tahun_mulai_pendeta ?></td>
				<td><?= $p->tahun_selesai_pendeta ?></td>
				<td><?= $p->periode_pendeta ?></td>
				<td><?= $p->status_pendeta ?></td>
				<td><img src="<?= base_url().'/foto/' . $p->foto ?>" width="100px;"></td>
			</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<div class="card-footer">
		<a href="<?=site_url('pendeta')?>" class="btn btn-primary btn-sm">
			<i class="fa fa-reply"></i> Kembali
		</a>
	</div>
</div>
<script type="text/javascript">
	window.print();
</script>
</body>

</html>
