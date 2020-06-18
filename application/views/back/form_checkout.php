<div class="container-fluid">
	<?php if ($this->session->flashdata('pesan')) {
		echo $this->session->flashdata('pesan');
	} ?>
	<div class="row">
		<div class="col-md-8 mx-auto">
			
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 mx-auto">
			<div class='alert alert-primary alert-dismissible fade show' role='alert'>Diharapkan transfer sesuai dengan nominal harga meja yang dibooking ke nomor rekening BCA 171103248 a/n Ferry Setefanus<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
			</button>
		</div>
		<form action="<?= base_url('checkout/bayar/' . $this->uri->segment(3)) ?>" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<input type="hidden" name="id_booking" value="<?= $this->uri->segment(3) ?>">
			</div>
			<div class="form-group">
				<label for="">Pemilik Rekening</label>
				<input type="text" name="nama_rekening" class="form-control">
				<?= form_error('nama_rekening', '<div class="text-danger small ml-2">', '</div>') ?>
			</div>
			<div class="form-group">
				<label for="">Nomor Rekening</label>
				<input class="form-control" type="text" name="nomor_rekening">
				<?= form_error('nomor_rekening', '<div class="text-danger small ml-2">', '</div>') ?>
			</div>
			<div class="form-group">
				<label for="">Nominal</label>
				<input class="form-control" type="number" name="nominal">
				<?= form_error('nominal', '<div class="text-danger small ml-2">', '</div>') ?>
			</div>
			<div class="form-group">
				<label for="">Catatan</label>
				<input class="form-control" type="text" name="catatan">
				<?= form_error('catatan', '<div class="text-danger small ml-2">', '</div>') ?>
			</div>
			<div class="form-group">
				<label for="">Bukti Pembayaran</label>
				<input class="form-control" type="file" name="gambar" required>
			</div>		
			<div class="form-group">
				<a class="btn btn-secondary btn-sm" href="<?= base_url('booking') ?>">Kembali</a>
				<button class="btn btn-primary btn-sm" type="submit">Bayar</button>
			</div>
		</form>
	</div>
</div>
</div>