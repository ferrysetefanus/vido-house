<div class="container-fluid">
	<div class="col-md-3"></div>
	<div class="col-md-6 mx-auto mt-3" align="center">
		<div class="card border-primary">
			<div class="card-header bg-primary text-white">
				<h5>Form Registrasi</h5>
			</div>
			<div class="card-body">
				<form action="<?= base_url('Registrasi/index') ?>" method="POST">
					<div class="form-group">
						<input class="form-control" type="text" name="nama" placeholder="Nama...">
						<?= form_error('nama', '<div class="text-danger small ml-2">', '</div>') ?>
					</div>
					<div class="form-group">
						<input class="form-control" type="text" name="username" placeholder="Username...">
						<?= form_error('username', '<div class="text-danger small ml-2">', '</div>') ?>
					</div>
					<div class="form-group">
						<input class="form-control" type="password" name="password" placeholder="Password...">
						<?= form_error('password', '<div class="text-danger small ml-2">', '</div>') ?>
					</div>
					<div class="form-group">
						<input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password...">
						<?= form_error('confirm_password', '<div class="text-danger small ml-2">', '</div>') ?>
					</div>
					<div class="form-group">
						<input class="form-control" type="email" name="email" placeholder="Email Valid...">
						<?= form_error('email', '<div class="text-danger small ml-2">', '</div>') ?>
					</div>
					<div class="form-group">
						<textarea class="form-control" type="text" name="alamat" placeholder="Alamat..."></textarea>
						<?= form_error('alamat', '<div class="text-danger small ml-2">', '</div>') ?>
					</div>
					<div class="form-group">
						<select class="form-control" name="jenis_kelamin"><option disabled selected>--- Jenis kelamin ---</option><option value="Laki - laki">Laki - laki</option><option value="Perempuan">Perempuan</option></select>
						<?= form_error('jenis_kelamin', '<div class="text-danger small ml-2">', '</div>') ?>
					</div>
					<div class="form-group">
						<input type="text" name="nomor_hp" class="form-control" placeholder="nomor hp">
						<?= form_error('nomor_hp', '<div class="text-danger small ml-2">', '</div>') ?>
					</div>
					<div class="form-group float-right">
						<a class="btn btn-secondary" href="<?= base_url('Auth/login') ?>">Kembali</a>
						<button type="submit" class="btn btn-success">Daftar</button>
					</div>
				</form>			
			</div>
		</div>
	</div>
	<div class="col-md-3"></div>
</div>