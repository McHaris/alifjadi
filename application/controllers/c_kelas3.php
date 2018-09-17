<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_kelas3 extends CI_Controller {

	
	public function index()
	{
		$data['isi'] = $this->load->view('v_kelas3', '', true);

		$this->load->view('main_view',$data);
	}
}
