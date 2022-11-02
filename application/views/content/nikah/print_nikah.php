<html>

<body>
<div style="width: 1200px;" class="card">
	<div class="card-header bg-white text-dark">
		<h3 class="card-title">Print Data Pernikahan</h3>
	</div>
	<div class="card-body">
		<table class="table table-bordered table-hover table-sm">
			<thead>
			<tr>
				<th>No</th>
				<th>Nomor Surat Pernikahan</th>
				<th>Nama Jemaat Pria</th>
				<th>Nama Jemaat Wanita</th>
				<th>Nama Pendeta</th>
				<th>Tempat Menikah</th>
				<th>Tanggal Menikah</th>
				<th>Tanggal Bercerai</th>
				<th>Foto</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			foreach ($nikah as $n) : ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $n->nomor_surat_nikah ?></td>
				<td><?= $n->nama_jemaat_nikah1 ?></td>
				<td><?= $n->nama_jemaat_nikah2 ?></td>
				<td><?= $n->nama_pendeta_nikah ?></td>
				<td><?= $n->tempat_nikah ?></td>
				<td><?= $n->tanggal_nikah ?></td>
				<td><?= $n->tanggal_cerai ?></td>
				<td><img src="<?= base_url().'/foto/' . $n->foto ?>" width="100px;"></td>
			</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<div class="card-footer">
		<a href="<?=site_url('nikah')?>" class="btn btn-primary btn-sm">
			<i class="fa fa-reply"></i> Kembali
		</a>
	</div>
</div>
<script type="text/javascript">
	window.print();
</script>
</body>

</html>
