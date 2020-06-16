<?php  

class Model_meja extends CI_model {

	public function get_data() {

		return $this->db->get('meja')->result();
	}
}

?>