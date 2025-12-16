<?php
?>

<!DOCTYPE html>
<html>
<head>
    <title>::Laporan Stock Limbah Dan Intake MTC::</title>
    <link rel="shortcut icon" href="img/logo_ITTI.ico">
    <style>
        body { background: white; }
        table, th, td { border: 1px solid black; border-collapse: collapse; font-size: 12px; }
        th, td { padding: 2px; text-align: center; }
    </style>
</head>
<body>

<label style="font-weight: bold;">LAPORAN OBAT INTAKE DAN LIMBAH</label><br>
<label style="font-weight: bold;">Periode :<?php echo $date1  ?></label>
<br><br>

<table width="100%" border="1" id="t01">
    <tr>
        <th>Kode Sparepart</th>
        <th>Nama Sparepart</th>
        <th>Stock Minimum</br>(Safety Stock)</th>
        <th>Satuan</th> 
        <th>Stock Balance</th> 
        <th>Total Stock</th> 
        <th>Action Button</th> 
        <th>Keterangan Selisih</th> 
    </tr>

<?php
    $no = 1;
    foreach($tmp as $row){
?>
    <tr>
        <td><?php echo $row['KODE_BARANG']; ?></td>
        <td><?php echo $row['LONGDESCRIPTION']; ?></td>
        <td><?php echo $row['SAFETYSTOCK']; ?></td>
        <td><?php echo $row['BASEPRIMARYQUANTITYUNIT']; ?></td>
        <td><?php echo $row['BASEPRIMARYUNITCODE']; ?></td>
        <td><?php echo $row['QTY_AKTUAL']; ?></td>
        <td></td>
        <td></td>
    </tr>
<?php 
    }
?>
</table>

</body>
</html>
