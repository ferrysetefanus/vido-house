<?php  

class Home extends CI_Controller {

	public function index() {
		$data['title'] = 'Homepage';
		$this->load->view('front/template/header', $data);
		$this->load->view('front/home');
		$this->load->view('front/template/footer');

	}
}

?>