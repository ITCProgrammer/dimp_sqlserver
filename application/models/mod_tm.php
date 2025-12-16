<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mod_tm extends CI_Model{
	private $db2; //db2 untuk akses ke database sql server TM
	
	function __construct(){
        parent::__construct();
		$this->db2 = $this->load->database('TM',TRUE);

    }
	
	function get_joborders(){
		return $this->db2->get('joborders');
	}
	
	
}