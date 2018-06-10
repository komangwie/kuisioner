<?php
	/**
	* 
	*/
	class M_admin extends CI_Model
	{
		function tambah($tabel,$data){
			$this->db->insert($tabel,$data);
			$query = "select * from jurusan where id_jurusan= LAST_INSERT_ID()";
			return $this->db->query($query);
		}

		function tambah_matkul($tabel,$data){
			$this->db->insert($tabel,$data);
			$query = "select * from matakuliah where id_pilihan= LAST_INSERT_ID()";
			return $this->db->query($query);
		}

		function get_peringkat(){
			$query = "SELECT dosen.nama_dosen, data_kuisioner.hasil FROM data_kuisioner INNER JOIN dosen ON data_kuisioner.nik = dosen.nik ORDER BY data_kuisioner.hasil DESC";
			return $this->db->query($query);
		}

		function tambah_pilihan($tabel,$data){
			$this->db->insert($tabel,$data);
			$query = "select * from pilihan where kode_matakuliah= LAST_INSERT_ID()";
			return $this->db->query($query);
		}

		function tambah_langsung($tabel,$data){
			$this->db->insert($tabel,$data);
		}

		function get_data($tabel){
			$this->db->select("*");
			$this->db->from($tabel);
			return $this->db->get();
		}

		function get_data_kelas(){
			$this->db->select("kelas.id_kelas, kelas.nama_kelas, matakuliah.nama_matakuliah, kelas.tahun, kelas.semester, dosen.nama_dosen");
			$this->db->from('kelas');
			$this->db->join('matakuliah','kelas.kode_matakuliah = matakuliah.kode_matakuliah');
			$this->db->join('dosen', 'kelas.nik = dosen.nik');
			return $this->db->get();	
		}
	}
?>