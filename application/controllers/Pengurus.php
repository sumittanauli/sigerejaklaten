<?php

class Pengurus extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelPengurus");
	}

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$dataPengurus = $this->ModelPengurus->getAll('join');
		$data = array(
			"penguruss" => $dataPengurus
		);
		$this->load->view('content/pengurus/v_list_pengurus', $data);
		$this->load->view('templates/footer');
	}

	//untuk me load tampilan form tambah pengurus
	public function tambah()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view("content/pengurus/v_add_pengurus");
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
				$nomor_surat_pengurus = $this->input->post("nomor_surat_pengurus", TRUE);
				$nik = $this->input->post("nik", TRUE);
				$pendidikan_pengurus = $this->input->post("pendidikan_pengurus", TRUE);
				$tanggal_mulai_pengurus = $this->input->post("tanggal_mulai_pengurus", TRUE);
				$tanggal_selesai_pengurus = $this->input->post("tanggal_selesai_pengurus", TRUE);
				$status_pengurus = $this->input->post("status_pengurus", TRUE);
			}
		$data = array(
			"nomor_surat_pengurus" => $nomor_surat_pengurus,
			"nik" => $nik,
			"pendidikan_pengurus" => $pendidikan_pengurus,
			"tanggal_mulai_pengurus" => $tanggal_mulai_pengurus,
			"tanggal_selesai_pengurus" => $tanggal_selesai_pengurus,
			"status_pengurus" => $status_pengurus,
			"foto" => $foto
		);
		$id = $this->ModelPengurus->insertGetId($data);
		$this->session->set_flashdata('pesan', '<div
                        class="alert alert-success" role="alert">
                        Data Berhasil DiTambah!
                        </div>');
		redirect('pengurus');
	}

	public function ubah($id)
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$pengurus = $this->ModelPengurus->getByPrimaryKey($id);
		$data = array (
			"pengurus" => $pengurus,
		);
		$this->load->view('content/pengurus/v_update_pengurus', $data);
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
			$nomor_surat_pengurus = $this->input->post("nomor_surat_pengurus", TRUE);
			$nik = $this->input->post("nik", TRUE);
			$pendidikan_pengurus = $this->input->post("pendidikan_pengurus", TRUE);
			$tanggal_mulai_pengurus = $this->input->post("tanggal_mulai_pengurus", TRUE);
			$tanggal_selesai_pengurus = $this->input->post("tanggal_selesai_pengurus", TRUE);
			$status_pengurus = $this->input->post("status_pengurus", TRUE);
			$id = $this->input->post("nik");
		}
		$data = array(
			"nomor_surat_pengurus" => $nomor_surat_pengurus,
			"nik" => $nik,
			"pendidikan_pengurus" => $pendidikan_pengurus,
			"tanggal_mulai_pengurus" => $tanggal_mulai_pengurus,
			"tanggal_selesai_pengurus" => $tanggal_selesai_pengurus,
			"status_pengurus" => $status_pengurus,
			"foto" => $foto
		);
		$id = $this->ModelPengurus->update($id, $data);
		$this->session->set_flashdata('pesan', '<div
                        class="alert alert-success" role="alert">
                        Data Berhasil DiTambah!
                        </div>');
		redirect('pengurus');
	}

	public function print()
	{
		$dataPengurus['pengurus'] = $this->ModelPengurus->getAll();
		$this->load->view('content/pengurus/print_pengurus', $dataPengurus);
	}

	public function delete()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$id = $this->input->post('id_pengurus');
		$this->ModelPengurus->delete($id);
		redirect('pengurus');
		$this->load->view('templates/footer');
	}
}
