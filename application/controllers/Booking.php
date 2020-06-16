<?php  

class Booking extends CI_Controller {

	public function __construct() {

		parent::__construct();
		if ($this->session->userdata('role') != 'user') {
			redirect('home');
		}	
	}

	public function index() {

		$config['base_url'] = base_url('booking/index');
		$config['total_rows'] = $this->model_menu->get_all_menu(); 
		$config['per_page'] = 5;
		$config['uri_segment'] = 4;
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] = floor($choice);

		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav></div>';
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '</span></li>';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close'] = '<span aria-hidden="true">&raquo</span></span></li>';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close'] = '</span>Next</li>';
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close'] = '</span></li>';


		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['jumlah'] = $this->model_booking->tampil_jumlah_data($this->session->userdata('user_id'));
		$data['booking'] = $this->model_booking->tampil_data($config['per_page'], $data['page'], $this->session->userdata('user_id'));
		$data['pagination'] = $this->pagination->create_links();
		$data['title'] = 'Booking';
		$this->load->view('back/header', $data);
		$this->load->view('back/sidebar_user');
		$this->load->view('back/booking');
		$this->load->view('back/footer');
	}
 
	public function tambah_booking() {

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required', ['required' => 'Nama wajib diisi!']);
		$this->form_validation->set_rules('meja', 'Meja', 'trim|required', ['required' => 'Meja wajib diisi!']);
		$this->form_validation->set_rules('hari', 'Hari', 'trim|required', ['required' => 'Hari wajib diisi!']);
		$this->form_validation->set_rules('tlp', 'Telepon', 'trim|required', ['required' => 'Telepon wajib diisi!']);

		if ($this->form_validation->run() == FALSE) {
			
			$data['meja'] = $this->model_meja->get_data();
			$data['title'] = "Form Booking";
			$this->load->view('back/header', $data);
			$this->load->view('back/sidebar_user');
			$this->load->view('back/form_booking');
			$this->load->view('back/footer');
		} else {

			$nama = $this->input->post(htmlspecialchars('nama'), TRUE);
			$meja = $this->input->post(htmlspecialchars('meja'), TRUE);
			$hari = $this->input->post(htmlspecialchars('hari'), TRUE);
			$tlp = $this->input->post(htmlspecialchars('tlp'), TRUE);

			$data = [

				'id_user' => $this->session->userdata('user_id'),
				'nama' => $nama,
				'meja' => $meja,
				'hari' => $hari,
				'telepon' => $tlp,
				'status' => 'Belum Dibayar'
			];

			$this->model_booking->tambah_data('booking', $data);
			$this->session->set_flashdata('pesan', "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Booking berhasil ditambahkan, silahkan melakukan checkout<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
				</button>
				</div>");
			redirect('booking');

		}
	}
}


?>