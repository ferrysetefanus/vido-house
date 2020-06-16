<?php  

class Model_booking extends CI_Model {

	public function tampil_data($limit, $start, $user_id) {

		$this->db->where('id_user', $user_id);
		return $this->db->from('booking')
						->join('meja', 'meja.id=booking.meja')
						->get()
						->result();

	}

	public function tampil_jumlah_data($user_id) {

		$this->db->where('id_user', $user_id);
		return $this->db->get('booking')->num_rows();
	}

	public function tambah_data($table, $data) {

		return $this->db->insert($table, $data);
	}
}
?>