<?php
class Type extends CI_Controller
{
    var $folder =   "type";
    var $tables =   "device_type";
    var $pk     =   "jenis_id";
    var $title  =   "Device Type";
    
    function __construct() {
        parent::__construct();
    }
    
    
    function index()
    {
        $data['title']=  $this->title;
        $data['desc']=""; 
        $data['record']=  $this->db->get($this->tables)->result();
	$this->template->load('template', $this->folder.'/view',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit']))
        {
           // info mesin
            $nama               =   $this->input->post('jenis');            
                        
            $infomesin       =   array(  'jenis'=>$nama                                           
                                            );
            
            
            $data               = $infomesin; //array_merge($orangtua,$kampus,$sekolah,$pribadi,$instansi,$institusi);
            $this->db->insert($this->tables,$data);
            redirect($this->uri->segment(1));
        }
        else
        {
            $data['title']  = $this->title;
            $data['desc']    =   "";
            $this->template->load('template', $this->folder.'/post',$data);
        }
    }
    
    function edit()
    {
        if(isset($_POST['submit']))
        {
            $id     = $this->input->post('id');
                        // infosupplier
            $nama               =   $this->input->post('jenis'); 
            
            $infomesin       =   array(  'jenis'=>$nama                                           
                                            );
            
            
            $data               =   $infomesin; // array_merge($orangtua,$kampus,$sekolah,$pribadi,$instansi,$institusi);
            $this->mcrud->update($this->tables,$data, $this->pk,$id);
            redirect($this->uri->segment(1));
        }
        else
        {
            $data['title']  = $this->title;
            $id          =  $this->uri->segment(3);
            $data['r']   =  $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
            $this->template->load('template', $this->folder.'/edit',$data);
        }
    }
    function delete()
    {
        $id     = $this->input->post('id');
        //$chekid = $this->db->get_where($this->tables,array($this->pk=>$id));
        //if($chekid>0)
       // {
            $this->mcrud->delete($this->tables,  $this->pk,  $this->uri->segment(3));
       // }
        redirect($this->uri->segment(1));
    }
    
    
   /* function status()
    {
        $id     =  $this->uri->segment(4);
        $status =  $this->uri->segment(3);
        if($status=='y')
        {
           $this->db->query("update akademik_tahun_akademik set status='n'"); 
        }
        $this->mcrud->update($this->tables,array('status'=>$status), $this->pk,$id);
        redirect($this->uri->segment(1));
    }*/
}