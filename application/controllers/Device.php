<?php
class Obat extends CI_Controller{
    
    var $folder =   "obat";
    var $tables =   "obat";
	var $tables2="leadtime";
    var $pk     =   "obat_id";
    var $title  =   "Daftar Obat";
    
    function __construct() {
        parent::__construct();
    }
    
    function index()
    {
        $data['title']  = $this->title;
        $data['desc']    =   "";        
        
			//$data['jnobat']=  $this->db->get($this->tables)->result();
			$this->db->from($this->tables);
			$this->db->order_by("jenis_id asc,deskripsi asc");
			$data['jnobat']=  $this->db->get()->result();
		
	$this->template->load('template', $this->folder.'/view',$data);
    }
    
    
    function post()
    {
        if(isset($_POST['submit']))
        {
            // data obat
            $nama   =   $this->input->post('nama');
            $kode   =   $this->input->post('kode');
            $jenis    =   $this->input->post('jenis');
            $safety    =   $this->input->post('safety');
            $packing=   $this->input->post('packing');
            $unit =   $this->input->post('unit');
            $cost =   $this->input->post('cost');
			$supplier =   $this->input->post('supplier');
			
            // leadtime
            //$obatid          =   $this->input->post('obatid');
            $leadid           =   $this->input->post('leadid');
            $keterangan     =   $this->input->post('keterangan');
            
            $dataobat   =   array(  'kode_obat'=>$kode,
                                'deskripsi'=>$nama,
                                'jenis_id'=>$jenis,
                                'safetystock'=>$safety,
                                'packing'=>$packing,
                                'unit'=>$unit,
                                'cost'=>$cost,
								'supplier_id'=>$supplier);
								
			$this->db->insert($this->tables,$dataobat);
			
			$q="select obat_id from obat order by obat_id desc limit 1";
			$d=$this->db->query($q)->result();
			
								foreach($d as $oid)
								{
									$obatid=$oid->obat_id;	
								}
								
            $datalead          =   array(  'obat_id'=>$obatid,
                                            'kode_leadtime'=>$leadid,
                                            'keterangan'=>$keterangan);
            $this->db->insert($this->tables2,$datalead);
            //$data               =array_merge($dataobat,$datalead);
           // $this->db->insert($this->tables,$data);
            $this->session->set_flashdata('pesan', "<div class='alert alert-success'>Data $nama Sudah Tersimpan </div>");
            redirect('obat/post');
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
             $nama   =   $this->input->post('nama');
            $kode   =   $this->input->post('kode');
            $jenis    =   $this->input->post('jenis');
            $safety    =   $this->input->post('safety');
            $packing=   $this->input->post('packing');
            $unit =   $this->input->post('unit');
            $cost =   $this->input->post('cost');
			$supplier =   $this->input->post('supplier');
            $dataobat   =   array(  'kode_obat'=>$kode,
                                'deskripsi'=>$nama,
                                'jenis_id'=>$jenis,
                                'safetystock'=>$safety,
                                'packing'=>$packing,
                                'unit'=>$unit,
                                'cost'=>$cost,
								'supplier_id'=>$supplier);
            $this->mcrud->update($this->tables,$dataobat, $this->pk,$id);
			
			$leadid           =   $this->input->post('leadid');
            $keterangan     =   $this->input->post('keterangan');
			$kdld=0;
			
			$q="Select * from leadtime where obat_id=$id";
			$d=$this->db->query($q)->result();
			foreach($d as $k)
			{
				$kdld=$k->obat_id;
			}
			if ($kdld > 0){
			
			$datalead          =   array(  'kode_leadtime'=>$leadid,
                                            'keterangan'=>$keterangan);
			$this->mcrud->update($this->tables2,$datalead, $this->pk,$id);
											
			}else{
					$datalead          =   array(  'obat_id'=>$id,
                                            'kode_leadtime'=>$leadid,
                                            'keterangan'=>$keterangan);
            $this->db->insert($this->tables2,$datalead);
			}
			
           // $data               =array_merge($orangtua,$kampus,$sekolah,$pribadi,$instansi,$institusi);
            
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
        $id     =  $_GET['id'];
        $this->mcrud->delete($this->tables,  $this->pk,  $id);
 		$this->mcrud->delete($this->tables2,  $this->pk,  $id);
    }
    
   
	
	
}