<?php
/**
 * Description of mcrud
 * class ini digunakan untuk melakukan manipulasi  data sederhana
 * dengan parameter yang dikirim dari controller.
 * @author nuris akbar
 */
class Mcrud extends CI_Model{
   
    // Menampilkan data dari sebuah tabel dengan pagination.
    public function getList($tables,$limit,$page,$by,$sort){
        $this->db->order_by($by,$sort);
        $this->db->limit($limit,$page);
        return $this->db->get($tables);
    }
    
	// Membuat nomor urut
	function getnomorurut($table,$prefix,$idparameter) { 
		$nowMonthYear = date('my');
        $q = $this->db->query("SELECT MAX(kk_id) AS idmax FROM ".$table);
        $kd = ""; //kode awal
        if($q->num_rows()>0){ //jika data ada
            foreach($q->result() as $k){
                $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                $kd = sprintf('%04s', $tmp); //kode ambil 4 karakter terakhir
            }
        }else{ //jika data kosong diset ke kode awal
            $kd = "0001";
        }
        $kar = $prefix; //"PEL."; //karakter depan kodenya
        //gabungkan string dengan kode yang telah dibuat tadi
        return $kar.$nowMonthYear.$kd;
   } 
   
    // menampilkan semua data dari sebuah tabel.
    public function getAll($tables){
    
        return $this->db->get($tables);
    }
    
    // menghitun jumlah record dari sebuah tabel.
    public function countAll($tables){
        return $this->db->get($tables)->num_rows();
    }
    
    // menghitun jumlah record dari sebuah query.
    public function countQuery($query){
        return $this->db->get($query)->num_rows();
    }
    
    //enampilkan satu record brdasarkan parameter.
    public function kondisi($tables,$where)
    {
        $this->db->where($where);
        return $this->db->get($tables);
    }
    //menampilkan satu record brdasarkan parameter.
    public  function getByID($tables,$pk,$id){
        $this->db->where($pk,$id);
        return $this->db->get($tables);
    }
    
    // Menampilkan data dari sebuah query dengan pagination.
    public function queryList($query,$limit,$page){
       
        return $this->db->query($query." limit ".$page.",".$limit."");
    }
    
    public function queryBiasa($query,$by,$sort){
       // $this->db->order_by($by,$sort);
        return $this->db->query($query);
    }
    // memasukan data ke database.
    public function insert($tables,$data){
        $this->db->insert($tables,$data);
    }
    
    // update data kedalalam sebuah tabel
    public function update($tables,$data,$pk,$id){
        $this->db->where($pk,$id);
        $this->db->update($tables,$data);
    }
    
    // menghapus data dari sebuah tabel
    public function delete($tables,$pk,$id){
        $this->db->where($pk,$id);
        $this->db->delete($tables);
    }
    
    function login($username,$password)
    {
       return $this->db->get_where('users',array('username'=>$username,'password'=>$password));        
    }
}

?>
