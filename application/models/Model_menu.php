<?php  

class Model_menu extends CI_Model {

	public function tampil_data($limit, $start) {

		$query = $this->db->get('menu', $limit, $start);

		return $query->result();
	}

	public function get_id($id) {

		$this->db->where('id', $id);
		return $this->db->get('menu')->row()->id;
	}

	public function tambah_menu($table, $data) {

		$this->db->insert($table, $data);

		return true;
	}

	public function ambil_nama_gambar($id) {

		$this->db->where($id);
		return $this->db->get('menu')->row()->gambar;
		
	}

	public function edit_menu($table, $id) {

		$query = $this->db->get_where($table, $id);
		return $query->result();

	}
 
	public function update($table, $id, $data) {

		$this->db->where($id);
		$this->db->update($table, $data);

		return true;

	}

	public function delete($table, $id) {

		$this->db->where($id);
		$this->db->delete($table);
		return true;
	}

	public function get_all_menu() {

		return $this->db->get('menu')->num_rows();
	}
}

?>