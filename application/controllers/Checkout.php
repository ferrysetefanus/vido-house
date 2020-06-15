<?php  

class Checkout extends CI_Controller {

	public function __construct() {

		parent::__construct();
		if ($this->session->userdata('role') != 'user') {
			redirect('home');
		}	
	}

	public function checkout() {

		$this->form_validation->set_rules('nama_rekening', 'Nama Akun', 'trim|required', ['required' => 'Wajib diisi!']);
		$this->form_validation->set_rules('nomor_rekening', 'Nomor Rekening', 'trim|required', ['required' => 'Wajib diisi!']);
		$this->form_validation->set_rules('nominal', 'Nominal', 'trim|required', ['required' => 'Wajib diisi!']);
		$this->form_validation->set_rules('catatan', 'Catatan', 'trim');
		$this->form_validation->set_rules('gambar', 'Gambar', 'trim|required', ['required' => 'Wajib diisi!']);

		if ($this->form_validation->run() == FALSE) {
			
			$data['title'] = 'Halaman Checkout';
			$this->load->view('back/header', $data);
			$this->load->view('back/sidebar_user');
			$this->load->view('chekcout');
			$this->load->view('back/footer');

		} else {

			$id_booking = $this->input->post(htmlspecialchars('id_booking'), TRUE);
			$nama_rekening = $this->input->post(htmlspecialchars('nama_rekening'), TRUE);
			$nomor_rekening = $this->input->post(htmlspecialchars('nomor_rekening'), TRUE);
			$nominal = $this->input->post(htmlspecialchars('nominal'), TRUE);
			$catatan = $this->input->post(htmlspecialchars('catatan'), TRUE);
			$gambar = $_FILES['gambar']['name'];

			$data = [

				'id_booking' => $id_booking,
				'nama_rekening' => $nama_rekening,
				'nomor_rekening' => $nomor_rekening,
				'nominal' => $nominal,
				'catatan' => $catatan,
				'gambar' => $gambar
			];

		}

	}
}

?>