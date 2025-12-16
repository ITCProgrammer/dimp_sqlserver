<?php
    $namaFile = "Stock Opname Maintenance ".$date1.".xls";

    header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
    header("Content-Disposition: attachment; filename=\"$namaFile\"");
    header("Pragma: no-cache");
    header("Expires: 0");
    ob_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <style>
            td,
            th {
                mso-number-format: "\@";
                padding: 5px;
                border: 1px solid #000;
            }

            .duadigit{
                mso-number-format: "#,##0.00";
            }

            .number {
                mso-number-format: "#,##0";
            }

            .int {
                mso-number-format: "0";
            }

            th {
                background-color: #f0f0f0;
            }
        </style>
    </head>
    <body>
            <table width="100%"  id="tbl_opname" class="table-striped table-bordered">
                <thead>
                    <tr>
                        <td colspan="11">Periode : <?= timestamp_ke_custom($date1,'d-m-Y')  ?></td>
                    </tr>
                    <tr>
                        <th>Kode Sparepart</th>
                        <th>Nama Sparepart</th>
                        <th>Zone</th>
                        <th>Location</th>
                        <th>Stock Minimum</br>(Safety Stock)</th>
                        <th>Satuan</th> 
                        <th>Stock Balance</th> 
                        <th>Total Stock</th> 
                        <th>Status</th> 
                        <th>Keterangan Selisih</th> 
                        <th>Last Update</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($tmp as $row){
                        if($row['konfirmasi']){
                            $konfirm="Confirm";
                        }else{
                            $konfirm="Not Confirm";
                        }
                    ?>
                    <tr data-id="<?= $row['id']; ?>" data-ts='<?= $row['QTY_AKTUAL']; ?>' data-blc='<?= floatval($row['BASEPRIMARYQUANTITYUNIT']); ?>'>
                        <td><?= $row['KODE_BARANG']; ?></td>
                        <td><?= $row['LONGDESCRIPTION']; ?></td>
                        <td><?= $row['ZONE']; ?></td>
                        <td><?= $row['LOCATION']; ?></td>
                        <td class='number'><?= $row['SAFETYSTOCK']; ?></td>
                        <td><?= $row['BASEPRIMARYUNITCODE']; ?></td>
                        <td class='number'><?= $row['BASEPRIMARYQUANTITYUNIT']; ?></td>
                        <td class='number'><?= $row['QTY_AKTUAL'] ?></td>
                        <td ><?=$konfirm;?></td>
                        <td class='number'><?= ($row['BASEPRIMARYQUANTITYUNIT']-$row['QTY_AKTUAL']); ?></td>
                        <td ><?= timestamp_ke_custom($row['edit_date']); ?></td>
                    </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
    </body>
</html>
<?php
ob_end_flush(); 
exit();
?>