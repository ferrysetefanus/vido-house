<?php  

class Data_user extends CI_Controller {

	public function index() {

		$data['title'] = "Admin : Data User";
		$data['users'] = $this->model_user->tampil_data();
		$data['booking_baru'] = $this->model_booking->tampil_booking_baru();
		$this->load->view('back/header', $data);
		$this->load->view('back/sidebar');
		$this->load->view('back/data_user');
		$this->load->view('back/footer');

	}
}

?>