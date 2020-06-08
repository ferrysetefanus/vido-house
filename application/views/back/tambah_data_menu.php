<div class="container-fluid">
	<?php if ($this->session->flashdata('pesan')) {
		echo $this->session->flashdata('pesan');
	} ?>
	<div class="row">
		<div class="col-md-8 mx-auto">
			<form action="<?= base_url('admin/data_menu/tambah_menu_action') ?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="">Nama Produk</label>
					<input type="text" name="nama_menu" class="form-control">
				</div>
				<div class="form-group">
					<label for="">Deskripsi</label>
					<textarea name="deskripsi" class="form-control" cols="30" rows="10"></textarea>
				</div>
				<div class="form-group">
					<label for="">Harga</label>
					<input type="text" name="harga" class="form-control">
				</div>		
				<div class="form-group">
					<label for="">Status</label>
					<select name="status" id="" class="form-control">
						<option value="publish">Publish</option>
						<option value="publish">Draft</option>
					</select>
				</div>
				<div class="form-group">
					<label for="">Gambar</label>
					<input type="file" name="gambar" class="form-control">
				</div>
				<div class="form-group">
					<a class="btn btn-secondary btn-sm" href="<?= base_url('admin/data_menu/index') ?>">Kembali</a>
					<button class="btn btn-primary btn-sm" type="submit">Tambah</button>
				</div>
			</div>
		</form>
	</div>
</div>
</div>