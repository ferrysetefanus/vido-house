<div class="container-fluid">
	<?php if ($this->session->flashdata('pesan')) {
		echo $this->session->flashdata('pesan');
	} ?>
	<div class="table-responsive">
		<table class="table table-hover text-center">
			<tr>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Meja</th>
					<th>Harga</th>
					<th>Hari</th>
					<th>Status</th>
					<th colspan="3">Aksi</th>
				</tr>
			</tr>
			<?php $no = 1; ?>
			<?php foreach ($booking as $b) : ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $b->nama ?></td>
					<td><?= $b->nomor_meja ?></td>
					<td><?= "Rp " . number_format( $b->harga, 2, ',', '.') ?></td>
					<td><?= $b->hari ?></td>
					<td><?= $b->status ?></td>
					<td><?= anchor('admin/data_booking/tampil_bayar/' . $b->id, '<div class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></div>') ?></td>
					<td><?= anchor('admin/data_booking/edit/' . $b->id, '<div class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></div>') ?></td>
					<td><?= anchor('admin/data_booking/hapus/' . $b->id, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?></td>
				</tr>
			<?php endforeach; ?>			
		</table>
		<div class="row">
			<div class="col">
				<?= $pagination ?>
			</div>
		</div>
	</div>
</div>
