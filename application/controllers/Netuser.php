<?php
class Netuser extends CI_Controller{
    
    var $folder =   "netuser";
    var $tables =   "departments";
	//var $tables2="leadtime";
    var $pk     =   "code";
    var $title  =   "Daftar Pengguna Jaringan";
    
    function __construct() {
        parent::__construct();
    }
    
    function index()
    {
        $data['title']  = $this->title;
        $data['desc']    =   "";        
        
			//$data['jnobat']=  $this->db->get($this->tables)->result();
			$this->db->from($this->tables);
			$this->db->order_by("code asc");
			$data['record']=  $this->db->get()->result();
		
	$this->template->load('template', $this->folder.'/post',$data);
    }
    
    
   function cetak()
    {
		//$id          =  $this->uri->segment(3);
		$depcode=$this->input->post('deptcode');
		
		//$data['r']   =  $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
		if ($depcode=="ALL"){
			$sql="select id, type_id,dept_code,device_code,merk,type,pc_connect,mb_merk,prosesor_spec,
				nama_pengguna,computer_name,ip_address,mac_address,ram_gb,ram_spec,hdd_gb,mb_type,os,location,keterangan,email_address 
				from dept_device where type_id < '3' order by type_id,device_code";
		}else{
			$sql="select id, type_id,dept_code,device_code,merk,type,pc_connect,mb_merk,prosesor_spec,
				nama_pengguna,computer_name,ip_address,mac_address,ram_gb,ram_spec,hdd_gb,mb_type,os,location,keterangan,email_address 
				from dept_device where dept_code='$depcode' and type_id < '3' order by type_id,device_code";
		}
			
		
		$data['record']=$this->db->query($sql)->result();
		//$data['dept']=$depcode;
		
        $this->load->view('netuser/netuser',$data);
    }
	
	
}