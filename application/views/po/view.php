<h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <?php echo anchor('dashboard',"Dashboard");?></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Data</li>
    </ol>
</div>

<?php echo anchor('po/post','<span class="glyphicon glyphicon-plus"></span> Input Data',array('class'=>'btn btn-primary  btn-sm'));?> 

    <table id="example-datatables" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="80"></th>
                                <th width="7">No</th>
                                <th>Kode Obat</th>
                                <th>Deskripsi</th>
                                <th>Jenis</th>
                                <th>Tgl Pesan</th>
                                <th>Qty Pesan</th>
                                <th>Tgl Masuk</th>                                
                                <th>Qty Masuk</th>
                                <th>Sisa PO</th>
                                <th>Cost /Kg</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            $i=1;
                            foreach ($record as $r)
                            {
								
								$queryobat="Select kode_obat,deskripsi,jenis_id from obat where obat_id=$r->obat_id";
								$namaobat=$this->db->query($queryobat)->result();
								foreach($namaobat as $s)
								{
									$deskobat=$s->deskripsi;
									$kodeobat=$s->kode_obat;	
									$jenisid=$s->jenis_id;
								}
								
								$queryjn="Select jenis from jenis where jenis_id=$jenisid";
								$namajenis=$this->db->query($queryjn)->result();
								foreach($namajenis as $jn)
								{
									$jenisname=$jn->jenis;	
								}
                            ?>
                            
                            <tr>
                            <?php
							/*
							?>
                                <td class="text-center">
                                    <div class="btn-group">
                                    <a href="<?php echo base_url().''.$this->uri->segment(1).'/delete/'.$r->po_id;?>" data-toggle="tooltip" title="Delete" class="fa fa-trash-o"></a>
                                        <a href="<?php echo base_url().''.$this->uri->segment(1).'/edit/'.$r->po_id;?>" data-toggle="tooltip" title="Edit" class="fa fa-share-square-o"></a>
                                        
                                                                            </div>
                                </td>   
								<?php
								*/
								?>        
                                <td></td>                     
                                <td><?php echo $i;?></td>
                                <td><?php echo strtoupper($kodeobat);?></td>
                                <td><?php echo strtoupper($deskobat);?></td>
                                <td><?php echo strtoupper($jenisname)?></td>
                                <td><?php echo strtoupper($r->tgl_pesan)?></td>
                                <td><?php echo strtoupper($r->qty_pesan);?></td>
                                <td><?php echo strtoupper($r->tgl_masuk)?></td>
                                <td><?php echo strtoupper($r->qty_masuk);?></td>
                                <td><?php echo strtoupper($r->qty_sisapo);?></td>
                                <td><?php echo strtoupper($r->cost);?></td>
                            </tr>
                            <?php $i++;}?>
                            
                            
                        </tbody>
                    </table>

                    <!-- END Datatables -->
                    
