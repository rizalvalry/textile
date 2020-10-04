<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ukuran extends CI_Model {
	public function select_all() {
		$data = $this->db->get('ukuran');

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM ukuran WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_pegawai($id) {
		$sql = " SELECT pegawai.id AS id, pegawai.nama AS pegawai, pegawai.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, ukuran.nama AS ukuran FROM pegawai, kota, kelamin, ukuran WHERE pegawai.id_kelamin = kelamin.id AND pegawai.id_ukuran = ukuran.id AND pegawai.id_kota = kota.id AND pegawai.id_ukuran={$id}";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data) {
		$sql = "INSERT INTO ukuran VALUES('','" .$data['ukuran'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('ukuran', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE ukuran SET nama='" .$data['ukuran'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM ukuran WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('ukuran');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('ukuran');

		return $data->num_rows();
	}
}

/* End of file M_ukuran.php */
/* Location: ./application/models/M_ukuran.php */