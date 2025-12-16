<?php
class Dimp extends CI_Controller{
    
    var $folder =   "dimp";
    var $tables =   "dept_device";
	//var $tables2="leadtime";
    var $pk     =   "id";
    var $title  =   "Daftar Induk Mesin";
    
    function __construct() {
        parent::__construct();
    }
    
    function index()
    {
        $data['title']  = $this->title;
        $data['desc']    =   "";        
        
			//$data['jnobat']=  $this->db->get($this->tables)->result();
			$this->db->from($this->tables);
			$this->db->order_by("dept_code asc,device_code asc");
			$data['jnobat']=  $this->db->get()->result();
		
	$this->template->load('template', $this->folder.'/view',$data);
    }
    
    
    function post()
    {
        if(isset($_POST['submit']))
        {
            // data 
            $devicetype   =   $this->input->post('devicetype');
            $deptcode   =   $this->input->post('deptcode');
            $devicecode    =   $this->input->post('devicecode');
            $merk    =   $this->input->post('merk');
            $type=   $this->input->post('type');
            $pcconnect =   $this->input->post('pcconnect');
            $madein =   $this->input->post('madein');
			$productionyear =   $this->input->post('productionyear');
			$sn   =   $this->input->post('sn');
			$capacity   =   $this->input->post('capacity');
			$mbmerk   =   $this->input->post('mbmerk');
			$mbtype   =   $this->input->post('mbtype');
			$prosesormerk   =   $this->input->post('prosesormerk');
			$prosesortype   =   $this->input->post('prosesortype');
			$rammerk   =   $this->input->post('rammerk');
			$ramspec   =   $this->input->post('ramspec');
			$ramgb   =   $this->input->post('ramgb');
			$hddmerk   =   $this->input->post('hddmerk');
			$hddspec   =   $this->input->post('hddspec');
			$hddgb   =   $this->input->post('hddgb');
			
			$os   =   $this->input->post('os');
			$oslicense   =   $this->input->post('oslicense');
			$officesoft   =   $this->input->post('officesoft');
			$officelicense   =   $this->input->post('officelicense');
			$othersoft   =   $this->input->post('othersoft');
			$antivirus   =   $this->input->post('antivirus');
			$avlicense  =   $this->input->post('avlicense');
			
			$namapengguna   =   $this->input->post('namapengguna');
			$compname   =   $this->input->post('compname');
			
			$ipadd   =   $this->input->post('ipadd');
			$macadd   =   $this->input->post('macadd');
			$email   =   $this->input->post('email');
			$location   =   $this->input->post('location');
			
            $bppno           =   $this->input->post('bppno');
            $keterangan     =   $this->input->post('keterangan');
            
            $data   =   array(  'type_id'=>$devicetype,
                                'dept_code'=>$deptcode,
                                'device_code'=>$devicecode,
								'merk'=>$merk,
								'type'=>$type,
                                'pc_connect'=>$pcconnect,
                                'madein'=>$madein,
                                'production_year'=>$productionyear,
                                'sn'=>$sn,
								'capacity'=>$capacity,
								'mb_merk'=>$mbmerk,
								'mb_type'=>$mbtype,
								'prosesor_merk'=>$prosesormerk,
								'prosesor_spec'=>$prosesortype,
								'ram_merk'=>$rammerk,
								'ram_spec'=>$ramspec,
								'ram_gb'=>$ramgb,
								'hdd_merk'=>$hddmerk,
								'hdd_spec'=>$hddspec,
								'hdd_gb'=>$hddgb,
								'os'=>$os,
								'os_license'=>$oslicense,
								'office_software'=>$officesoft,
								'office_license'=>$officelicense,
								'other_software'=>$othersoft,
								'antivirus'=>$antivirus,
								'av_license'=>$avlicense,
								'nama_pengguna'=>$namapengguna,
								'computer_name'=>$compname,
								'ip_address'=>$ipadd,
								'mac_address'=>$macadd,
								'email_address'=>$email,
								'location'=>$location,
								'bpp_no'=>$bppno,
								'keterangan'=>$keterangan);
								
			$this->db->insert($this->tables,$data);
			
			
            $this->session->set_flashdata('pesan', "<div class='alert alert-success'>Data $devicecode Sudah Tersimpan </div>");
            redirect('dimp/post');
        }
        else
        {
            $data['title']=  $this->title;
            $data['desc']="";
            $this->template->load('template', $this->folder.'/post',$data);
        }
    }
    
    function edit()
    {
        if(isset($_POST['submit']))
        {
            $id     =   $this->input->post('id');
            
			$devicetype   =   $this->input->post('devicetype');
            $deptcode   =   $this->input->post('deptcode');
            $devicecode    =   $this->input->post('devicecode');
            $merk    =   $this->input->post('merk');
            $type=   $this->input->post('type');
            $pcconnect =   $this->input->post('pcconnect');
            $madein =   $this->input->post('madein');
			$productionyear =   $this->input->post('productionyear');
			$sn   =   $this->input->post('sn');
			$capacity   =   $this->input->post('capacity');
			$mbmerk   =   $this->input->post('mbmerk');
			$mbtype   =   $this->input->post('mbtype');
			$prosesormerk   =   $this->input->post('prosesormerk');
			$prosesortype   =   $this->input->post('prosesortype');
			$rammerk   =   $this->input->post('rammerk');
			$ramspec   =   $this->input->post('ramspec');
			$ramgb   =   $this->input->post('ramgb');
			$hddmerk   =   $this->input->post('hddmerk');
			$hddspec   =   $this->input->post('hddspec');
			$hddgb   =   $this->input->post('hddgb');
			
			$os   =   $this->input->post('os');
			$oslicense   =   $this->input->post('oslicense');
			$officesoft   =   $this->input->post('officesoft');
			$officelicense   =   $this->input->post('officelicense');
			$othersoft   =   $this->input->post('othersoft');
			$antivirus   =   $this->input->post('antivirus');
			$avlicense  =   $this->input->post('avlicense');
			
			$namapengguna   =   $this->input->post('namapengguna');
			$compname   =   $this->input->post('compname');
			
			$ipadd   =   $this->input->post('ipadd');
			$macadd   =   $this->input->post('macadd');
			$email   =   $this->input->post('email');
			$location   =   $this->input->post('location');
			
            $bppno           =   $this->input->post('bppno');
            $keterangan     =   $this->input->post('keterangan');
            
            $data   =   array(  'type_id'=>$devicetype,
                                'dept_code'=>$deptcode,
                                'device_code'=>$devicecode,
								'merk'=>$merk,
								'type'=>$type,
                                'pc_connect'=>$pcconnect,
                                'madein'=>$madein,
                                'production_year'=>$productionyear,
                                'sn'=>$sn,
								'capacity'=>$capacity,
								'mb_merk'=>$mbmerk,
								'mb_type'=>$mbtype,
								'prosesor_merk'=>$prosesormerk,
								'prosesor_spec'=>$prosesortype,
								'ram_merk'=>$rammerk,
								'ram_spec'=>$ramspec,
								'ram_gb'=>$ramgb,
								'hdd_merk'=>$hddmerk,
								'hdd_spec'=>$hddspec,
								'hdd_gb'=>$hddgb,
								'os'=>$os,
								'os_license'=>$oslicense,
								'office_software'=>$officesoft,
								'office_license'=>$officelicense,
								'other_software'=>$othersoft,
								'antivirus'=>$antivirus,
								'av_license'=>$avlicense,
								'nama_pengguna'=>$namapengguna,
								'computer_name'=>$compname,
								'ip_address'=>$ipadd,
								'mac_address'=>$macadd,
								'email_address'=>$email,
								'location'=>$location,
								'bpp_no'=>$bppno,
								'keterangan'=>$keterangan);
			
			$this->mcrud->update($this->tables,$data, $this->pk,$id);			
            
            redirect($this->uri->segment(1));
        }
        else
        {
            $data['title']=  $this->title;
            $data['desc']="";
            $id          =  $this->uri->segment(3);
            $data['r']   =  $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
            $this->template->load('template', $this->folder.'/edit',$data);
        }
    }
    function delete()
    {
        $id     =  $this->input->post('id');
        $this->mcrud->delete($this->tables,  $this->pk,  $id);
 		//$this->mcrud->delete($this->tables2,  $this->pk,  $id);
		redirect($this->uri->segment(1));
    }
    
   function cetak()
    {
		$id          =  $this->uri->segment(3);
		
		$data['r']   =  $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
		
        $this->load->view('dimp/print',$data);
    }
	
	
}