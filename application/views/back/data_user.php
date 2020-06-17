<div class="container-fluid">
	<div class="table-responsive">
		<table class="table table-hover text-center">
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Username</th>
				<th>Email</th>
				<th>Alamat</th>
				<th>Jenis Kelamin</th>
				<th>Nomor HP</th>
				<th>Status</th>
				<th>Role</th>
				<th>Created At</th>
				<th colspan="2">Aksi</th>
			</tr>
			<?php $no = 1; ?>
			<?php foreach ($users as $user) : ?>
				<tr>
				<td><?= $no++ ?></td>
				<td><?= $user->nama ?></td>
				<td><?= $user->username ?></td>
				<td><?= $user->email ?></td>
				<td><?= $user->alamat ?></td>
				<td><?= $user->jenis_kelamin ?></td>
				<td><?= $user->nomor_hp ?></td>
				<td><?= $user->status ?></td>
				<td><?= $user->role ?></td>
				<td><?= $user->created_at ?></td>
				<td><?= anchor('admin/data_user/edit/' . $user->id, '<div class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></div>') ?></td>
				<td><?= anchor('admin/data_user/hapus/' . $user->id, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>', ['onclick' => "return confirm('Apakah yakin ingin menghapus data ini?')"]) ?></td>
				</tr>
			<?php endforeach; ?>			
		</table>
	</div>
</div>