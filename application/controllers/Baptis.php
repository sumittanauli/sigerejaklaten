<?php

class Baptis extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelBaptis");
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
		$dataBaptis = $this->ModelBaptis->getAll("join");
		$data = array(
			"baptiss" => $dataBaptis
		);
		$this->load->view('content/baptis/v_list_baptis', $data);
		$this->load->view('templates/footer');
	}

	//untuk me load tampilan form tambah baptis
	public function tambah()
	{
		$data['jemaat'] = $this->db->get('jemaat')->result_array();
		$data['pendeta'] = $this->db->get('pendeta')->result_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar');
		$this->load->view("content/baptis/v_add_baptis");
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
				$nomor_surat_baptis = $this->input->post("nomor_surat_baptis", TRUE);
				$nik = $this->input->post("nik", TRUE);
				$id_pendeta = $this->input->post("id_pendeta", TRUE);
				$tempat_baptis = $this->input->post("tempat_baptis", TRUE);
				$tanggal_baptis = $this->input->post("tanggal_baptis", TRUE);
			}
		$data = array(
			"nomor_surat_baptis" => $nomor_surat_baptis,
			"nik" => $nik,
			"id_pendeta" => $id_pendeta,
			"tempat_baptis" => $tempat_baptis,
			"tanggal_baptis" => $tanggal_baptis,
			"foto" => $foto
		);
		$id = $this->ModelBaptis->insertGetId($data);
		$this->session->set_flashdata('pesan', '<div
                        class="alert alert-success" role="alert">
                        Data Berhasil DiTambah!
                        </div>');
		redirect('baptis');
	}

	public function ubah($id)
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$baptis = $this->ModelBaptis->getByPrimaryKey($id);
		$data = array (
			"baptis" => $baptis,
		);
		$this->load->view('content/baptis/v_update_baptis', $data);
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
				$nomor_surat_baptis = $this->input->post("nomor_surat_baptis", TRUE);
				$nik = $this->input->post("nik", TRUE);
				$tempat_baptis = $this->input->post("tempat_baptis", TRUE);
				$tanggal_baptis = $this->input->post("tanggal_baptis", TRUE);
				$id = $this->input->post("nik");
			}
		$data = array(
			"nomor_surat_baptis" => $nomor_surat_baptis,
			"nik" => $nik,
			"tempat_baptis" => $tempat_baptis,
			"tanggal_baptis" => $tanggal_baptis,
			"foto" => $foto
		);
		$id = $this->ModelBaptis->update($id, $data);
		$this->session->set_flashdata('pesan', '<div
                        class="alert alert-success" role="alert">
                        Data Berhasil DiTambah!
                        </div>');
		redirect('baptis');
	}

	public function print()
	{
		$dataBaptis['baptis'] = $this->ModelBaptis->getAll();
		$this->load->view('content/baptis/print_baptis', $dataBaptis);
	}

	public function delete()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$id = $this->input->post('id_baptis');
		$this->ModelBaptis->delete($id);
		redirect('baptis');
		$this->load->view('templates/footer');
	}
}


//	public function getDataById()
//	{
//		$this->db->select('*');
//		$this->db->from('jemaat');
//		$this->db->join('table_join', 'baptis.id_jemaat = table_join.id_jemaat');
//		$this->db->get($baptis);
//	}
