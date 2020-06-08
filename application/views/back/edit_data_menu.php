<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 mx-auto">
			<h4><i class="fas fa-edit">Edit Data Menu</i></h4>

			<?php foreach ($menu as $menu) : ?>

				<form action="<?= base_url('admin/data_menu/update') ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<input type="hidden" name="id" value="<?= $menu->id ?>">
					</div>
					<div class="form-group">
						<label for="">Nama Menu</label>
						<input type="text" name="nama_menu" class="form-control" value="<?= $menu->nama_menu ?>">
					</div>
					<div class="form-group">
						<label for="">Deskripsi</label>
						<textarea name="deskripsi" class="form-control" id="" cols="30" rows="10"><?= $menu->deskripsi ?></textarea>
					</div>
					<div class="form-group">
						<label for="">Harga</label>
						<input type="text" name="harga" class="form-control" value="<?= $menu->harga ?>">
					</div>
					<div class="form-group">
						<label for="">Status</label>
						<select name="status" id="" class="form-control">
							<option value="publish">Publish</option>
							<option value="publish">Draft</option>
						</select>
					</div>
					<img style="width: 100px; height: 100px;" src="<?= base_url('assets/uploads/menu/' . $menu->gambar) ?>" alt="">
					<div class="form-group">
						<label for="">Gambar</label>
						<input type="file" name="gambar" class="form-control">
					</div>
					<div class="form-group">
						<a class="btn btn-secondary btn-sm" href="<?= base_url('admin/data_menu/index') ?>">Kembali</a>
						<button class="btn btn-primary btn-sm" type="submit">Update</button>
					</div>
				</form>
			<?php endforeach; ?>
		</div>
	</div>
</div>