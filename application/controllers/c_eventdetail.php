<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_eventdetail extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('m_eventdetail');
		// do your validations
		// while($this->session->userdata('userlevel')!="1")
		// {
		// 	redirect(base_url('login'));
		// }
	}
	
	public function index($id)
	{
		$this->db->get('tb_event');

		$query['row'] = $this->m_eventdetail->detailEvent($id);
		$data['isi'] = $this->load->view('v_eventdetail', $query, TRUE);

		$this->load->view('main_view',$data);
	}

	public function save($id){
		$data = array(
					'komen'=> $this->input->post('komen'),
					'id_event' => $id);
		$this->db->insert('tb_komentar',$data);
		redirect(base_url().'c_eventdetail/index/'.$id);
	}

	
}
