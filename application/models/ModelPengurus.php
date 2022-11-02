<?php

class ModelPengurus extends CI_Model
{
	var $table = "pengurus";
	var $primaryKey = "nik";

	// function untuk get all data pengurus
	public function getAll($method = '')
	{
		if($method == ''){
			return $this->db->get($this->table)->result();
		}elseif ($method == 'join'){
			$this->db->join('jemaat','jemaat.nik=pengurus.nik');
			return $this->db->get($this->table)->result();
		}
	}

	// function untuk get data by primary_key
	public function getByPrimaryKey($id)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->get($this->table)->row();
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function insertGetId($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($id, $data)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->update($this->table, $data);
	}

	public function delete($id)
	{
		return $this->db->where($this->primaryKey, $id)->delete($this->table);
	}
}
