<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_event extends CI_Controller {

	
	public function index()
	{
		$data2['query']= $this->db->get('tb_event');
		$data['isi'] = $this->load->view('v_event', $data2, true);

		$this->load->view('main_view',$data);
	}

	
}
