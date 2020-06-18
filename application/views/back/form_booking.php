<div class="container-fluid">
	<?php if ($this->session->flashdata('pesan')) {
		echo $this->session->flashdata('pesan');
	} ?>
	<div class="row">
		<div class="col-md-8 mx-auto">
			<form action="<?= base_url('booking/tambah_booking') ?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="">Nama Pemesan</label>
					<input type="text" name="nama" class="form-control">
					<?= form_error('nama', '<div class="text-danger small ml-2">', '</div>') ?>
				</div>
				<div class="form-group">
					<label for="">Meja</label>
					<select name="meja" id="" class="form-control">
						<option disabled selected>--- Pilih Meja ---</option>
						<?php foreach ($meja as $m) : ?>
							<?= '<option value="'. $m->id .'">'. $m->nomor_meja . " - Rp " .  number_format($m->harga, 2, ',', '.'). '</option>' ?>
						<?php endforeach ?>
					</select>
					<?= form_error('meja', '<div class="text-danger small ml-2">', '</div>') ?>
				</div>
				<div class="form-group">
					<label for="">Hari</label>
					<input class="form-control" type="date" name="hari" min="<?= date('Y-m-d') ?>">
					<?= form_error('hari', '<div class="text-danger small ml-2">', '</div>') ?>
				</div>
				<div class="form-group">
					<label for="">Telepon</label>
					<input class="form-control" type="text" name="tlp">
					<?= form_error('tlp', '<div class="text-danger small ml-2">', '</div>') ?>
				</div>		
				<div class="form-group">
					<a class="btn btn-secondary btn-sm" href="<?= base_url('booking') ?>">Kembali</a>
					<button class="btn btn-primary btn-sm" type="submit">Booking</button>
				</div>
			</div>
		</form>
	</div>
</div>
</div>