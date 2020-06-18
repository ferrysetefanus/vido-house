<?php  

class Data_booking extends CI_Controller {

	public function __construct() {

		parent::__construct();
		if ($this->session->userdata('role') != 'admin') {
			redirect('');
		}		
	}

	public function index() {

		$config['base_url'] = base_url('admin/data_booking/index');
		$config['total_rows'] = $this->model_booking->tampil_jumlah_data(); 
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
		$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$data['title'] = "Admin : Data Booking";
		$data['booking'] = $this->model_booking->tampil_data($config['per_page'], $data['page']);
		$data['booking_baru'] = $this->model_booking->tampil_booking_baru();
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('back/header', $data);
		$this->load->view('back/sidebar');
		$this->load->view('back/data_booking');
		$this->load->view('back/footer');

	}

	public function edit($id) {

		$id_booking = ['id' => $id];
		$data['title'] = 'Admin : Edit Booking';
		$data['booking'] = $this->model_booking->edit('booking', $id_booking);
		$data['booking_baru'] = $this->model_booking->tampil_booking_baru();
		$this->load->view('back/header', $data);
		$this->load->view('back/sidebar');
		$this->load->view('back/edit_data_booking');
		$this->load->view('back/footer');
	}

	public function update() {

		$id = $this->input->post('id', true);
		$status = $this->input->post('status', true);

		$data = [

			'status' => $status
		];

		$id_booking = ['id' => $id];

		$this->model_booking->update('booking', $id_booking, $data);
		$this->session->set_flashdata('pesan', "<div class='alert alert-success alert-dismissible fade show' role='alert'>Status booking berhasil diubah<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
			</button>
			</div>");
		redirect('admin/data_booking');

	}

	public function hapus($id) {

		$id_booking = ['id' => $id];
		$this->model_booking->hapus('booking', $id);
		$this->session->set_flashdata('pesan', "<div class='alert alert-success alert-dismissible fade show' role='alert'>Data booking berhasil dihapus<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
			</button>
			</div>");
		redirect('admin/data_booking');
	}

	public function tampil_bayar($id) {

		$id_booking = ['id_booking' => $id];
		$data['title'] = "Tampilkan pembayaran";
		$data['bayar'] = $this->model_booking->tampil_bayar($id_booking);
		$data['booking_baru'] = $this->model_booking->tampil_booking_baru();
		$this->load->view('back/header', $data);
		$this->load->view('back/sidebar');
		$this->load->view('back/tampil_bayar');
		$this->load->view('back/footer');
	}	
}

?>