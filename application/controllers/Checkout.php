<?php  

class Checkout extends CI_Controller {

	public function __construct() {

		parent::__construct();
		if ($this->session->userdata('role') != 'user') {
			redirect('home');
		}	
	}

	public function bayar($id_booking) {
		if ($this->model_checkout->cek_batal($id_booking) == TRUE) {

			$this->session->set_flashdata('pesan', "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Booking ini telah dibatalkan<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
				</button>
				</div>");
			redirect('booking/index');
		} else if ($this->model_checkout->cek_bayar($id_booking) == TRUE) {

			$this->session->set_flashdata('pesan', "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Anda sudah melakukan pembayaran pada booking ini, silahkan tunggu pengecekan dari admin<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
				</button>
				</div>");
			redirect('booking/index');
		} else {

		$this->form_validation->set_rules('nama_rekening', 'Nama Akun', 'trim|required', ['required' => 'Wajib diisi!']);
		$this->form_validation->set_rules('nomor_rekening', 'Nomor Rekening', 'trim|required', ['required' => 'Wajib diisi!']);
		$this->form_validation->set_rules('nominal', 'Nominal', 'trim|required', ['required' => 'Wajib diisi!']);
		$this->form_validation->set_rules('catatan', 'Catatan', 'trim');

		if ($this->form_validation->run() == FALSE) {
			
			$data['title'] = 'Halaman Checkout';
			$this->load->view('back/header', $data);
			$this->load->view('back/sidebar_user');
			$this->load->view('back/form_checkout');
			$this->load->view('back/footer');

		} else {

				$id_booking = $this->input->post(htmlspecialchars('id_booking'), TRUE);
				$nama_rekening = $this->input->post(htmlspecialchars('nama_rekening'), TRUE);
				$nomor_rekening = $this->input->post(htmlspecialchars('nomor_rekening'), TRUE);
				$nominal = $this->input->post(htmlspecialchars('nominal'), TRUE);
				$catatan = $this->input->post(htmlspecialchars('catatan'), TRUE);
				$gambar = $_FILES['gambar']['name'];

				if ($gambar = "") {

				} else {

					$config['upload_path'] = './assets/uploads/pembayaran';
					$config['allowed_types'] = 'jpg|jpeg|png|gif';
					$config['max_size'] = 2000;
					$config['overwrite'] = TRUE;

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('gambar')) {
						$this->session->set_flashdata('pesan', "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Gambar gagal diupload<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
							</button>
							</div>");
						redirect('checkout/index');
					} else {

						$gambar = $this->upload->data('file_name');
					}
				}

				$data = [

					'id_booking' => $id_booking,
					'nama_rekening' => $nama_rekening,
					'nomor_rekening' => $nomor_rekening,
					'nominal' => $nominal,
					'catatan' => $catatan,
					'gambar' => $gambar
				];

				$this->model_checkout->bayar('checkout', $data);

				$this->session->set_flashdata('pesan', "<div class='alert alert-success alert-dismissible fade show' role='alert'>Checkout berhasil, silahkan tunggu konfirmasi dari admin<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
					</button>
					</div>");

				redirect('booking/index');
			}
		}
	}
}

?>