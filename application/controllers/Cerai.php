<?php

class Cerai extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelCerai");
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
		$dataCerai = $this->ModelCerai->getAll('join');
		$data = array(
			"cerais" => $dataCerai
		);
		$this->load->view('content/cerai/v_list_cerai', $data);
		$this->load->view('templates/footer');
	}

	//untuk me load tampilan form tambah baptis
	public function tambah()
	{
		$this->db->where('jenis_kelamin_jemaat','Laki-Laki');
		$data['jemaatpria'] = $this->db->get('jemaat')->result_array();
		$this->db->where('jenis_kelamin_jemaat','Perempuan');
		$data['jemaatwanita'] = $this->db->get('jemaat')->result_array();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar');
		$this->load->view("content/cerai/v_add_cerai");
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
			$nomor_surat_cerai = $this->input->post("nomor_surat_cerai", TRUE);
			$nik = $this->input->post("nik", TRUE);
			$nik_istri = $this->input->post("nik_istri", TRUE);
			$tanggal_cerai = $this->input->post("tanggal_cerai", TRUE);
			$tempat_cerai = $this->input->post("tempat_cerai", TRUE);
			$alasan_cerai = $this->input->post("alasan_cerai", TRUE);
		}
		$data = array(
			"nomor_surat_cerai" => $nomor_surat_cerai,
			"nik" => $nik,
			"nik_istri" => $nik_istri,
			"tanggal_cerai" => $tanggal_cerai,
			"tempat_cerai" => $tempat_cerai,
			"alasan_cerai" => $alasan_cerai,
			"foto" => $foto
		);
		$id = $this->ModelCerai->insertGetId($data);
		$this->session->set_flashdata('pesan', '<div
                        class="alert alert-success" role="alert">
                        Data Berhasil DiTambah!
                        </div>');
		redirect('cerai');
	}

	public function ubah($id)
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$cerai = $this->ModelCerai->getByPrimaryKey($id);
		$data = array (
			"cerai" => $cerai,
		);
		$this->load->view('content/cerai/v_update_cerai', $data);
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
			$nomor_surat_cerai = $this->input->post("nomor_surat_cerai", TRUE);
			$tanggal_cerai = $this->input->post("tanggal_cerai", TRUE);
			$tempat_cerai = $this->input->post("tempat_cerai", TRUE);
			$alasan_cerai = $this->input->post("alasan_cerai", TRUE);
			$id = $this->input->post("id_cerai");
		}
		$data = array(
			"nomor_surat_cerai" => $nomor_surat_cerai,
			"tanggal_cerai" => $tanggal_cerai,
			"tempat_cerai" => $tempat_cerai,
			"alasan_cerai" => $alasan_cerai,
			"foto" => $foto
		);
		$id = $this->ModelCerai->update($id, $data);
		$this->session->set_flashdata('pesan', '<div
                        class="alert alert-success" role="alert">
                        Data Berhasil DiTambah!
                        </div>');
		redirect('cerai');
	}

	public function print()
	{
		$dataCerai['cerai'] = $this->ModelCerai->getAll();
		$this->load->view('content/cerai/print_cerai', $dataCerai);
	}

	public function delete()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$id = $this->input->post('id_cerai');
		$this->ModelCerai->delete($id);
		redirect('cerai');
		$this->load->view('templates/footer');
	}
}
