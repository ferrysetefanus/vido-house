<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 mx-auto">
			<h4><i class="fas fa-edit">Edit Status Booking</i></h4>

			<?php foreach ($booking as $b) : ?>

				<form action="<?= base_url('admin/data_booking/update') ?>" method="POST">
					<div class="form-group">
						<input type="hidden" name="id" class="form-control" value="<?= $b->id ?>">
					</div>
					<div class="form-group">
						<label for="">Status</label>
						<select name="status" id="" class="form-control">
							<option value="" disabled selected>--- Pilih Status ---</option>
							<option value="Sudah Dibayar">Sudah Dibayar</option>
							<option value="Belum Dibayar">Belum Dibayar</option>
							<option value="Batal">Batal</option>
						</select>
					</div>						
					<div class="form-group">
						<a class="btn btn-secondary btn-sm" href="<?= base_url('data_booking') ?>">Kembali</a>
						<button class="btn btn-primary btn-sm" type="submit">Ubah</button>
					</div>
				</form>
			<?php endforeach; ?>
		</div>
	</div>
</div>