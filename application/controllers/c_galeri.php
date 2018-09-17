<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_galeri extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('m_galeri');				
		// // do your validations
		// while(!$this->session->userdata('loggedin'))
		// {
		// 	redirect(base_url('login'));
		// }
	}
	public function index()
	{
		$id='1';
		$query['query']=$this->db->get('tb_galeri');

		$query['row'] = $this->m_galeri->detailGaleri($id);
		$data['isi'] = $this->load->view('v_galeri', $query, true);

		$this->load->view('main_view',$data);
	}
}
