<?php  

class Registrasi extends CI_Controller {

	public function index() {

		$this->form_validation->set_rules('nama', 'Nama', 'trim|min_length[4]|required', ['required' => 'Nama wajib diisii!']);
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|is_unique[users.username]', ['required' => 'Username wajib diisii!', 'is_unique' => 'Username sudah terpakai!']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]', ['required' => 'Password wajib diisii!']);
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]', ['matches[password]' => 'Password tidak cocok!', 'required' => 'Wajib diisi!']);
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]', ['required' => 'Nama wajib diisii!', 'valid_email' => 'Email tidak valid!', 'is_unique' => 'Email telah terdaftar!']);
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|min_length[4]|required', ['required' => 'Alamat wajib diisii!']);
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required', ['required' => 'Jenis kelamin wajib diisii!']);
		$this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'trim|min_length[4]|required|is_unique[users.nomor_hp]', ['required' => 'Nomor HP wajib diisii!', 'is_unique' => 'Nomor HP telah digunakan!']);

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Register Form';
			$this->load->view('back/header', $data);
			$this->load->view('registrasi');
			$this->load->view('back/footer');
		} else {

			$email = $this->input->post(htmlspecialchars('email'));
			$options = ['cost' => 12];
			$password = password_hash($this->input->post(htmlspecialchars('password')), PASSWORD_BCRYPT, $options);
			$input = [
				'nama' 			=> $this->input->post(htmlspecialchars('nama')),
				'username' 		=> $this->input->post(htmlspecialchars('username')),
				'password'		=> $password,
				'email' 		=> $email,
				'alamat' 		=> $this->input->post(htmlspecialchars('alamat')),
				'jenis_kelamin' => $this->input->post(htmlspecialchars('jenis_kelamin')),
				'nomor_hp' 		=> $this->input->post(htmlspecialchars('nomor_hp')),
				'status'		=> '0',
				'role' 			=> 'user'
			];

			$id = $this->model_user->register_user('users', $input);

			$encrypted_id = md5($id);

			$this->load->library('email');
			$config = array();
			$config['charset'] = 'utf-8';
			$config['useragent'] = 'Codeigniter';
			$config['protocol']= "smtp";
			$config['mailtype']= "html";
			$config['smtp_host']= "ssl://smtp.gmail.com";
			$config['smtp_port']= "465";
			$config['smtp_timeout']= "400";
			$config['smtp_user']= "psandrezzz15@gmail.com";
			$config['smtp_pass']= "lostnick15"; 
			$config['crlf']="\r\n"; 
			$config['newline']="\r\n"; 
			$config['wordwrap'] = TRUE;

			$this->email->initialize($config);

			$this->email->from($config['smtp_user']);

			$this->email->to($email);

			$this->email->subject('Verifikasi akun vido');

			$this->email->message('Terimakasih telah melakukan registrasi, untuk memverifikasi silahkan klik tautan di bawah ini<br><br>' . site_url("registrasi/verifikasi/$encrypted_id"));

			if ($this->email->send()) {
				
				$this->session->set_flashdata('pesan', "<div class='alert alert-success alert-dismissible fade show' role='alert'>Registrasi akun berhasil, silahkan cek email untuk verifikasi<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
					</button>
					</div>");

				redirect('auth/login');
			} else {
				$this->session->set_flashdata('pesan', "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Registrasi akun berhasil, namun gagal mengirim email verifikasi<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
					</button>
					</div>");

				redirect('auth/login');
			}	
		}
	}

	public function verifikasi($id) {

		$data = ['status' => 1];

		if ($this->model_user->update_status($id, $data)) {
			echo "Selamat kamu telah memverifikasi akun kamu";
			echo "<br><br><a href='".site_url("auth/login")."'>Kembali ke Menu Login</a>";
		} else {
			echo "Terjadi suatu kesalahan";
			echo "<br><br><a href='".site_url("auth/login")."'>Kembali ke Menu Login</a>";	
		}

		
	}
}

?>