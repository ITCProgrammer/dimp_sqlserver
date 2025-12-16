<?php
class Lampiran extends CI_Controller
{

    var $folder =   "lampiran";
    var $tables =   "departments";
    //var $tables2="leadtime";
    var $pk     =   "code";
    var $title  =   "Lampiran DIMP Departments";

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['title']  = $this->title;
        $data['desc']    =   "";

        //$data['jnobat']=  $this->db->get($this->tables)->result();
        $this->db->from($this->tables);
        $this->db->order_by("code asc");
        $data['record'] =  $this->db->get()->result();

        $this->template->load('template', $this->folder . '/post', $data);
    }


    function cetak()
    {
        $depcode = $this->input->post('deptcode');

        $sql = "SELECT id, type_id,dept_code,device_code,merk,type,pc_connect,mb_merk,prosesor_spec,
				nama_pengguna,computer_name,ip_address,mac_address,email_address,ram_gb,ram_spec,hdd_gb,mb_type,os 
				FROM dept_device WHERE dept_code='$depcode' AND type_id < '19' ORDER BY type_id,device_code";
        $data['record'] = $this->db->query($sql)->result();
        $data['dept'] = $depcode;

        $this->load->view('lampiran/print', $data);
    }

    function cetakGet($depcode = "")
    {
        $sql = "SELECT * FROM dept_device WHERE dept_code='$depcode' AND type_id < '19' ORDER BY type_id,device_code";
        $data['record'] = $this->db->query($sql)->result();
        $data['dept'] = $depcode;

        $this->load->view('lampiran/print_mkti', $data);
    }
    
    function cetakGet_NOW($depcode = "")
    {
        $data['dept'] = $depcode;

        $this->load->view('lampiran/print_mkti_now', $data);
    }
}
