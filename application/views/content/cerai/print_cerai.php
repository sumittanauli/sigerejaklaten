<html>

<body>
<div style="width: 1200px;" class="card">
	<div class="card-header bg-white text-dark">
		<h3 class="card-title">Print Data Perceraian</h3>
	</div>
	<div class="card-body">
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
			foreach ($cerai as $c) : ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $c->nomor_surat_cerai ?></td>
				<td><?= $c->nama_jemaat_cerai1 ?></td>
				<td><?= $c->nama_jemaat_cerai2 ?></td>
				<td><?= $c->tanggal_cerai ?></td>
				<td><?= $c->tempat_cerai ?></td>
				<td><?= $c->alasan_cerai ?></td>
				<td><img src="<?= base_url().'/foto/' . $c->foto ?>" width="100px;"></td>
			</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<div class="card-footer">
		<a href="<?=site_url('cerai')?>" class="btn btn-primary btn-sm">
			<i class="fa fa-reply"></i> Kembali
		</a>
	</div>
</div>
<script type="text/javascript">
	window.print();
</script>
</body>

</html>
<!--<script type="text/javascript">-->
<!--	window.print();-->
<!--</script>-->
