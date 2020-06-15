<?php  

class Data_menu extends CI_Controller {

	public function __construct() {

		if ($this->session->userdata('role') != 'admin') {
					redirect('');
				}		
	}

	public function index() {

		$config['base_url'] = base_url('admin/data_menu/index');
		$config['total_rows'] = $this->model_menu->get_all_menu(); 
		$config['per_page'] = 5;
		$config['uri_segment'] = 4;
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] = floor($choice);

		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav></div>';
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '</span></li>';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close'] = '<span aria-hidden="true">&raquo</span></span></li>';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close'] = '</span>Next</li>';
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close'] = '</span></li>';


		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$data['title'] = "Admin : Data Menu";
		$data['menu'] = $this->model_menu->tampil_data($config['per_page'], $data['page']);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('back/header', $data);
		$this->load->view('back/sidebar');
		$this->load->view('back/data_menu');
		$this->load->view('back/footer');
	}

	public function tambah_menu() {

		$data['title'] = "Admin : Tambah Data Menu";
		$this->load->view('back/header', $data);
		$this->load->view('back/sidebar');
		$this->load->view('back/tambah_data_menu');
		$this->load->view('back/footer');

	}

	public function tambah_menu_action() {

		$nama_menu = $this->input->post(htmlspecialchars("nama_menu"));
		$deskripsi = $this->input->post(htmlspecialchars("deskripsi"));
		$harga = $this->input->post(htmlspecialchars("harga"));
		$gambar = $_FILES['gambar']['name'];
		$status = $this->input->post(htmlspecialchars("status"));


		if ($gambar = "") {

		} else {

			$config['upload_path'] = './assets/uploads/menu';
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
			'deskripsi' => $deskripsi,
			'harga'		=> $harga,
			'gambar'	=> $gambar,
			'status'	=> $status
		];

		$this->model_menu->tambah_menu('menu', $data);

		$this->session->set_flashdata('pesan', "<div class='alert alert-success alert-dismissible fade show' role='alert'>Data menu berhasil ditambahkan<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
			</button>
			</div>");

		redirect('admin/data_menu');
		
	}

	public function edit($id) {

		$id_menu = ['id' => $id];
		$data['title'] = 'Admin : Edit Menu';
		$data['menu'] = $this->model_menu->edit_menu('menu', $id_menu);
		$this->load->view('back/header', $data);
		$this->load->view('back/sidebar');
		$this->load->view('back/edit_data_menu');
		$this->load->view('back/footer');
	}

	public function update() {

		$id = $this->input->post(htmlspecialchars('id'));
		$nama_menu = $this->input->post(htmlspecialchars('nama_menu'));
		$deskripsi = $this->input->post(htmlspecialchars('deskripsi'));
		$harga = $this->input->post(htmlspecialchars('harga'));
		$status = $this->input->post(htmlspecialchars('status'));
		$gambar = $_FILES['gambar']['name'];

		if (empty($gambar)) {

			$data = [

				'nama_menu' => $nama_menu,
				'deskripsi' => $deskripsi,
				'harga'		=> $harga,
				'status'	=> $status
			];

			$id_menu = ['id' => $id];
			$this->model_menu->update('menu', $id_menu, $data);
			$this->session->set_flashdata('pesan', "<div class='alert alert-success alert-dismissible fade show' role='alert'>Data menu berhasil diupdate!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
				</button>
				</div>");
			redirect('admin/data_menu');

		} else {

			$config['upload_path'] = './assets/uploads/menu/';
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

				$id_menu = ['id' => $id];
				$item = $this->model_menu->ambil_nama_gambar($id_menu);

				if ($item != null) {
					$target = './assets/uploads/menu/' . $item;
					unlink($target);
				}

				$gambar = $this->upload->data('file_name');
			}

			$data = [

				'nama_menu' => $nama_menu,
				'deskripsi' => $deskripsi,
				'harga'		=> $harga,
				'status'	=> $status,
				'gambar' 	=> $gambar
			];

			$id_menu = ['id' => $id];
			$this->model_menu->update('menu', $id_menu, $data);
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

		if ($item != null) {
			$target = './assets/uploads/menu/' . $item;
			unlink($target);
		}

		$this->model_menu->delete('menu', $id_menu);
		$this->session->set_flashdata('pesan', "<div class='alert alert-success alert-dismissible fade show' role='alert'>Data menu berhasil dihapus<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
			</button>
			</div>");
		redirect('admin/data_menu/index');
	}
}


?>