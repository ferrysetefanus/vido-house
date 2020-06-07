<?php  

class Data_menu extends CI_Controller {

	public function index() {

		$data['title'] = "Admin : Data Menu";
		$data['menu'] = $this->model_menu->tampil_data();
		$this->load->view('back/header', $data);
		$this->load->view('back/sidebar');
		$this->load->view('back/data_menu');
		$this->load->view('back/footer');
	}

	public function tambah_menu_action() {

		$this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required|is_unique[menu.nama_menu]|trim|min_length[4]', ['required' => 'Nama menu wajib diisi!', 'is_unique' => 'Nama menu sudah ada!']);

		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim|min_length[10]', ['required' => 'Deskripsi menu wajib diisi!']);

		$this->form_validation->set_rules('harga', 'Harga', 'required|trim', ['required' => 'Harga wajib menu wajib diisi!']);

		$this->form_validation->set_rules('status', 'Status', 'required|trim', ['required' => 'Status menu wajib diisi!']);

		if ($this->form_validation->run() == FALSE) {
			
			$data['title'] = "Admin : Tambah Data Menu";
			$data['menu'] = $this->model_menu->tampil_data();
			$this->load->view('back/header', $data);
			$this->load->view('back/sidebar');
			$this->load->view('admin/data_menu');
			$this->load->view('back/footer');
		} else {
			$nama_menu = $this->input->post(htmlspecialchars("nama_menu"));
			$harga = $this->input->post(htmlspecialchars("harga"));
			$gambar = $_FILES['gambar']['name'];
			$status = $this->input->post(htmlspecialchars("status"));


			if ($gambar = "") {

			} else {

				$config['upload_path'] = './assets/uploads/menu'
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['max_size'] = 2000;
				$config['overwrite'] = TRUE;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('gambar')) {
					$this->session->set_flashdata('pesan', "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Gambar gagal diupload<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						<span aria-hidden='true'>&times;</span>
						</button>
						</div>");
					redirect('admin/data_menu');
				} else {

					$gambar = $this->upload->data('file_name');
				}
			}

			$data = [

				'nama_menu' => $nama_menu,
				'harga'		=> $harga,
				'gambar'	=> $gambar,
				'status'	=> $status
			];

			$this->model_barang->tambah_menu('menu', $data);

			$this->session->set_flashdata('pesan', "<div class='alert alert-success alert-dismissible fade show' role='alert'>Data menu berhasil ditambahkan<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
				</button>
				</div>");

			redirect('admin/data_menu');
		}
	}

	public function edit($id) {

		$id_menu = ['id' => $id];
		$data['title'] = 'Admin : Edit Menu';
		$data['menu'] = $this->model_menu->edit_barang('menu', $id_menu);
		$this->load->view('back/header', $data);
		$this->load->view('back/sidebar');
		$this->load->view('back/edit_data_menu');
		$this->load->view('back/footer');
	}

	public function update() {

		$this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required|is_unique[menu.nama_menu]|trim|min_length[4]', ['required' => 'Nama menu wajib diisi!', 'is_unique' => 'Nama menu sudah ada!']);

		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim|min_length[10]', ['required' => 'Deskripsi menu wajib diisi!']);

		$this->form_validation->set_rules('harga', 'Harga', 'required|trim', ['required' => 'Harga wajib menu wajib diisi!']);

		$this->form_validation->set_rules('status', 'Status', 'required|trim', ['required' => 'Status menu wajib diisi!']);

		if ($this->form_validation->run() == FALSE) {
			$id_menu = $this->input->post(htmlspecialchars('id'));
			$data['title'] = 'Admin : Edit Menu';
			$data['menu'] = $this->model_menu->edit_barang('menu', $id_menu);
			$this->load->view('back/header', $data);
			$this->load->view('back/sidebar');
			$this->load->view('back/edit_data_menu');
			$this->load->view('back/footer');
		} else {

			$id_menu = $this->input->post(htmlspecialchars('id'));
			$nama_menu = $this->input->post(htmlspecialchars('nama_menu'));
			$deskripsi = $this->input->post(htmlspecialchars('deskripsi'));
			$harga = $this->input->post(htmlspecialchars('harga'));
			$status = $this->input->post(htmlspecialchars('nama_menu'));
			$gambar = $_FILES['gambar']['name'];

			if (!$gambar) {

				$data = [

					'nama_menu' => $nama_menu,
					'deskripsi' => $deskripsi,
					'harga'		=> $harga,
					'status'	=> $status
				];
				
				$this->model_menu->update('menu', $id_menu, $data);
				$this->session->set_flashdata('pesan', "<div class='alert alert-success alert-dismissible fade show' role='alert'>Data menu berhasil diupdate<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
					</button>
					</div>");
				redirect('admin/data_menu');

			} else {

				$config['upload_path'] = './assets/uploads/menu'
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['max_size'] = 2000;
				$config['overwrite'] = TRUE;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('gambar')) {
					$this->session->set_flashdata('pesan', "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Gambar gagal diupload<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						<span aria-hidden='true'>&times;</span>
						</button>
						</div>");
					redirect('admin/edit_data_menu');
				} else {

					$item = $this->model_menu->ambil_nama_gambar($id_menu);

					if ($item->gambar != null) {
						$target = './assets/upload/menu' . $item->gambar;
						unlink($target);
					}

					$gambar = $this->upload->data('file_name');
				}
			}
			$data = [

				'nama_menu' => $nama_menu,
				'deskripsi' => $deskripsi,
				'harga'		=> $harga,
				'status'	=> $status,
				'gambar' 	=> $gambar
			];

			$this->model_menu->('menu', $id_menu, $data);
			$this->session->set_flashdata('pesan', "<div class='alert alert-success alert-dismissible fade show' role='alert'>Data menu berhasil diupdate<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
				</button>
				</div>");
			redirect('admin/data_menu');
		}		
	}

	public function delete($id) {

		$id_menu = ['id' => $id];

		$item = $this->model_menu->ambil_nama_gambar($id_menu);

		if ($item->gambar != null) {
			$target = './assets/uploads/menu' . $item->gambarl;
			unlink($target);
		}

		$this->model_menu->hapus_data('menu', $id_menu);
		$this->session->set_flashdata('pesan', "<div class='alert alert-success alert-dismissible fade show' role='alert'>Data menu berhasil dihapus<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
			</button>
			</div>");
		redirect('admin/data_menu/index');
	}
}


?>