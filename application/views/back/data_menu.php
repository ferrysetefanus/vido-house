<div class="container-fluid">
	<?php if ($this->session->flashdata('pesan')) {
		echo $this->session->flashdata('pesan');
	} ?>
	<a class="btn btn-primary btn-sm mb-3" href="<?= base_url('admin/data_menu/tambah_menu') ?>">Tambah Menu</a>
	<div class="table-responsive">
		<table class="table table-hover text-center">
			<tr>
				<th>No</th>
				<th>Nama Menu</th>
				<th>Deskripsi</th>
				<th>Harga</th>
				<th>Gambar</th>
				<th>Status</th>
				<th>Created At</th>
				<th colspan="2">Aksi</th>
			</tr>
			<?php $no = 1; ?>
			<?php foreach ($menu as $menu) : ?>
				<tr>
				<td><?= $no++ ?></td>
				<td><?= $menu->nama_menu ?></td>
				<td><?= $menu->deskripsi ?></td>
				<td><?= "Rp. " . number_format($menu->harga, 2, ',', '.') ?></td>
				<td><img style="width: 100px; height: 100px;" src="<?= base_url('assets/uploads/menu/' . $menu->gambar) ?>" alt=""></td>
				<td><?= $menu->status ?></td>
				<td><?= $menu->created_at ?></td>
				<td><?= anchor('admin/data_menu/edit/' . $menu->id, '<div class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></div>') ?></td>
				<td><?= anchor('admin/data_menu/delete/' . $menu->id, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>', ['onclick' => "return confirm('Apakah yakin ingin menghapus data ini?')"]) ?></td>
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
