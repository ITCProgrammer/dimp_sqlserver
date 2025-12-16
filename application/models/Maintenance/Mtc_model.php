<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * this class using for genral propose
 */

class Mtc_model extends CI_Model
{
    private $now;

    public function __construct()
    {
        parent::__construct();
        // $this->now = $this->load->database('now', true);
    }

    public function get_data_opname(){
        $this->now = $this->load->database('now', true);
        $query = $this->now->query(" 
            SELECT
                TRIM(p.SUBCODE01) SUBCODE01,
                TRIM(p.SUBCODE02) SUBCODE02,
                TRIM(p.SUBCODE03) SUBCODE03,
                TRIM(p.SUBCODE04) SUBCODE04,
                TRIM(p.SUBCODE05) SUBCODE05,
                TRIM(p.SUBCODE06) SUBCODE06,
                TRIM(p.SUBCODE01) || '-' ||
                TRIM(p.SUBCODE02) || '-' ||
                TRIM(p.SUBCODE03) || '-' ||
                TRIM(p.SUBCODE04) || '-' ||
                TRIM(p.SUBCODE05) || '-' ||
                TRIM(p.SUBCODE06) AS KODE_BARANG,
                p.LONGDESCRIPTION,
                i.SAFETYSTOCK,
                b.BASEPRIMARYQUANTITYUNIT,
                b.BASEPRIMARYUNITCODE B_BASEPRIMARYUNITCODE,
                b.WHSLOCATIONWAREHOUSEZONECODE AS ZONE,
                b.WAREHOUSELOCATIONCODE AS LOCATION,
                u.LONGDESCRIPTION BASEPRIMARYUNITCODE
            FROM
                PRODUCT p
            RIGHT JOIN BALANCE b ON b.ITEMTYPECODE = p.ITEMTYPECODE
                AND b.DECOSUBCODE01 = p.SUBCODE01 
                AND b.DECOSUBCODE02 = p.SUBCODE02 
                AND b.DECOSUBCODE03 = p.SUBCODE03 
                AND b.DECOSUBCODE04 = p.SUBCODE04 
                AND b.DECOSUBCODE05 = p.SUBCODE05 
                AND b.DECOSUBCODE06 = p.SUBCODE06
            LEFT JOIN ITEMWAREHOUSELINK i ON i.ITEMTYPECODE = p.ITEMTYPECODE
                AND i.SUBCODE01 = p.SUBCODE01 
                AND i.SUBCODE02 = p.SUBCODE02 
                AND i.SUBCODE03 = p.SUBCODE03 
                AND i.SUBCODE04 = p.SUBCODE04 
                AND i.SUBCODE05 = p.SUBCODE05 
                AND i.SUBCODE06 = p.SUBCODE06
                AND i.LOGICALWAREHOUSECODE = b.LOGICALWAREHOUSECODE
            LEFT JOIN UNITOFMEASURE u ON u.CODE = b.BASEPRIMARYUNITCODE
            WHERE
                p.ITEMTYPECODE = 'SPR'
                AND p.SUBCODE01 = 'MTC'
                AND b.LOGICALWAREHOUSECODE = 'M201'
                AND b.STOCKTYPECODE= '001' ");
        return $query;
    }

    public function insert_tmp($array){
        $this->db->insert_batch('tmp_stock_opname',$array);
    }

    public function get_tmp($tmp_id){
        return $this->db
            ->where('TMP_ID', $tmp_id)
            ->order_by('LONGDESCRIPTION', 'ASC')
            ->get('tmp_stock_opname');
    }
    public function check_tmp($date){
        return $this->db
            ->where('date', $date)
            ->limit('1')
            ->get('tmp_stock_opname');
    }
    
    public function simpan_total_stock_sto($id,$val,$now){
        return $this->db
            ->set('QTY_AKTUAL', $val)
            ->set('edit_date', $now)
            ->where('id', $id)
            ->update('tmp_stock_opname');
    }

    public function konfirmasi_sto($id,$user,$date){
        return $this->db
            ->set('konfirmasi', '1')
            ->set('konfirmasi_by', $user)
            ->set('konfirmasi_date', $date)
            ->where('id', $id)
            ->update('tmp_stock_opname');
    }

    public function list_stock_opname(){
        $query = $this->db->query(" 
            SELECT 
                date,
                TMP_ID,
                user, 
                SUM(CASE WHEN konfirmasi=1 THEN 1 ELSE 0 END) as konfirm, 
                SUM(CASE WHEN COALESCE(edit_date,'') ='' THEN 1 ELSE 0 END) nilai_nol 
            FROM tmp_stock_opname
            GROUP BY date,TMP_ID,user 
            ORDER BY date ASC");
        return $query;
    }
}
