<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(! function_exists('c_p'))//fungsi untuk print rapih
{
  function c_p($array,$exit=false)
  {
    echo "<pre>";
    if(is_array($array) || is_object($array)){
      print_r($array);
    }
    else{
      if($array=="post"){
        print_r($_POST);
      }else if($array=="get"){
        print_r($_GET);
      }else {
        echo $array;
      }
    }
    echo "</pre>";
    if($exit){
      exit;
    }
  }
}

if(! function_exists('tanggal_ke_tulisan'))//
{
  function tanggal_ke_tulisan($date)
  {
    //format Y-m-d
    $tanggal= date('j', strtotime($date));
    $bulan_ind= date('m', strtotime($date));
    $tahun= date('Y', strtotime($date));
    $bulan = array(
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
    );
    return $tanggal.' '.$bulan[$bulan_ind].' '.$tahun;
  }
}

if(! function_exists('tanggal_ke_hari'))//
{
  function tanggal_ke_hari($date)
  {
    //format Y-m-d
    $day= date('w', strtotime($date));
    $hari = array(
      '0' => 'Minggu',
      '1' => 'Senin',
      '2' => 'Selasa',
      '3' => 'Rabu',
      '4' => 'Kamis',
      '5' => 'Jum\'at',
      '6' => 'Sabtu'
    );
    return $hari[$day];
  }
}

if(! function_exists('timestamp_ke_custom'))//
{
  function timestamp_ke_custom($timestamp,$format="d/m/Y H:i:s") //custome format dengan default
  {
    if($timestamp=="" || $timestamp==null){
      $time="";
    }
    else {
      $time= date($format, strtotime($timestamp));
    }
    return $time;
  }
}

if(! function_exists('select_c'))//fungsi untuk select_compile
{
  function select_c($objek, $table=null,$exit=false)//fungsi untuk select_compile
  {
    echo $objek->get_compiled_select($table, FALSE);;
    if($exit){
      exit;
    }
  }
}

if(! function_exists('nilaiKeRibuan'))
{
  function nilaiKeRibuan($angka,$ribuan=".",$koma=","){
        try{
            if($angka==""||$angka=="-"){
                $angka=0;
            }
            $str=explode(".",strval($angka)+ 0);
            if(count($str)==2){
                return number_format(intval($str[0]),0,$koma,$ribuan).$koma.$str[1];
            }else{
                return number_format(intval($str[0]),0,$koma,$ribuan);
            }
        }
        catch (ExceptionType $e) {
            return $angka;
        }
    }
}

if(! function_exists('ribuanKeNilai'))
{
  function ribuanKeNilai($angka,$ribuan=".",$koma=","){
        try{
            $tanpaRibuan=str_replace($ribuan,"",$angka);
            $str=explode($koma,strval($tanpaRibuan));
            if(count($str)==2){
                return $str[0].".".$str[1];
            }else{
                return $str[0];
            }
        }
        catch (ExceptionType $e) {
            return $angka ;
        }
    }
}
