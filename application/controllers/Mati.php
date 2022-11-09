<?php

class Mati extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelMati");
		if(!$this->session->userdata('email')){
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  			Login Terlebih Dahulu.
			</div>');
			redirect('Auth');
		}
	}

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$dataMati = $this->ModelMati->getAll("join");
		$data = array(
			"matis" => $dataMati
		);
		$this->load->view('content/mati/v_list_mati', $data);
		$this->load->view('templates/footer');
	}

	//untuk me load tampilan form tambah mati
	public function tambah()
	{
		$data['jemaat'] = $this->db->get('jemaat')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view("content/mati/v_add_mati");
		$this->load->view('templates/footer');
	}

	public function insert()
	{
		$data = array(
			"nomor_surat_mati" => $this->input->post("nomor_surat_mati", TRUE),
			"nik" => $this->input->post("nik", TRUE),
			"tanggal_mati" => $this->input->post("tanggal_mati", TRUE),
			"tempat_mati" => $this->input->post("tempat_mati", TRUE),
			"alasan_mati" => $this->input->post("alasan_mati", TRUE)
		);
		$id = $this->ModelMati->insertGetId($data);
		redirect('mati');
	}

	public function ubah($id)
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$mati = $this->ModelMati->getByPrimaryKey($id);
		$data = array (
			"mati" => $mati,
		);
		$this->load->view('content/mati/v_update_mati', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$id = $this->input->post('nik');
		$data = array(
			"nomor_surat_mati" => $this->input->post("nomor_surat_mati", TRUE),
			"nik" => $this->input->post("nik", TRUE),
			"tanggal_mati" => $this->input->post("tanggal_mati", TRUE),
			"tempat_mati" => $this->input->post("tempat_mati", TRUE),
			"alasan_mati" => $this->input->post("alasan_mati", TRUE)
		);
		$id = $this->ModelMati->update($id, $data);
		redirect('mati');
	}

	public function delete()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$id = $this->input->post('id_mati');
		$this->ModelMati->delete($id);
		redirect('mati');
		$this->load->view('templates/footer');
	}

	public function print()
	{
		$dataMati['mati'] = $this->ModelMati->getAll();
		$this->load->view('content/mati/print_mati', $dataMati);
	}
}
