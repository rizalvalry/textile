<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_inventory extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('inventory');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM inventory WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_ukuran_warna($id) {
		$sql = "SELECT warna.nama AS warna, ukuran.nama AS ukuran FROM inventory, warna, ukuran WHERE inventory.id = ukuran.inventory_id AND inventory.id = warna.inventory_id AND inventory.id={$id}";
		
		$cari_ukuran_warna = $this->db->query($sql);
		if (!empty($cari_ukuran_warna->result())) { $data = $cari_ukuran_warna->result(); }
		else {
			$cari_warna = "SELECT warna.nama AS warna FROM inventory, warna WHERE inventory.id = warna.inventory_id AND inventory.id={$id}";
			$cari_ = $this->db->query($cari_warna);
			if (!empty($cari_->result())) { $data = $cari_->result(); }
			else { $data = []; }
		}

		return $data;
	}

	public function insert($data) {
		$sql = "INSERT INTO inventory VALUES('','" .$data['inventory'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('inventory', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE inventory SET nama='" .$data['inventory'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM inventory WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('inventory');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('inventory');

		return $data->num_rows();
	}
}

/* End of file M_inventory.php */
/* Location: ./application/models/M_inventory.php */