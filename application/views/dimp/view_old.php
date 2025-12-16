<h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <?php echo anchor('dashboard',"Dashboard");?></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Data</li>
    </ol>
</div>
 <script type="text/javascript" language="JavaScript">
 function konfirmasi()
 {
 tanya = confirm("Anda Yakin Akan Menghapus Data ?");
 if (tanya == true) return true;
 else return false;
 }</script>
<?php echo anchor('dimp/post','<span class="glyphicon glyphicon-plus"></span> Input Data',array('class'=>'btn btn-primary  btn-sm'));?> 
        
<?php
/*

    <table class="table table-bordered" id="obat">
        <tr><th width="5">No</th><th width="30">Kode</th><th>Deskripsi</th><th>Cost (USD)</th><th>Supplier</th><th>Safety Stock(Kg)</th><th>Packing</th><th>Unit</th><th colspan="2">Operasi</th></tr>
    </table>
	*/
	//echo $this->jnobat;
?>
    <table id="example-datatables" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="80"></th>
                                <th width="7">No</th>
                                <th>Dept</th>
                                <th>Kode</th>
                                <th>Prosesor</th>
                                <th>RAM</th>
								<th>MEMORY</th>
								<th>GB</th>
                                <th>HDD</th>      
								<th>Operating System</th>	
                                <th>Computer Name</th>
                                <th>User</th>
                                <th>IP Address</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            $i=1;
                            foreach ($jnobat as $r)
                            {
								$emailadd=$r->email_address;
								if ($emailadd<>""){
									//$usermail="".$r->nama_pengguna."<br>".$emailadd."";
									$usermail=$r->email_address;
								}else{
									$usermail=$r->nama_pengguna;
								}
                            ?>
                            
                            <tr>
                                <td class="text-center">
                                    <div class="btn-group">
                                    <a onclick="return konfirmasi()" href="<?php echo base_url().''.$this->uri->segment(1).'/delete/'.$r->id;?>" data-toggle="tooltip" title="Delete" class="fa fa-trash-o"></a>
                                        <a href="<?php echo base_url().''.$this->uri->segment(1).'/edit/'.$r->id;?>" data-toggle="tooltip" title="Edit" class="fa fa-share-square-o"></a>
                                        <a href="<?php echo base_url().''.$this->uri->segment(1).'/cetak/'.$r->id;?>" data-toggle="tooltip" title="Print" class="gi gi-notes_2"></a>
                                                                            </div>
                                </td>                                
                                <td><?php echo $i;?></td>
                                <td><?php echo strtoupper($r->dept_code);?></td>
                                <td><?php echo strtoupper($r->device_code);?></td>
                                <td><?php echo strtoupper($r->prosesor_spec);?></td>
                                <td><?php echo strtoupper($r->ram_spec);?></td>
								<td><?php echo strtoupper($r->ram_merk);?></td>
								<td><?php echo strtoupper($r->ram_gb);?></td>
                                <td><?php echo strtoupper($r->hdd_gb);?></td>
                                <td><?php echo strtoupper($r->os);?></td>
                                <td><?php echo strtoupper($r->computer_name);?></td>
                                <td><?php echo $usermail;?></td>
                                <td><?php echo strtoupper($r->ip_address);?></td>
								
                            </tr>
                            <?php $i++;}?>
                            
                            
                        </tbody>
                    </table>


