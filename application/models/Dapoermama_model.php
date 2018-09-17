<?php
class Dapoermama_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
    
	
	function getProduct_home()
	{
		$this->db->where("status", 1);
		$this->db->order_by("jumlah_dibeli", "ASC");

		$query	= $this->db->get("produk", 3);

		return $query;
	}

	function getProduct_product($key="")
	{
		if($key != "")
		{
			$this->db->like('nama', $key);
		}
		$this->db->where("status", 1);
		$this->db->order_by("tgl_post", "DESC");

		$query	= $this->db->get("produk");

		return $query;
	}

	function getProduct($key)
	{
		$this->db->where("key", $key);
		$query	= $this->db->get("produk");

		return $query;
	}

	function getProductById($id)
	{
		$this->db->where("id_produk", $id);
		$query	= $this->db->get("produk");

		return $query;
	}

	function getUser($email)
	{
		$this->db->where('email', $email);

		$query = $this->db->get('user');
		
		return $query;
	}

	function cekUser($email, $handphone)
	{
		$this->db->where('email', $email);
		$this->db->or_where('handphone', $handphone);

		$query = $this->db->get('user');
		
		return $query;
	}

	function cekUserByHp($handphone)
	{
		$this->db->where('handphone', $handphone);

		$query = $this->db->get('user');
		
		return $query;
	}

	function cekLogin($email, $password)
	{
		$this->db->where('email', $email);
		$this->db->where('password', $password);

		$query = $this->db->get('user');
		
		return $query;
	}

	function insert($table, $param=array())
	{
		$query = $this->db->insert($table, $param);
		
		return $query;
	}

	function update($table, $param=array(), $email)
	{
		$this->db->where('email', $email);
		$query = $this->db->update($table, $param);
		
		return $query;
	}

	function updateInvoice($table, $param=array(), $id)
	{
		$this->db->where('id_invoice', $id);
		$query = $this->db->update($table, $param);
		
		return $query;
	}


	function getInoviceById($id, $email)
	{
		$this->db->where("id_invoice", $id);
		$this->db->where("email", $email);
		$query	= $this->db->get("invoice");

		return $query;
	}

	function getInvoiceUnsuccessByEmail($email)
	{
		$wr = " status != '15'";

		$this->db->where($wr);
		$this->db->where("email", $email);
		$query	= $this->db->get("invoice");

		return $query;
	}

	function getInvoiceSuccessByEmail($email)
	{
		$wr = " status = '15'";

		$this->db->where($wr);
		$this->db->where("email", $email);
		$query	= $this->db->get("invoice");

		return $query;
	}

	
}