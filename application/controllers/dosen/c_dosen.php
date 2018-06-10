<?php
	/**
	* 
	*/
	class C_dosen extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model("m_auth");
		}

		function index(){
			$this->load->view("dosen/v_login.html");
		}

		function goto_daftar(){
			$this->load->view("dosen/v_signup.html");
		}

		function daftar(){
			$nim = $this->input->post("nim");
			$username = $this->input->post("username");
			$password = $this->input->post("password");
			$status = $this->input->post("status");
			$data = array(
				'nik' => $nim,
				'nama_dosen' => $username,
				'password' => $password,
				'status' => $status
			);
			$table = "dosen";
			$this->m_auth->tambah($table, $data);
			echo json_encode("ok");
		}
	}
?>