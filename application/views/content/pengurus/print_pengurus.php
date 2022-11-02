<html>

<body>
<div style="width: 1200px;" class="card">
	<div class="card-header bg-white text-dark">
		<h3 class="card-title">Print Data Pengurus</h3>
	</div>
	<div class="card-body">
		<table class="table table-bordered table-hover table-sm">
			<thead>
			<tr>
				<th>No</th>
				<th>Nomor Surat Pengurus</th>
				<th>Nama Pengurus</th>
				<th>Tanggal Mulai</th>
				<th>Tanggal Selesai</th>
				<th>Status Pengurus</th>
				<th>Foto</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			foreach ($pengurus as $p) : ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $p->nomor_surat_pengurus ?></td>
				<td><?= $p->nama_pengurus ?></td>
				<td><?= $p->tanggal_mulai_pengurus ?></td>
				<td><?= $p->tanggal_selesai_pengurus?></td>
				<td><?= $p->status_pengurus ?></td>
				<td><img src="<?= base_url().'/foto/' . $p->foto ?>" width="100px;"></td>
			</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<div class="card-footer">
		<a href="<?=site_url('pengurus')?>" class="btn btn-primary btn-sm">
			<i class="fa fa-reply"></i> Kembali
		</a>
	</div>
</div>
<script type="text/javascript">
	window.print();
</script>
</body>

</html>
