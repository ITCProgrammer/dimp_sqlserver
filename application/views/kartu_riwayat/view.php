<h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <?php echo anchor('dashboard',"Dashboard");?></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Data</li>
    </ol>
</div>
<table id="example-datatables" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th width="7">No</th>
            <th>Dept</th>
            <th>Kode Mesin</th>
            <th>Nama Mesin</th>
            <th>Pengguna</th>
            <th>Ip Address</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            //$query = $this->db->query("SELECT * FROM dept_device WHERE NOT dept_code = 'TEM' ORDER BY dept_code ASC")->result_array();
			//---update
			$query = $this->db->query("SELECT * FROM dimp.dept_device ORDER BY dept_code ASC")->result_array();
            $no = 1;
            $no = 1;
            foreach ($query as $value) :
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $value['dept_code'] ?></td>
            <td><?= $value['device_code'] ?></td>
            <td><?= $value['merk'].' '.$value['type'].' '.$value['mb_merk'].' '.$value['prosesor_merk'].' '.$value['prosesor_spec'] ?></td>
            <td><?= $value['nama_pengguna'].' '.$value['computer_name'] ?></td>
            <td><?= $value['ip_address'] ?></td>
            <td>
                <a href="<?= base_url('kartu_riwayat/cetak').'/'.$value['id']; ?>" data-toggle="tooltip" title="Print" class="gi gi-notes_2"></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


