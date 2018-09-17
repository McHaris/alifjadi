<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_eventdetail extends CI_Model {
    
    public function addEvent($data)
    {
        $this->db->insert("tb_event",$data);
    }

	public function getEvent()
	{
		$query = $this->db->get("tb_event");
        return $query;
    }

	function updateEvent($id, $data)
	{
		$this->db->where('id',$id);
		$this->db->update("tb_event",$data);
    }
    
    public function detailEvent($id)
    {
        $this->db->where('id', $id);
		$query = $this->db->get('tb_event');
        return $query->row();
    }

	public function deleteEvent($id)
	{		
		$this->db->where('id',$id);
		$this->db->delete('tb_event');	
	}

}
