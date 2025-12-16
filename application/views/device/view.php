<h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <?php echo anchor('dashboard',"Dashboard");?></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Data</li>
    </ol>
</div>
 
<?php echo anchor('obat/post','<span class="glyphicon glyphicon-plus"></span> Input Data',array('class'=>'btn btn-primary  btn-sm'));?> 
        
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
                                <th>Kode</th>
                                <th>Deskripsi</th>
                                <th>Jenis</th>
                                <th>Cost (USD)</th>
                                <th>Supplier</th>                                
                                <th>Safety Stock(Kg)</th>
                                <th>Packing</th>
                                <th>Unit</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            $i=1;
                            foreach ($jnobat as $r)
                            {
								
								$querysup="Select nama_supplier from supplier where supplier_id=$r->supplier_id";
								$namasupplier=$this->db->query($querysup)->result();
								foreach($namasupplier as $s)
								{
									$suppliername=$s->nama_supplier;	
								}
								
								$queryjn="Select jenis from jenis where jenis_id=$r->jenis_id";
								$namajenis=$this->db->query($queryjn)->result();
								foreach($namajenis as $jn)
								{
									$jenisname=$jn->jenis;	
								}
                            ?>
                            
                            <tr>
                                <td class="text-center">
                                    <div class="btn-group">
                                    <a href="<?php echo base_url().''.$this->uri->segment(1).'/delete/'.$r->obat_id;?>" data-toggle="tooltip" title="Delete" class="fa fa-trash-o"></a>
                                        <a href="<?php echo base_url().''.$this->uri->segment(1).'/edit/'.$r->obat_id;?>" data-toggle="tooltip" title="Edit" class="fa fa-share-square-o"></a>
                                        
                                                                            </div>
                                </td>                                
                                <td><?php echo $i;?></td>
                                <td><?php echo strtoupper($r->kode_obat);?></td>
                                <td><?php echo strtoupper($r->deskripsi);?></td>
                                <td><?php echo strtoupper($jenisname)?></td>
                                <td><?php echo strtoupper($r->cost);?></td>
                                <td><?php echo strtoupper($suppliername)?></td>
                                <td><?php echo strtoupper($r->safetystock);?></td>
                                <td><?php echo strtoupper($r->packing);?></td>
                                <td><?php echo strtoupper($r->unit);?></td>
                            </tr>
                            <?php $i++;}?>
                            
                            
                        </tbody>
                    </table>


