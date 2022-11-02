<?php

class Mati extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelMati");
	}

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$dataMati = $this->ModelMati->getAll();
		$data = array(
			"matis" => $dataMati
		);
		$this->load->view('content/mati/v_list_mati', $data);
		$this->load->view('templates/footer');
	}

	//untuk me load tampilan form tambah mati
	public function tambah()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view("content/mati/v_add_mati");
		$this->load->view('templates/footer');
	}

	public function insert()
	{
		$config['upload_path']          = './foto/';
		$config['allowed_types']        = "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp";
		$config['max_size']             = 10000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			echo "Gagal di tambahkan";
		}
		{
			$foto = $this->upload->data();
			$foto = $foto['file_name'];
			$nomor_surat_mati = $this->input->post("nomor_surat_mati", TRUE);
			$nama_jemaat_mati = $this->input->post("nama_jemaat_mati", TRUE);
			$tanggal_mati = $this->input->post("tanggal_mati", TRUE);
			$tempat_mati = $this->input->post("tempat_mati", TRUE);
			$alasan_mati = $this->input->post("alasan_mati", TRUE);
		}
		$data = array(
			"nomor_surat_mati" => $nomor_surat_mati,
			"nama_jemaat_mati" => $nama_jemaat_mati,
			"tanggal_mati" => $tanggal_mati,
			"tempat_mati" => $tempat_mati,
			"alasan_mati" => $alasan_mati,
			"foto" => $foto
		);
		$id = $this->ModelMati->insertGetId($data);
		$this->session->set_flashdata('pesan', '<div
                        class="alert alert-success" role="alert">
                        Data Berhasil DiTambah!
                        </div>');
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
		$config['upload_path']          = './foto/';
		$config['allowed_types']        = "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp";
		$config['max_size']             = 10000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			echo "Gagal di tambahkan";
		}
		{
			$foto = $this->upload->data();
			$foto = $foto['file_name'];
			$nomor_surat_mati = $this->input->post("nomor_surat_mati", TRUE);
			$nama_jemaat_mati = $this->input->post("nama_jemaat_mati", TRUE);
			$tanggal_mati = $this->input->post("tanggal_mati", TRUE);
			$tempat_mati = $this->input->post("tempat_mati", TRUE);
			$alasan_mati = $this->input->post("alasan_mati", TRUE);
			$id = $this->input->post("id_mati");
		}
		$data = array(
			"nomor_surat_mati" => $nomor_surat_mati,
			"nama_jemaat_mati" => $nama_jemaat_mati,
			"tanggal_mati" => $tanggal_mati,
			"tempat_mati" => $tempat_mati,
			"alasan_mati" => $alasan_mati,
			"foto" => $foto
		);
		$id = $this->ModelMati->update($id, $data);
		$this->session->set_flashdata('pesan', '<div
                        class="alert alert-success" role="alert">
                        Data Berhasil DiTambah!
                        </div>');
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
