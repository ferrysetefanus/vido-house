<?php  

class Model_booking extends CI_Model {

	public function tampil_data_user($limit, $start, $user_id) {

		$this->db->where('id_user', $user_id);
		$this->db->limit($limit, $start);
		return $this->db->from('meja')
		->join('booking', 'booking.meja=meja.id')
		->get()
		->result();

	}

	public function tampil_jumlah_data_user($user_id) {

		$this->db->where('id_user', $user_id);
		return $this->db->get('booking')->num_rows();
	}

	public function tambah_data($table, $data) {

		return $this->db->insert($table, $data);
	}

	public function tampil_data($limit, $start) {

		$this->db->limit($limit, $start);
		return $this->db->from('meja')
		->join('booking', 'booking.meja=meja.id')
		->get()
		->result();
	}

	public function tampil_jumlah_data() {

		return $this->db->get('booking')->num_rows();
	}

	public function edit($table, $id) {

		$this->db->where($id);
		return $this->db->get($table)->result();
	}

	public function update($table, $id, $data) {

		$this->db->where($id);
		return $this->db->update($table, $data);
	}

	public function hapus($id) {

		$this->db->where($id);
		return $this->db->delete($table);
	}

	public function tampil_bayar($id) {

		$this->db->where($id);
		return $this->db->get('checkout')->result();
	}
}
?>