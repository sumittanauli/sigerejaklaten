<?php

class Jemaat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelJemaat");
	}

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$dataJemaat = $this->ModelJemaat->getAll();
		$data = array(
			"jemaats" => $dataJemaat
		);
		$this->load->view('content/jemaat/v_list_jemaat', $data);
		$this->load->view('templates/footer');
	}

	//untuk me load tampilan form tambah jemaat
	public function tambah()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view("content/jemaat/v_add_jemaat");
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
			$nik = $this->input->post("nik", TRUE);
			$nomor_keluarga = $this->input->post("nomor_keluarga", TRUE);
			$nama_jemaat = $this->input->post("nama_jemaat", TRUE);
			$tempat_lahir_jemaat = $this->input->post("tempat_lahir_jemaat", TRUE);
			$tanggal_lahir_jemaat = $this->input->post("tanggal_lahir_jemaat", TRUE);
			$jenis_kelamin_jemaat = $this->input->post("jenis_kelamin_jemaat", TRUE);
			$alamat_jemaat = $this->input->post("alamat_jemaat", TRUE);
			$pekerjaan_jemaat = $this->input->post("pekerjaan_jemaat", TRUE);
			$status_jemaat = $this->input->post("status_jemaat", TRUE);
		}
		$data = array(
			"nik" => $nik,
			"nomor_keluarga" => $nomor_keluarga,
			"nama_jemaat" => $nama_jemaat,
			"tempat_lahir_jemaat" => $tempat_lahir_jemaat,
			"tanggal_lahir_jemaat" => $tanggal_lahir_jemaat,
			"jenis_kelamin_jemaat" => $jenis_kelamin_jemaat,
			"alamat_jemaat" => $alamat_jemaat,
			"pekerjaan_jemaat" => $pekerjaan_jemaat,
			"status_jemaat" => $status_jemaat,
			"foto" => $foto
		);
		$id = $this->ModelJemaat->insertGetId($data);
		$this->session->set_flashdata('pesan', '<div
                        class="alert alert-success" role="alert">
                        Data Berhasil DiTambah!
                        </div>');
		redirect('jemaat');
	}

	public function ubah($id)
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$jemaat = $this->ModelJemaat->getByPrimaryKey($id);
		$data = array (
			"jemaat" => $jemaat,
		);
		$this->load->view('content/jemaat/v_update_jemaat', $data);
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
			$nik = $this->input->post("nik", TRUE);
			$nomor_keluarga = $this->input->post("nomor_keluarga", TRUE);
			$nama_jemaat = $this->input->post("nama_jemaat", TRUE);
			$tempat_lahir_jemaat = $this->input->post("tempat_lahir_jemaat", TRUE);
			$tanggal_lahir_jemaat = $this->input->post("tanggal_lahir_jemaat", TRUE);
			$jenis_kelamin_jemaat = $this->input->post("jenis_kelamin_jemaat", TRUE);
			$alamat_jemaat = $this->input->post("alamat_jemaat", TRUE);
			$pekerjaan_jemaat = $this->input->post("pekerjaan_jemaat", TRUE);
			$status_jemaat = $this->input->post("status_jemaat", TRUE);
			$id = $this->input->post("nik", TRUE);
		}
		$data = array(
			"nik" => $nik,
			"nomor_keluarga" => $nomor_keluarga,
			"nama_jemaat" => $nama_jemaat,
			"tempat_lahir_jemaat" => $tempat_lahir_jemaat,
			"tanggal_lahir_jemaat" => $tanggal_lahir_jemaat,
			"jenis_kelamin_jemaat" => $jenis_kelamin_jemaat,
			"alamat_jemaat" => $alamat_jemaat,
			"pekerjaan_jemaat" => $pekerjaan_jemaat,
			"status_jemaat" => $status_jemaat,
			"foto" => $foto
		);
		$id = $this->ModelJemaat->update($id, $data);
		$this->session->set_flashdata('pesan', '<div
                        class="alert alert-success" role="alert">
                        Data Berhasil DiTambah!
                        </div>');
		redirect('jemaat');
	}

	public function delete()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$id = $this->input->post('id_jemaat');
		$this->ModelJemaat->delete($id);
		redirect('jemaat');
		$this->load->view('templates/footer');
	}

	public function print()
	{
		$dataJemaat['jemaat'] = $this->ModelJemaat->getAll();
		$this->load->view('content/jemaat/print_jemaat', $dataJemaat);
	}
}
