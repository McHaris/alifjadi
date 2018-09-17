<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_galeri extends CI_Model {
	
	
	public function getGaleri()
	{
		
		$query = $this->db->get("tb_galeri");
		return $query;
	}
	
	public function detailGaleri($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('tb_galeri');
		return $query->row();
	}

	// modify db below
	public function addGaleri($data)
	{
		$this->db->insert("tb_galeri",$data);
	}

	function updateGaleri($id, $data)
	{
		$this->db->where('id',$id);
		$this->db->update("tb_galeri",$data);
	}
	
	public function deleteGaleri($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('tb_galeri');
	}
	
}
