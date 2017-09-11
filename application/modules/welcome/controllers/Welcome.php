<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		echo 'ok';
		 $this->db->where('id',$status);
				   $res = $this->db->get('status');
		echo $this->db->last_query();
		
		
		// $this->load->view('users/welcome_message');
	}
	
	public function get_data()
	{
		$action = @$_GET['action'];
		
		if($action == 'get_table'){
			$query = "SHOW DATABASES";        
			$res = $this->db->query($query);
			$res = $res->result();
			
			$query2 = "";
			foreach($res as $r)
			{
				$query = "show tables from ".$r->Database;
				$res2 = $this->db->query($query);
				$res2 = $res2->result();
				$temp[$r->Database]= $res2;
			}
			
			echo '<pre>';
			print_r($temp);
		}
	}
}
