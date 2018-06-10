<?php
	/**
	* 
	*/
	class C_auth extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model("m_auth");
		}

		function index(){
			$this->load->view("v_login.html");
		}

		function home(){
			$nim = $this->session->userdata('nim');
			$result = $this->m_auth->ambil_data($nim)->result_array();
			$data['kuis'] = $result;
			$this->load->view("v_home.html", $data);
		}

		function goto_signup(){
			$this->load->view("v_signup.html");
		}

		function login(){
			$username = $this->input->post("username");
			$password = $this->input->post("password");
			$res =  $this->m_auth->login($username, $password)->result_array();

			if(count($res) > 0){
				$res = $this->m_auth->cek_login($username,$password)->row();
				$data_session = array(
					'username' =>$username,
					'status' => 'login',
					'nim' => $res->nim
				);
				$this->session->set_userdata($data_session);
				echo json_encode("ok");
			}
			else{
				echo json_encode("failed");
			}
		}

		function daftar(){
			$nim = $this->input->post("nim");
			$username = $this->input->post("username");
			$password = $this->input->post("password");
			$data = array(
				'nim' => $nim,
				'nama_mahasiswa' => $username,
				'password' => $password
			);
			$table = "mahasiswa";
			$this->m_auth->tambah($table, $data);
			echo json_encode("ok");
		}

		function isi_kuisoner(){
			$nama_dosen = $this->uri->segment(3);
			$matkul = $this->uri->segment(4);
			$nik = $this->uri->segment(5);
			$nim = $this->session->userdata('nim');
			$res = $this->m_auth->ambil_pilihan()->result_array();

			$kuis = $this->m_auth->cek_data_kuisioner($nim, $nik)->result_array();
			if(count($kuis) > 0){
				$data["kuis"] =  1;
			}
			else{
				$data['kuis'] = 0;
			}

			$data['nama_dosen'] = $nama_dosen;
			$data['matkul'] = $matkul;
			$data["nik"] = $nik;
			$data['pilihan'] = $res;
			$this->load->view("v_isi_kuisioner.html", $data);
		}

		function isi_kuisioner(){
			$n1 = $this->input->post("n1");
			$n2 = $this->input->post("n2");
			$n3 = $this->input->post("n3");
			$n4 = $this->input->post("n4");
			$n5 = $this->input->post("n5");
			$nik = $this->input->post('nik');
			$nim = $this->session->userdata('nim');

			if($n1 == "A"){
				$n1 = 4;
			}
			else if($n1 == "B"){
				$n1 = 3;
			}
			else if($n1 == "C"){
				$n1 = 2;
			}
			else if($n1 == "D"){
				$n1 = 1;
			}

			if($n2 == "A"){
				$n2 = 4;
			}
			else if($n2 == "B"){
				$n2 = 3;
			}
			else if($n2 == "C"){
				$n2 = 2;
			}
			else if($n2 == "D"){
				$n2 = 1;
			}

			if($n3 == "A"){
				$n3 = 4;
			}
			else if($n3 == "B"){
				$n3 = 3;
			}
			else if($n3 == "C"){
				$n3 = 2;
			}
			else if($n3 == "D"){
				$n3 = 1;
			}

			if($n4 == "A"){
				$n4 = 4;
			}
			else if($n4 == "B"){
				$n4 = 3;
			}
			else if($n4 == "C"){
				$n4 = 2;
			}
			else if($n4 == "D"){
				$n4 = 1;
			}

			if($n5 == "A"){
				$n5 = 4;
			}
			else if($n5 == "B"){
				$n5 = 3;
			}
			else if($n5 == "C"){
				$n5 = 2;
			}
			else if($n5 == "D"){
				$n5 = 1;
			}

			$rata = ($n1 + $n2 + $n3 + $n4 + $n5)/5;

			$this->m_auth->simpan_kuisioner($nik, $nim, $rata);

			echo json_encode($rata);
		}
	}
?>