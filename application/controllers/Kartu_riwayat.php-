<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kartu_riwayat extends CI_Controller{

    var $folder =   "kartu_riwayat";
    var $title = "Daftar Kartu Riwayat Mesin";
    var $titleNOW = "Daftar Kartu Riwayat Mesin NOW";
    public $db2;

    public function __construct() 
    {
        parent::__construct();
        $this->db2 = $this->load->database('inventorydit',TRUE);
    }
    
    public function index()
    {
        $data['title']  =  $this->title;
		
    	$this->template->load('template', $this->folder.'/view',$data);
    }

    public function cetak($id)
    {
        $data['title']  =  $this->title;
        $data['id'] = $id;
        $query = $this->db->query("SELECT * FROM dept_device WHERE id = '$id'")->row();
        
        $this->load->view('kartu_riwayat/print', $data);
    }

    public function index_NOW(){
        $data['title']  =  $this->titleNOW;
		
    	$this->template->load('template', $this->folder.'/viewNOW',$data);
    }

    public function cetak_NOW($kode_mesin)
    {
        $data['title']  =  $this->titleNOW;
        $data['kode_mesin'] = $kode_mesin;

        $this->load->view('kartu_riwayat/print_NOW', $data);
    }

    public function pemakaian_spare_parts(){
        $data['title']  =  "Form Pemakaian Spare Part DIT";
		
    	$this->template->load('template', $this->folder.'/pemakaian_sparepart',$data);
    }

    public function cetak_pemakaian_spare_part($kode_work_order, $InternalDocument = 'Tiket')
    {
        $data['title']              = "Form Pemakaian Spare Part DIT";
        $data['kode_work_order']    = $kode_work_order;
        $data['InternalDocument']   = $InternalDocument;

        $this->load->view('kartu_riwayat/print_pemakaian_spare_part', $data);
    }

    public function kartu_stock(){
        $data['title']  =  "Form Kartu Stok DIT";
		
    	$this->template->load('template', $this->folder.'/kartu_stok',$data);
    }
    
    public function laporan_open_tiket(){
        $data['title']  =  "Laporan Opentiket";
		
    	$this->template->load('template', $this->folder.'/laporan_opentiket',$data);
    }
    
    public function print_laporanstok(){
        $data['date1']      = $this->input->post('date1');
        $data['date2']      = $this->input->post('date2');
        $data['type']       = $this->input->post('type');
        $data['kategori']   = $this->input->post('kategori');

        if($this->input->post('kategori') == '1'){
            $this->load->view('kartu_riwayat/print_laporanstok1', $data);
        }elseif($this->input->post('kategori') == '2'){
            $this->load->view('kartu_riwayat/print_laporanstok2', $data);
        }elseif($this->input->post('kategori') == '3'){
            $this->load->view('kartu_riwayat/print_laporanstok3', $data);
        }
    }
    
    public function print_kartustok(){
        $data['kode_barang']    = $this->input->post('kode_barang');
        $data['date1']          = $this->input->post('date1');
        $data['date2']          = $this->input->post('date2');

        if($this->input->post('kode_barang') == 'All'){
            $this->load->view('kartu_riwayat/print_kartustok_all', $data);
        }else{
            $this->load->view('kartu_riwayat/print_kartustok', $data);
        }
    }
}