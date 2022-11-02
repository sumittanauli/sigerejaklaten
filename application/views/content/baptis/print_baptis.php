<html>

<body>
	<div style="width: 1200px;" class="card">
		<div class="card-header bg-white text-dark">
			<h3 class="card-title">Print Data Baptis</h3>
		</div>
		<div class="card-body">
		<table class="table table-bordered table-hover table-sm">
			<thead>
				<tr>
					<th>No</th>
					<th>Nomor Surat Baptis</th>
					<th>Nama Jemaat</th>
					<th>Nama Pendeta</th>
					<th>Tempat Baptis</th>
					<th>Tanggal Baptis</th>
					<th>Foto</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			foreach ($baptis as $b) : ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $b->nomor_surat_baptis ?></td>
					<td><?= $b->nik ?></td>
					<td><?= $b->nama_pendeta_baptis ?></td>
					<td><?= $b->tempat_baptis ?></td>
					<td><?= $b->tanggal_baptis ?></td>
					<td><img src="<?= base_url().'/foto/' . $b->foto ?>" width="100px;"></td>
				</tr>
					<?php endforeach ?>
				</tbody>
		</table>
		</div>
		<div class="card-footer">
			<a href="<?=site_url('baptis')?>" class="btn btn-primary btn-sm">
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
