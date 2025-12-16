<?php
    $hostname="10.0.0.21";
    // $database = "NOWTEST"; // SERVER NOW 20
    $database = "NOWPRD"; // SERVER NOW 22
    $user = "db2admin";
    $passworddb2 = "Sunkam@24809";
    $port="25000";
    $conn_string = "DRIVER={IBM ODBC DB2 DRIVER}; HOSTNAME=$hostname; PORT=$port; PROTOCOL=TCPIP; UID=$user; PWD=$passworddb2; DATABASE=$database;";
    // $conn1 = db2_pconnect($conn_string,'', '');
    $conn1 = db2_connect($conn_string,'', '');
?>
<h2 style="font-weight: normal;"><?php echo $title; ?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <?php echo anchor('dashboard', "Dashboard"); ?></li>
        <li><?php echo anchor($this->uri->segment(1), $title); ?></li>
        <li class="active">Print Record</li>
    </ol>
</div>

<?php
echo $this->session->flashdata('pesan');
echo form_open_multipart($this->uri->segment(1) . '/cetak');

?>
<div class="row">
    <div class="col-md-12 clearfix">
        <ul id="example-tabs" class="nav nav-tabs" data-toggle="tabs">
            <li class="active"><a href="#identitas">Filter</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="identitas">
                <table class="table table-bordered">
                    <tr class="success">
                        <th colspan="2">Filter</th>
                    </tr>
                    <tr>
                        <td width="250">Department</td>
                        <td>
                            <?php echo buatcombo('deptcode', 'departments', 'col-sm-4', 'dept_name', 'code', '', array('id' => 'code')) ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="250"></td>
                        <td>
                        </td>
                    </tr>
                    <tr class="success">
                        <th colspan="2">Filter (Database NOW)</th>
                    </tr>
                    <tr>
                        <td width="250">Department</td>
                        <td>
                            <select class="form-control" name="deptcode_NOW">
                                <option value="" selected disabled>--Select Department--</option>
                                <?php
                                    $_dept  = db2_exec($conn1, "SELECT * FROM DEPARTMENT");
                                ?>
                                <?php while ($r = db2_fetch_assoc($_dept)) : ?>
                                    <option value="<?= $r['CODE'] ?>"><?= $r['LONGDESCRIPTION'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="250"></td>
                        <td>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- <input type="submit" name="submit" value="PRINT LM-TI" class="btn btn-danger btn-sm"> -->
            <button type="button" name="cetak" id="PrintMkti" class="btn btn-sm btn-primary">PRINT MK-TI</button>
            <button type="button" name="cetakNOW" id="PrintMkti_NOW" class="btn btn-sm btn-danger">PRINT MK-TI NOW</button>
            <script>
                document.getElementById('PrintMkti').addEventListener('click', () => {
                    window.open("<?= base_url() . 'lampiran/cetakGet/' ?>" + $("select[name='deptcode'] option:selected").val(), 'width=800, height=600');
                });
                document.getElementById('PrintMkti_NOW').addEventListener('click', () => {
                    window.open("<?= base_url() . 'lampiran/cetakGet_NOW/' ?>" + $("select[name='deptcode_NOW'] option:selected").val(), 'width=800, height=600');
                });
            </script>
            </form>