<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_main extends CI_Controller {

	
	public function index()
	{
		$data['isi'] = $this->load->view('v_main', '', true);

		$this->load->view('main_view',$data);
	}
}
