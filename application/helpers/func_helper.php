<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed');

	function clrtext($param)
	{
		$ci = &get_instance();
		return $ci->security->sanitize_filename($param, TRUE);
		
		//$str = filter_var(addslashes(htmlspecialchars(strip_tags(trim($param),""), ENT_QUOTES, 'UTF-8')), FILTER_SANITIZE_STRING);

		// SINGLE QUOTE
		//if (strpos($str, '&#039;') !== false) {
		//	$str = addslashes(str_replace("&#039;","'",$str));
		//} 

		//return $str;
	}

	function upload($title, $folder, $tmpname)
	{
		$result    =  move_uploaded_file($tmpname, $folder . $title);

		return true;
	}

	function getStatusInvoice($id, $bkt="", $cmt="")
	{
		if($id == '1' && $bkt == "")
		{
			$status = "Menunggu proses pembayaran.";
			
		} 
		else if($id == '1' && $bkt != "")
		{
			$status = "Pembayaran sedang dikonfirmasi.";	
		}
		else if($id == '2')
		{

			$status = "Bukti pembayaran tidak valid.";	

		}
		else if($id == '5')
		{
			$status = "Pesanan sedang diproses.";	
		}
		else if($id == '10')
		{
			$status = "Pesanan sedang dikirim.";	
		}
		else if($id == '15')
		{
			$status = "Pesanan sudah diterima.";	
		}

		return $status;

	}

	function title_invoice()
	{
		return "INV";

	}

	function current_link()
	{
		$current_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

		return $current_link;

	}

	function base_url_product()
	{
		return base_url()."uploads/product/";
	}

	function path_product()
	{
		return "../dapoermama/uploads/product/";
	}

	function base_url_buktitrf()
	{
		return base_url()."uploads/bukti_trf/";
	}

	function path_buktitrf()
	{
		return "uploads/bukti_trf/";
	}

	function clear_modal()
	{
		$ci = &get_instance();

		$ci->session->set_flashdata('act', '');
		$ci->session->set_flashdata('msg', '');
		$ci->session->set_flashdata('act_modal', '');
		$ci->session->set_flashdata('msg_modal', '');

		return '';
	}
	
	function format_rupiah($angka)
    {
    	$jumlah_desimal 	="0";
		$pemisah_desimal 	=",";
		$pemisah_ribuan 	=".";
		$rp 				= "".$angka."";

		$hasil				 = number_format($rp, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan);

		return 'Rp'.$hasil.',-';
	}

	function csrf_validate($csrf=FALSE)
    {
    	$ci = &get_instance();

    	if($csrf == TRUE)
		{
	    	if(isset($_POST['submit']))
			{
				if(isset($_POST[''. $ci->session->userdata('csrf_name') .'']))
				{
					if($_POST[''. $ci->session->userdata('csrf_name') .''] != $ci->session->userdata('csrf_value'))
					{
						echo "The action you have requested is not allowed.";
						exit;
					}
					else
					{
						get_csrf_name();
						get_csrf_value();		
					}
				}
				else
				{
					echo "The action you have requested is not allowed.";
					exit;
				}
			}
			else
			{
				get_csrf_name();
				get_csrf_value();
			}

		}
	}

	function get_csrf_name()
	{
		$ci = &get_instance();

		$csrf = md5(rand());

		$ci->session->set_userdata('csrf_name', $csrf);

		return '';
	}

	function get_csrf_value()
	{
		$ci = &get_instance();

		$csrf = md5(rand());

		$ci->session->set_userdata('csrf_value', $csrf);

		return '';
	}

	function get_client_ip()
	{
	    $ipaddress = '';
	    if (getenv('HTTP_CLIENT_IP'))
	        $ipaddress = getenv('HTTP_CLIENT_IP');
	    else if(getenv('HTTP_X_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	    else if(getenv('HTTP_X_FORWARDED'))
	        $ipaddress = getenv('HTTP_X_FORWARDED');
	    else if(getenv('HTTP_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_FORWARDED_FOR');
	    else if(getenv('HTTP_FORWARDED'))
	       $ipaddress = getenv('HTTP_FORWARDED');
	    else if(getenv('REMOTE_ADDR'))
	        $ipaddress = getenv('REMOTE_ADDR');
	    else
	        $ipaddress = 'UNKNOWN';
	    return $ipaddress;
	}
	
	function getMonthbyNumber($num)
	{
		if($num == "1")
		{
			return "JAN";
		}
		else if($num == "2")
		{
			return "FEB";
		}
		else if($num == "3")
		{
			return "MAR";
		}
		else if($num == "4")
		{
			return "APR";
		}
		else if($num == "5")
		{
			return "MEY";
		}
		else if($num == "6")
		{
			return "JUN";
		}
		else if($num == "7")
		{
			return "JUL";
		}
		else if($num == "8")
		{
			return "AUG";
		}
		else if($num == "9")
		{
			return "SEP";
		}
		else if($num == "10")
		{
			return "OCT";
		}
		else if($num == "11")
		{
			return "NOV";
		}
		else if($num == "12")
		{
			return "DEC";
		}
	}
	
	function getMonthbyWord($num)
	{
		if($num == "JAN")
		{
			return "1";
		}
		else if($num == "FEB")
		{
			return "2";
		}
		else if($num == "MAR")
		{
			return "3";
		}
		else if($num == "APR")
		{
			return "4";
		}
		else if($num == "MEY")
		{
			return "5";
		}
		else if($num == "JUN")
		{
			return "6";
		}
		else if($num == "JUL")
		{
			return "7";
		}
		else if($num == "AUG")
		{
			return "8";
		}
		else if($num == "SEP")
		{
			return "9";
		}
		else if($num == "OCT")
		{
			return "10";
		}
		else if($num == "NOV")
		{
			return "11";
		}
		else if($num == "DEC")
		{
			return "12";
		}
	}
	
	/*get Current date and time*/
	function getCurDatetime()
	{
		$my_t = getdate(date("U"));
		
		$dd = $my_t[mday];
		if(strlen($dd) < 2) $dd = "0" . $dd;
		
		$dmon = $my_t[mon];
		if(strlen($dmon) < 2) $dmon = "0" . $dmon ;
		
		$dyear = $my_t[year];
	
		$dh = $my_t[hours];
		if(strlen($dh) < 2) $dh = "0" . $dh;

		$dm = $my_t[minutes];
		if(strlen($dm) < 2) $dm = "0" . $dm;
		
		$ds = $my_t[seconds];
		if(strlen($ds) < 2)$ds = "0" . $ds;
		
		$final =  $dyear . "-" . $dmon . "-" . $dd  . " " . $dh . ":" . $dm . ":" . $ds;
		return $final;
		
	}
	
	function getCurDate()
	{
		$my_t = getdate(date("U"));
		
		$dd = $my_t[mday];
		if(strlen($dd) < 2) $dd = "0" . $dd;
		
		$dmon = $my_t[mon];
		if(strlen($dmon) < 2) $dmon = "0" . $dmon ;
		
		$dyear = $my_t[year];
		
		$final =  $dyear . "-" . $dmon . "-" . $dd ;
		return $final;
		
	}
	
	function getCurDateShort()
	{
		$my_t = getdate(date("U"));
		
		$dd = $my_t[mday];
		if(strlen($dd) < 2) $dd = "0" . $dd;
		
		$dmon = $my_t[mon];
		if(strlen($dmon) < 2) $dmon = "0" . $dmon ;
		
		$dyear = $my_t[year];
		
		$final =  $dd . $dmon . substr($dyear, -2) ;
		return $final;
		
	}
	
	function getCurTime()
	{
		$my_t = getdate(date("U"));
	
		$dh = $my_t[hours];
		if(strlen($dh) < 2) $dh = "0" . $dh;

		$dm = $my_t[minutes];
		if(strlen($dm) < 2) $dm = "0" . $dm;
		
		$ds = $my_t[seconds];
		if(strlen($ds) < 2)$ds = "0" . $ds;
		
		$final =  $dh . ":" . $dm . ":" . $ds;
		return $final;
		
	}
	
	
	function get_first_image($param) 
	{
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $param, $matches);
		if($matches) {
			$first_img = $matches[1][0];
		}
	
		if(empty($first_img)){ //Defines a default image
			$first_img = "/images/default.jpg";
		}
		return $first_img;
	}

	function xmlToObject($xml, $tag = 'feas:FeasibilityDeviceResponse', $strip = 'feas:') {
		$offset = strpos($xml, $tag);
		if ($offset !== false) {
			$xml = '<?xml version="1.0" encoding="utf-8"?>' . substr($xml, $offset-1);
			$offset = strrpos($xml, '/' . $tag);
			if ($offset !== false) {
				$xml = substr($xml, 0, $offset-1) . '</' . $tag . '>';
				if ($strip) {
					$xml = str_replace($strip, '', $xml);
				}
			}
		}

		if ($x = @simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOWARNING)) {
			return $x;
		}

		return false;
	}
	
	function page($total,$uri,$limit,$uri_segment,$numlink=2) 
	{
		$ci = &get_instance();
		$ci->load->library('pagination');
		$config['base_url'] = base_url().$uri;
		$config['class_link'] = 'paging';
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;
		$config['uri_segment'] = $uri_segment;
		$config['num_links'] = $numlink;
		$config['full_tag_open'] = '<ul class="pagination">';
	
		$config['first_tag_open'] = '<li>';
		$config['first_link'] = '<i class="fa fa-angle-double-left"></i>';//'FIRST';
		$config['first_tag_close'] = '</li>';
	
		$config['next_tag_open'] = '<li>';
		$config['next_link'] = '<i class="fa fa-angle-right"></i>';//'NEXT';
		$config['next_tag_close'] = '</li>';
	
		$config['num_tag_open'] = '<li>';
	
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
	
		$config['num_tag_close'] = '</li>';
	
		$config['prev_tag_open'] = '<li>';
		$config['prev_link'] = '<i class="fa fa-angle-left"></i>';//'PREV';
		$config['prev_tag_close'] = '</li>';
	
		$config['last_tag_open'] = '<li>';
		$config['last_link'] = '<i class="fa fa-angle-double-right"></i>';//'LAST';
		$config['last_tag_close'] = '</li>';
	
		$config['full_tag_close'] = '</ul>';
		$config['use_page_numbers'] = TRUE;
		$ci->pagination->initialize($config);
		return $ci->pagination->create_links();
	}
	
	function convert_date_indo($param) {

		$datenow = date('Y-m-d');

	

		$datetime =  date('w d n Y',strtotime($param));

		list($hari,$tanggal,$bulan,$tahun) = explode(' ',$datetime);

	

		return hari_indo($hari).', '.$tanggal.' '.bulan_indo($bulan).' '.$tahun;

	}

	function convert_date_myih($param) {

		$datenow = date('Y-m-d');

	

		$datetime =  date('w d n Y H i',strtotime($param));

		list($hari,$tanggal,$bulan,$tahun,$jam,$menit) = explode(' ',$datetime);

	

		return hari_indo($hari).', '.$tanggal.' '.bulan_indo($bulan).' '.$tahun .' '. $jam .':'.$menit;

	}

	function convert_date_inbox($param) {

		$datenow = date('Y-m-d');

	

		$datetime =  date('w d n Y H i',strtotime($param));

		list($hari,$tanggal,$bulan,$tahun,$jam,$menit) = explode(' ',$datetime);

	

		return hari_indo($hari).', '.$tanggal.' '.bulan_indo($bulan).' '.$tahun .' '. $jam .':'.$menit;

	}
	
	function hari_indo($param) {

		$hari = array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');

		return $hari[$param];
	}
	
	function bulan_indo($param) {
		$bulan = array(1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
		return $bulan[$param];
	}


?>