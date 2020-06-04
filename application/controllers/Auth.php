<?php 

class Auth extends CI_Controller {

	public function login() {

		$this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username Wajib diisi!']);

		$this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password Wajib diisi!']);

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Login Page';
			$this->load->view('back/header', $data);
			$this->load->view('login');
			$this->load->view('back/footer');
		} else {
			$username = $this->input->post(htmlspecialchars('username'));
			$password = $this->input->post(htmlspecialchars('password'));
			$login = $this->model_user->cek_login($username, $password);
			if ($login == FALSE) {
				$this->session->set_flashdata('pesan', "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Username atau Password Anda salah!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
					</button>
					</div>");
				redirect('auth/login');
			} else if ($login->status == 0) {
				$this->session->set_flashdata('pesan', "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Email Anda belum diverifikasi, silahkan verifikasi terlebih dahulu<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
					</button>
					</div>");
				redirect('auth/login');
			} else {
				$data = [
					'user_id' 	=> $login->id, 
					'username' 	=> $login->username,
					'role' 		=> $login->role
				];

				$this->session->set_userdata($data);

				switch ($login->role) {
					case 'admin':
						redirect('admin/dashboard_admin');
						break;

					case 'user':
						redirect('home');
						break;
					
					default:
						break;
				}
			}
		}
	}

	public function logout() {

		$this->session->sess_destroy();
		redirect('home');
	}
}

?>