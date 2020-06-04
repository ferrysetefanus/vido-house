<?php  

class Model_user extends CI_model {

	public function __construct() {

		parent::__construct();
	}

	public function register_user($table, $data) {

		$this->db->insert($table, $data);

		return $this->db->insert_id();

	}

	public function update_status($id, $data) {

		$this->db->where('md5(id)', $id);
		$this->db->update('users', $data);

		return true;
	}

	public function cek_login($username, $password) {

		$this->db->where('username', $username);

		$result = $this->db->get('users');

		$db_password = $result->row(3)->password;

		if (password_verify($password, $db_password)) {
			return $result->row();
		} else {
			return false;
		}
	}
}

?>