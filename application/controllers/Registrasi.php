<?php  

class Registrasi extends CI_Controller {

	public function index() {

		$this->form_validaiton->set_rules('nama', 'Nama', 'trim|min_length[4]|required', ['required' => 'Nama wajib diisii!']);

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Register Form';
			$this->load->view('back/header', $data);
			$this->load->view('register');
			$this->load->view('back/footer');
		} else {
			$input = [
				'nama' 			=> $this->input->post('nama'),
				'username' 		=> $this->input->post('username'),
				'email' 		=> $this->input->post('email'),
				'alamat' 		=> $this->input->post('alamat'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'nomor_hp' 		=> $this->input->post('nomor_hp'),
				'role' 			=> 'user'
			];

			$this->model_user->register_user('user', $input);

			$this->session->set_flashdata('pesan', "<div class='alert alert-success alert-dismissible fade show' role='alert'>Registrasi akun berhasil<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
				</button>
				</div>");
			redirect('auth/login');
		}
	}
}

?>