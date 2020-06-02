<?php  

class Model_register extends CI_model {

	public function __construct() {

		parent::__construct();
	}

	public function register_user($table, $data) {

		$this->db->insert($table, $data);

		return mysqli_insert_id();

	}

	public function update_status($id) {

		$data = [

			'status' => 1;
		];

		$this->db->where('md5(id)', $id);
		$this->db->update('user', $data);

		return true;
	}
}

?>