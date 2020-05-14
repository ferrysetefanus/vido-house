<?php  

class Registrasi extends CI_Controller {

	public function index() {

		$this->form_validation->set_rules('nama', 'Nama', 'trim|min_length[4]|required', ['required' => 'Nama wajib diisii!']);
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|is_unique[user.username]', ['required' => 'Email wajib diisii!', 'is_unique[user.username]' => 'Username sudah terpakai!']);
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]', ['required' => 'Nama wajib diisii!', 'valid_email' => 'Email tidak valid!', 'is_unique[user.email]' => 'Email telah terdaftar!']);
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|min_length[4]|required', ['required' => 'Alamat wajib diisii!']);
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required', ['required' => 'Jenis kelamin wajib diisii!']);
		$this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'trim|min_length[4]|required|is_unique[user.nomor_hp]', ['required' => 'Nomor HP wajib diisii!', 'is_unique[user.nomor_hp]' => 'Nomor HP telah digunakan!']);

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Register Form';
			$this->load->view('back/header', $data);
			$this->load->view('register');
			$this->load->view('back/footer');
		} else {
			$input = [
				'nama' 			=> $this->input->post(htmlspecialchars('nama')),
				'username' 		=> $this->input->post(htmlspecialchars('username')),
				'email' 		=> $this->input->post(htmlspecialchars('email')),
				'alamat' 		=> $this->input->post(htmlspecialchars('alamat')),
				'jenis_kelamin' => $this->input->post(htmlspecialchars('jenis_kelamin')),
				'nomor_hp' 		=> $this->input->post(htmlspecialchars('nomor_hp')),
				'status'		=> 'nonaktif',
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