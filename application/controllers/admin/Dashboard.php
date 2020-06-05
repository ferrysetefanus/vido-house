<?php  

class Dashboard extends CI_Controller {

	public function index() {

		$data['title'] = "Dashboard Admin";
		$data['user'] = $this->model_user->get_all_users();
		$this->load->view('back/header', $data);
		$this->load->view('back/sidebar');
		$this->load->view('back/dashboard');
		$this->load->view('back/footer');
	}
}

?>