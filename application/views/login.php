<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">   
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Form Login</h1>
                  </div>
                  <form method="post" action="<?= base_url('auth/login') ?>" class="user">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username...">
                      <?= form_error('username', '<div class="text-danger small ml-2">', '</div>') ?>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                      <?= form_error('password', '<div class="text-danger small ml-2">', '</div>') ?>
                    </div>
                    <button type="submit" class="btn btn-primary form-control">Login</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a href="#exampleModal" data-toggle="modal" data-target="#exampleModal">Belum punya akun? Daftar!</a><br>
                    <a class="small" href="<?= base_url('home') ?>">Kembali ke Homepage</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Registrasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <form action="">
              <div class="form-group">
                <input class="form-control" type="text" name="nama" placeholder="Nama...">
                <?= form_error('nama', '<div class="text-danger small ml-2">', '</div>') ?>
              </div>
              <div class="form-group">
                <input class="form-control" type="text" name="username" placeholder="Username...">
                <?= form_error('Username', '<div class="text-danger small ml-2">', '</div>') ?>
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
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-primary">Daftar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  
