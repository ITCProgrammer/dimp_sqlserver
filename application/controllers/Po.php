<?php
class Po extends CI_Controller
{
    var $folder =   "po";
    var $tables =   "purchase_orders";
	var $tables2 =   "stock_obat";
	var $tables3 =   "stock_in";
	var $tables4 =   "obat";
    var $pk     =   "po_id";
	var $pk2     =   "obat_id";
    var $title  =   "Purchase Order";
    
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
           // infoobat
            $nopo               =   $this->input->post('nopo');            
            $tglpesan             =   $this->input->post('tglpesan');
			 $tglmasuk             =   $this->input->post('tglmasuk');
            $obatid	            =   $this->input->post('obatid');
			$supplierid	            =   $this->input->post('supplierid');
            $qtypesan             =   $this->input->post('qtypesan');
			$qtymasuk             =   $this->input->post('qtymasuk');
			$qtysisapo            =   $this->input->post('qtysisapo');
			$cost            =   $this->input->post('cost');
            
            $datapo       =   array(  'no_po'=>$nopo,                                            
                                            'tgl_pesan'=>$tglpesan,
											'tgl_masuk'=>$tglmasuk,
                                            'obat_id'=> $obatid,
											'supplier_id'=> $supplierid,
											'qty_pesan'=>$qtypesan,
											'qty_masuk'=>$qtymasuk,
											'qty_sisapo'=> $qtysisapo,
											'cost'=> $cost);
											
			$this->db->insert($this->tables,$datapo);	
										
			//---baca data stock obat
			$q="select * from stock_obat where obat_id='$obatid'";
			$d=$this->db->query($q)->result();
			
							if (empty($d)){
								$stockobatid=$obatid;	
								$stockactual=$qtymasuk;
								$stockusage=0;								
								$datastock       =   array(  'obat_id'=>$stockobatid,                                          
                                            'actual_stock'=>$stockactual,                                            
											'usage_stock'=> $stockusage);			
								$this->db->insert($this->tables2,$datastock);
								
							}else{
								
								foreach($d as $oid)
								{
									$stockobatid=$oid->obat_id;	
									$stockactual=$oid->actual_stock;
									$stockactual=$stockactual + $qtymasuk;
									
									$datastock       =   array(                                             
											'actual_stock'=> $stockactual);
									
									$this->mcrud->update($this->tables2,$datastock, $this->pk2,$stockobatid);
								}			
							}
            
            //-------stock in
			$asal="PO No : ".$nopo."";
			 $datain       =   array(  'obat_id'=> $obatid,
											'tgl_masuk'=>$tglmasuk,
											'asal'=>$asal,
											'qty_masuk'=>$qtymasuk,
											'supplier_id'=> $supplierid);
											
			$this->db->insert($this->tables3,$datain);
            
			//---update data obat
			if ($cost > 0){
				$dataobat       =   array(  'cost'=> $cost,
											'supplier_id'=> $supplierid);
			}else{
				$dataobat       =   array(  'supplier_id'=> $supplierid);
			}
			$this->mcrud->update($this->tables4,$dataobat, $this->pk2,$obatid);
								
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
            $nama               =   $this->input->post('nama_supplier');            
            $alamat             =   $this->input->post('alamat');
            $telp	            =   $this->input->post('telp');
            $kontak             =   $this->input->post('kontak');
            
            $infosupplier       =   array(  'nama_supplier'=>$nama,                                            
                                            'alamat'=>$alamat,
                                            'telp'=> $telp,
											'kontak'=> $kontak);
            
            
            $data               =   $infosupplier; // array_merge($orangtua,$kampus,$sekolah,$pribadi,$instansi,$institusi);
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