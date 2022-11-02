<?php

class PindahJemaat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelPindahJemaat");
	}

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$dataPindahJemaat = $this->ModelPindahJemaat->getAll();
		$data = array(
			"pindahjemaats" => $dataPindahJemaat
		);
		$this->load->view('content/pindahjemaat/v_list_pindahjemaat', $data);
		$this->load->view('templates/footer');

	}

	//untuk me load tampilan form tambah pindah jemaat
	public function tambah()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view("content/pindahjemaat/v_add_pindahjemaat");
		$this->load->view('templates/footer');
	}

	public function insert()
	{
		$data = array(
			"nama_pindah_jemaat" => $this->input->post("nama_pindah_jemaat"),
			"asal_gereja" => $this->input->post("asal_gereja"),
			"tujuan_gereja" => $this->input->post("tujuan_gereja"),
			"tahun_masuk" => $this->input->post("tahun_masuk"),
			"tahun_keluar" => $this->input->post("tahun_keluar")
		);
		$id = $this->ModelPindahJemaat->insertGetId($data);
		redirect('pindahjemaat');
	}

	public function ubah($id)
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$pindahjemaat = $this->ModelPindahJemaat->getByPrimaryKey($id);
		$data = array (
			"pindahjemaat" => $pindahjemaat,
		);
		$this->load->view('content/pindahjemaat/v_update_pindahjemaat', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$id = $this->input->post('id_pindah_jemaat');
		$data = array (
			"nama_pindah_jemaat" => $this->input->post("nama_pindah_jemaat"),
			"asal_gereja" => $this->input->post("asal_gereja"),
			"tujuan_gereja" => $this->input->post("tujuan_gereja"),
			"tahun_masuk" => $this->input->post("tahun_masuk"),
			"tahun_keluar" => $this->input->post("tahun_keluar")
		);
		$this->ModelPindahJemaat->update($id, $data);
		redirect('pindahjemaat');
	}

	public function print()
	{
		$dataPindahJemaat['pindahjemaat'] = $this->ModelPindahJemaat->getAll();
		$this->load->view('content/pindahjemaat/print_pindahjemaat', $dataPindahJemaat);
	}

	public function delete()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$id = $this->input->post('id_pindah_jemaat');
		$this->ModelPindahJemaat->delete($id);
		redirect('pindahjemaat');
		$this->load->view('templates/footer');
	}
}
