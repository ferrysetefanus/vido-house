<?php 

class Model_checkout extends CI_Model {

	public function cek_bayar($id) {

		$this->db->where('id_booking', $id);
		$query = $this->db->get('checkout');

		if ($query->num_rows() > 0) {
			
			return true;
		} else {
			return false;
		}
	}

	public function cek_batal($id) {

		$this->db->where('id', $id);
		$query = $this->db->get('booking');

		if ($query->row()->status == 'Batal') {
			return TRUE;
		} else {
			return false;
		}
	}

	public function bayar($table, $data) {

		return $this->db->insert($table, $data);
	}
}

?>