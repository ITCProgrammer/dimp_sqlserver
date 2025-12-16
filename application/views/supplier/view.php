<h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <?php echo anchor('dashboard',"Dashboard");?></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Data</li>
    </ol>
</div>
 
<?php
echo anchor($this->uri->segment(1).'/post','Tambah Data',array('class'=>'btn btn-danger   btn-sm'))
?>
                    <table id="example-datatables" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="80"></th>
                                <th width="7">No</th>
                                <th>Nama Supplier</th>
                                <th>Alamat</th>
                                <th>CP</th>
                                <th>Telp</th>
								<th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            $i=1;
                            foreach ($record as $r)
                            {
                            ?>
                            
                            <tr>
                                                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="<?php echo base_url().''.$this->uri->segment(1).'/edit/'.$r->supplier_id;?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                                        <a href="<?php echo base_url().''.$this->uri->segment(1).'/delete/'.$r->supplier_id;?>" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                                                            </div>
                                </td>
                                <td><?php echo $i;?></td>
                                <td><?php echo strtoupper($r->nama_supplier);?></td>
                                <td><?php echo strtoupper($r->alamat);?></td>
                                <td><?php echo strtoupper($r->kontak);?></td>
                                <td><?php echo strtoupper($r->telp)?></td>
								<td><?php echo strtoupper($r->email)?></td>
                            </tr>
                            <?php $i++;}?>
                            
                            
                        </tbody>
                    </table>
                    <!-- END Datatables -->
                    
