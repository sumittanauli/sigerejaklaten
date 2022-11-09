<?php

class Pendeta extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelPendeta");
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
		$dataPendeta = $this->ModelPendeta->getAll();
		$data = array(
			"pendetas" => $dataPendeta
		);
		$this->load->view('content/pendeta/v_list_pendeta', $data);
		$this->load->view('templates/footer');
	}

	//untuk me load tampilan form tambah pendeta
	public function tambah()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view("content/pendeta/v_add_pendeta");
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
				$id_pendeta = $this->input->post("id_pendeta", TRUE);
				$nomor_surat_pendeta = $this->input->post("nomor_surat_pendeta", TRUE);
				$nama_pendeta = $this->input->post("nama_pendeta", TRUE);
				$asal_pendeta = $this->input->post("asal_pendeta", TRUE);
				$pendidikan_pendeta = $this->input->post("pendidikan_pendeta", TRUE);
				$tahun_mulai_pendeta = $this->input->post("tahun_mulai_pendeta", TRUE);
				$tahun_selesai_pendeta = $this->input->post("tahun_selesai_pendeta", TRUE);
				$periode_pendeta = $this->input->post("periode_pendeta", TRUE);
				$status_pendeta = $this->input->post("status_pendeta", TRUE);
			}
		$data = array(
			"id_pendeta" => $id_pendeta,
			"nomor_surat_pendeta" => $nomor_surat_pendeta,
			"nama_pendeta" => $nama_pendeta,
			"asal_pendeta" => $asal_pendeta,
			"pendidikan_pendeta" => $pendidikan_pendeta,
			"tahun_mulai_pendeta" => $tahun_mulai_pendeta,
			"tahun_selesai_pendeta" => $tahun_selesai_pendeta,
			"periode_pendeta" => $periode_pendeta,
			"status_pendeta" => $status_pendeta,
			"foto" => $foto
		);
		$id = $this->ModelPendeta->insertGetId($data);
		$this->session->set_flashdata('pesan', '<div
                        class="alert alert-success" role="alert">
                        Data Berhasil DiTambah!
                        </div>');
		redirect('pendeta');
	}

	public function ubah($id)
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$pendeta = $this->ModelPendeta->getByPrimaryKey($id);
		$data = array (
			"pendeta" => $pendeta,
		);
		$this->load->view('content/pendeta/v_update_pendeta', $data);
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
			$id_pendeta = $this->input->post("id_pendeta", TRUE);
			$nomor_surat_pendeta = $this->input->post("nomor_surat_pendeta", TRUE);
			$nama_pendeta = $this->input->post("nama_pendeta", TRUE);
			$asal_pendeta = $this->input->post("asal_pendeta", TRUE);
			$pendidikan_pendeta = $this->input->post("pendidikan_pendeta", TRUE);
			$tahun_mulai_pendeta = $this->input->post("tahun_mulai_pendeta", TRUE);
			$tahun_selesai_pendeta = $this->input->post("tahun_selesai_pendeta", TRUE);
			$periode_pendeta = $this->input->post("periode_pendeta", TRUE);
			$status_pendeta = $this->input->post("status_pendeta", TRUE);
			$id = $this->input->post("id_pendeta");
		}
		$data = array(
			"id_pendeta" => $id_pendeta,
			"nomor_surat_pendeta" => $nomor_surat_pendeta,
			"nama_pendeta" => $nama_pendeta,
			"asal_pendeta" => $asal_pendeta,
			"pendidikan_pendeta" => $pendidikan_pendeta,
			"tahun_mulai_pendeta" => $tahun_mulai_pendeta,
			"tahun_selesai_pendeta" => $tahun_selesai_pendeta,
			"periode_pendeta" => $periode_pendeta,
			"status_pendeta" => $status_pendeta,
			"foto" => $foto
		);
		$id = $this->ModelPendeta->update($id, $data);
		$this->session->set_flashdata('pesan', '<div
                        class="alert alert-success" role="alert">
                        Data Berhasil DiTambah!
                        </div>');
		redirect('pendeta');
	}

	public function print()
	{
		$dataPendeta['pendeta'] = $this->ModelPendeta->getAll();
		$this->load->view('content/pendeta/print_pendeta', $dataPendeta);
	}

	public function delete()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$id = $this->input->post('id_pendeta');
		$this->ModelPendeta->delete($id);
		redirect('pendeta');
		$this->load->view('templates/footer');
	}
}
