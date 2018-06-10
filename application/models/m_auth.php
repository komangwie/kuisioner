<?php
	/**
	* 
	*/
	class M_auth extends CI_Model
	{
		function tambah($table, $data){
			$this->db->insert($table, $data);
		}

		function login($username, $password){
			return $this->db->query("select * from mahasiswa where nama_mahasiswa = '$username' and password = '$password'");
		}

		function ambil_data($nim){

			$query = "SELECT dosen.nama_dosen,dosen.nik, matakuliah.nama_matakuliah, kelas.id_kelas FROM kelas INNER JOIN dosen on kelas.nik = dosen.nik INNER JOIN matakuliah ON kelas.kode_matakuliah = matakuliah.kode_matakuliah";

			return $this->db->query($query);
		}

		function cek_data_kuisioner($nim, $nik){
			$query = "select * from data_kuisioner where nim = '$nim' and nik = '$nik'";
			return $this->db->query($query);
		}

		function ambil_pilihan(){
			$this->db->select("*");
			$this->db->from("pilihan");
			return $this->db->get();
		}

		function cek_login($username,$password){
			$this->db->select('*');
			$this->db->from("mahasiswa");
			$this->db->where("nama_mahasiswa", $username);
			$this->db->where("password", $password);
			return $this->db->get();

		}

		function simpan_kuisioner($nik, $nim, $rata){
			$query = "insert into data_kuisioner(nik, nim, hasil) values('$nik', '$nim', '$rata')";
			$this->db->query($query);
		}
		
	}
?>