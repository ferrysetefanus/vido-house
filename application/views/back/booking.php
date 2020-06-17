<div class="container-fluid">
	<div class="row">
		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-12 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Booking</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<a class="btn btn-primary btn-sm mb-3 ml-3" href="<?= base_url('booking/tambah_booking') ?>">Booking <i class="fas fa-plus fa-sm"></i></a>
	</div>
	<div class="row">
		<div class="col-xl-12 col-md-6 mb-4">
			<?php if ($this->session->flashdata('pesan')) {
				echo $this->session->flashdata('pesan');
			} ?>
			<div class="table-responsive">
				<table class="table table-hover text-center">
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Meja</th>
						<th>Harga</th>
						<th>Hari</th>
						<th>Status</th>
						<th>Aksi</th>
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
							<td><?= anchor('checkout/bayar/' . $b->id, '<div class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></div>') ?></td>
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
	</div>
</div>