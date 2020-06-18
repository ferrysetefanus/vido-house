<?php  

class Dashboard extends CI_Controller {

	public function index() {

		$data['title'] = "Dashboard Admin";
		$data['user'] = $this->model_user->get_all_users();
		$data['menu'] = $this->model_menu->get_all_menu();
		$data['booking'] = $this->model_booking->tampil_jumlah_data();
		$data['booking_baru'] = $this->model_booking->tampil_booking_baru();
		$this->load->view('back/header', $data);
		$this->load->view('back/sidebar', $data);
		$this->load->view('back/dashboard');
		$this->load->view('back/footer');
	}
}

?>