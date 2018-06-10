<?php
	/**
	* 
	*/
	class C_admin extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model("admin/m_admin", "m_admin");
		}

		function index(){
			$res = $this->m_admin->get_peringkat()->result_array();
			$data['peringkat'] = $res;
			$this->load->view("admin/v_admin_dashboard.html", $data);
		}

		function matakuliah(){
			$tabel = 'matakuliah';
			$res = $this->m_admin->get_data($tabel)->result_array();
			$tabel = 'jurusan';
			$jur = $this->m_admin->get_data($tabel)->result_array();
			$data['jurusan'] = $jur;
			$data['matkul'] = $res;
			$this->load->view('admin/v_matakuliah.html', $data);
		}

		function tambah_matkul(){
			$kode = $this->input->post("kode");
			$nama = $this->input->post("nama");
			$id_jurusan = $this->input->post("jurusan");
			$data = array(
				'kode_matakuliah' => $kode,
				'nama_matakuliah' => $nama,
				'id_jurusan' => $id_jurusan );
			$tabel = "matakuliah";
			$res = $this->m_admin->tambah_matkul($tabel, $data)->result_array();
			echo json_encode($res);
		}

		function jurusan(){
			$tabel = 'jurusan';
			$res = $this->m_admin->get_data($tabel)->result_array();
			$data['jurusan'] = $res;
			$this->load->view("admin/v_jurusan.html", $data);
		}

		function tambah_jurusan(){
			$jurusan = $this->input->post("nama");
			$data = array(
				'nama_jurusan' => $jurusan, );
			$tabel = "jurusan";
			$res = $this->m_admin->tambah($tabel,$data)->result_array();
			echo json_encode($res);
		}

		function pilihan(){
			$tabel = 'pilihan';
			$res = $this->m_admin->get_data($tabel)->result_array();
			$data['pilihan'] = $res;
			$this->load->view("admin/v_pilihan.html", $data);
		}

		function tambah_pilihan(){
			$pilihan = $this->input->post("nama");
			$data = array(
				'pilihan' => $pilihan, );
			$tabel = 'pilihan';
			$res = $this->m_admin->tambah_pilihan($tabel,$data)->result_array();
			echo json_encode($res);
		}

		function kelas(){
			$tabel = 'matakuliah';
			$res = $this->m_admin->get_data($tabel)->result_array();
			$data['matkul'] = $res;
			$tabel = 'dosen';
			$res = $this->m_admin->get_data($tabel)->result_array();
			$data['dosen'] = $res;
			
			$res = $this->m_admin->get_data_kelas()->result_array();
			$data['kelas'] = $res;
			$this->load->view("admin/v_kelas.html", $data);
		}

		function tambah_kelas(){
			$matkul = $this->input->post("matkul");
			$tahun = $this->input->post("tahun");
			$semester = $this->input->post("semester");
			$dosen = $this->input->post("dosen");
			$nama_matkul = $this->input->post("nama");

			$data = array(
				'nama_kelas' => $nama_matkul, 
				'kode_matakuliah' => $matkul,
				'tahun' => $tahun,
				'semester' => $semester,
				'nik' => $dosen,
				);
			$tabel = 'kelas';
			$this->m_admin->tambah_langsung($tabel, $data);

			echo json_encode("ok");

		}
	}
?>