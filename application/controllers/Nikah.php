<?php

class Nikah extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelNikah");
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
		$dataNikah = $this->ModelNikah->getAll("join");
		$data = array(
			"nikahs" => $dataNikah
		);
		$this->load->view('content/nikah/v_list_nikah', $data);
		$this->load->view('templates/footer');
	}

	//untuk me load tampilan form tambah data nikah
	public function tambah()
	{
		$this->db->where('jenis_kelamin_jemaat','Laki-Laki');
		$data['jemaatpria'] = $this->db->get('jemaat')->result_array();
		$this->db->where('jenis_kelamin_jemaat','Perempuan');
		$data['jemaatwanita'] = $this->db->get('jemaat')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view("content/nikah/v_add_nikah");
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
				$nomor_surat_nikah = $this->input->post("nomor_surat_nikah", TRUE);
				$nik = $this->input->post("nik", TRUE);
				$nik_istri = $this->input->post("nik_istri", TRUE);
				$nama_pendeta_nikah = $this->input->post("nama_pendeta_nikah", TRUE);
				$tempat_nikah = $this->input->post("tempat_nikah", TRUE);
				$tanggal_nikah = $this->input->post("tanggal_nikah", TRUE);
			}
		$data = array(
			"nomor_surat_nikah" => $nomor_surat_nikah,
			"nik" => $nik,
			"nik_istri" => $nik_istri,
			"nama_pendeta_nikah" => $nama_pendeta_nikah,
			"tempat_nikah" => $tempat_nikah,
			"tanggal_nikah" => $tanggal_nikah,
			"foto" => $foto
		);
		$id = $this->ModelNikah->insertGetId($data);
		$this->session->set_flashdata('pesan', '<div
                        class="alert alert-success" role="alert">
                        Data Berhasil DiTambah!
                        </div>');
		redirect('nikah');
	}

	public function ubah($id)
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$nikah = $this->ModelNikah->getByPrimaryKey($id);
		$data = array (
			"nikah" => $nikah,
		);
		$this->load->view('content/nikah/v_update_nikah', $data);
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
			$nomor_surat_nikah = $this->input->post("nomor_surat_nikah", TRUE);
			$nama_pendeta_nikah = $this->input->post("nama_pendeta_nikah", TRUE);
			$tempat_nikah = $this->input->post("tempat_nikah", TRUE);
			$tanggal_nikah = $this->input->post("tanggal_nikah", TRUE);
			$id = $this->input->post("nik");
		}
		$data = array(
			"nomor_surat_nikah" => $nomor_surat_nikah,
			"nama_pendeta_nikah" => $nama_pendeta_nikah,
			"tempat_nikah" => $tempat_nikah,
			"tanggal_nikah" => $tanggal_nikah,
			"foto" => $foto
		);
		$id = $this->ModelNikah->update($id, $data);
		$this->session->set_flashdata('pesan', '<div
                        class="alert alert-success" role="alert">
                        Data Berhasil DiTambah!
                        </div>');
		redirect('nikah');
	}

	public function print()
	{
		$dataNikah['nikah'] = $this->ModelNikah->getAll();
		$this->load->view('content/nikah/print_nikah', $dataNikah);
	}

	public function delete()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$id = $this->input->post('id_nikah');
		$this->ModelNikah->delete($id);
		redirect('nikah');
		$this->load->view('templates/footer');
	}
}
