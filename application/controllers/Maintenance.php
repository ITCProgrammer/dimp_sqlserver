<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maintenance extends CI_Controller
{
   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Maintenance/Mtc_model','MTC');
        $this->load->library('Response','response');
        $this->response->setHTTPStatusCode(201);
    }
    // Laporan Stock Opname MTC
    public function stock_opname_mtc()
    {
        $data['title'] = "DATA STOCK OPNAME MTC";
        $this->load->view( 'Maintenance/stock_opname_mtc', $data);
    }

    public function stock_opname_mtc_create()
    {
        $data['title'] = "STOCK OPNAME MTC";
        $data['date1'] = $this->input->post('date1');

        $get_tmp=$this->MTC->check_tmp($data['date1']);
        if($get_tmp->num_rows()!=0 || $data['date1']==""){
            redirect('Maintenance/stock_opname_mtc', 'refresh');
        }

        $username = $this->session->userdata('username');
        $query=$this->MTC->get_data_opname();
        
        //memindahkan ke dari db2 ke mysql (tabel tmp)
        $counter=0;
        $insert=array();
        $random=strtotime("now")."_".rand(100,999);
        foreach($query->result_array() as $row){
            $tmp=[
                'SUBCODE01'=> $row['SUBCODE01'],
                'SUBCODE02'=> $row['SUBCODE02'],
                'SUBCODE03'=> $row['SUBCODE03'],
                'SUBCODE04'=> $row['SUBCODE04'],
                'SUBCODE05'=> $row['SUBCODE05'],
                'SUBCODE06'=> $row['SUBCODE06'],
                'KODE_BARANG'=> $row['KODE_BARANG'],
                'LONGDESCRIPTION'=> $row['LONGDESCRIPTION'],
                'ZONE'=> $row['ZONE'],
                'LOCATION'=> $row['LOCATION'],
                'SAFETYSTOCK' => $row['SAFETYSTOCK'],
                'BASEPRIMARYQUANTITYUNIT'=> $row['BASEPRIMARYQUANTITYUNIT'],
                'B_BASEPRIMARYUNITCODE'=> $row['B_BASEPRIMARYUNITCODE'],
                'BASEPRIMARYUNITCODE'=> $row['BASEPRIMARYUNITCODE'],
                'user'=> $username, 
                'date'=> $data['date1'], 
                'TMP_ID'=> $random
            ];
            $counter++;
            $insert[]=$tmp;
            if($counter==100){
                $this->MTC->insert_tmp($insert);
                $counter=0;
                $insert=array();
            }
        }

        if($counter != 0){
            $this->MTC->insert_tmp($insert);
            $counter=0;
            $insert=array();
        }
        $this->sto_edit($random,$data);
    }

    public function stock_opname_mtc_edit(){
        $random=$this->input->get("random");
        $data['title'] = "STOCK OPNAME MTC";
        $data['date1'] = $this->input->get('date');
        $this->sto_edit($random,$data);
    }

    private function sto_edit($random,$data){
        // $random='1762850481_448';
        $get_tmp=$this->MTC->get_tmp($random);
        $data['tmp']=$get_tmp->result_array();
        $this->load->view( 'Maintenance/stock_opname_mtc_edit', $data);
    }

    public function stock_opname_mtc_excel(){
        $random=$this->input->get("random");
        $data['title'] = "STOCK OPNAME MTC";
        $data['date1'] = $this->input->get('date');
        $get_tmp=$this->MTC->get_tmp($random);
        $data['tmp']=$get_tmp->result_array();
        $this->load->view( 'Maintenance/stock_opname_mtc_excel', $data);
    }

    public function simpan_total_stock_sto()
    {
        $id=$this->input->post("id_dt");
        $val=$this->input->post("val");
        date_default_timezone_set('Asia/Jakarta');
        $now = new DateTime(); 
        $update=$this->MTC->simpan_total_stock_sto($id,$val,$now->format('Y-m-d H:i:s'));
        if($update){
            $this->response->setSuccess(true);
            $this->response->addMessage("Berhasil Mengubah Total Stock");
            $this->response->addMessage($update);
            $this->response->addMessage(timestamp_ke_custom($now->format('Y-m-d H:i:s')));
        }else{
            $this->response->setSuccess(false);
            $this->response->addMessage("Gagal Mengubah Total Stock");
            $this->response->addMessage($update);
        }
        $this->response->send();
    }

    public function konfirmasi_sto()
    {
        $id=$this->input->post("id_dt");
        date_default_timezone_set('Asia/Jakarta');
        $now = new DateTime(); 
        $username = $this->session->userdata('username');
        $konfirm=$this->MTC->konfirmasi_sto($id,$username,$now->format('Y-m-d H:i:s'));
        if($konfirm){
            $this->response->setSuccess(true);
            $this->response->addMessage("Berhasil Konfirmasi");
            $this->response->addMessage($konfirm);
        }else{
            $this->response->setSuccess(false);
            $this->response->addMessage("Gagal Konfirmasi");
            $this->response->addMessage($konfirm);
        }
        $this->response->send();
    }
    
    public function list_stock_opname()
    {
        $list=$this->MTC->list_stock_opname();
        $this->response->setSuccess(true);
        $this->response->addMessage("Berhasil Get List");
        $this->response->setData($list->result_array());
        $this->response->send();
    }

}