<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 mx-auto">
			<?php if (!$bayar) {
				echo "Belum ada Pembayaran";
				echo anchor('admin/data_booking', 'Kembali');
			} else { ?>
				<?php foreach ($bayar as $bayar) :  ?>
					<div class="card">
						<img src="<?= base_url('assets/uploads/pembayaran/' . $bayar->gambar) ?>" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">Pemilik Rekening : <?= $bayar->nama_rekening ?></h5>
							<h5 class="card-title">Nomor Rekening : <?= $bayar->nomor_rekening ?></h5>
							<h5 class="card-title">Jumlah pembayaran : <?= "Rp ". number_format($bayar->nominal, 2, ',', '.') ?></h5>
							<h5 class="card-title">Catatan : <?= $bayar->catatan ?></h5>
							<a href="<?= base_url('admin/data_booking') ?>" class="btn btn-secondary">Kembali</a>
						</div>
					</div>
				<?php endforeach; ?>
				<?php
			} ?>
		</div>
	</div>
</div>