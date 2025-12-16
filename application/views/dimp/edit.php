<h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <?php echo anchor('dashboard',"Dashboard");?></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Entry Record</li>
    </ol>
</div>
 
  <script src="<?php echo base_url()?>assets/js/jquery.min.js"> </script>

<script>
$(document).ready(function(){
          loadjurusan();  
  });
</script>

<script type="text/javascript">
function loadjurusan()
{
     var prodi=$("#prodi").val();   
      $.ajax({
	url:"<?php echo base_url();?>mahasiswa/tampilkankonsentrasi",
	data:"prodi=" + prodi ,
	success: function(html)
	{
            $("#konsentrasi").html(html);
             var konsentrasi=$("#konsentrasi").val();
	}
	});
}
</script>
<script>
$(document).ready(function(){
  $("#prodi").change(function(){
     
        loadjurusan();
  });
});
</script>
<?php
echo $this->session->flashdata('pesan');
echo form_open_multipart($this->uri->segment(1).'/edit');
echo "<input type='hidden' name='id' value='$r[id]'>";
$jenis=array(1=>'Chemicals',
                2=>'Dyestuffs',
				3=>'PASTA');
                
$unit=array('KG'=>'KG',
                'Liter'=>'Liter');
				
if($this->session->userdata('level')==1)
{
    $param="";
}
else
{
    $param=array('prodi_id'=>$this->session->userdata('keterangan'));
}
?>
 <div class="row">
                        <div class="col-md-12 clearfix">
                            <ul id="example-tabs" class="nav nav-tabs" data-toggle="tabs">
                                <li class="active"><a href="#identitas">Identitas</a></li>
                                <li><a href="#spek">Spesifikasi</a></li>
								<li><a href="#software">Software</a></li>
								<li><a href="#user">Pengguna</a></li>
                                
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="identitas">
                                    <table class="table table-bordered">
                                        <tr class="success"><th colspan="2">IDENTITAS</th></tr>
	<tr>
    <td width="250">Device Type</td><td>
        <?php echo editcombo('devicetype', 'device_type', 'col-sm-3', 'jenis', 'jenis_id', '', array('id'=>'jenis_id'),$r['type_id'])?>
		
		Device Code <?php echo editcombo2('devicecode2', 'device_code', 'col-sm-3', 'code', 'code', '', array('id'=>'code'),$r['device_code_2'])?>
    </td>
    </tr>	
	<tr>
    <td width="250">Department</td><td>
        <?php echo editcombo('deptcode', 'departments', 'col-sm-4', 'dept_name', 'code', '', array('id'=>'code'),$r['dept_code'])?>
    </td>
    </tr>	
    <tr>
    <td width="250">Old Code</td><td>
        
        <?php echo inputan('text', 'devicecode','col-sm-3','Device Code ..', 1,$r['device_code'],'');?>
		
		Asset Tag <?php echo inputan('text', 'tag','col-sm-3','Asset Tag ..', 1,$r['asset_tag'],'');?>
        
    </td>
    </tr>
	 <tr>
    <td width="250">Merk</td><td>
        
        <?php echo inputan('text', 'merk','col-sm-4','Merk ..', 0, $r['merk'],'');?>
        
    </td>
    </tr>
    
    <tr>
    <td width="250">Type</td><td>
        
        <?php echo inputan('text', 'type','col-sm-4','Type ..', 0, $r['type'],'');?>
        
    </td>
    </tr>
	
	<tr>
    <td width="250">PC Connected</td><td>
        
        <?php echo editcombo2('pcconnect', 'dept_device', 'col-sm-3', 'device_code', 'device_code', '', array('id'=>'device_code'),$r['pc_connect'])?>
        
    </td>
    </tr>
	
	<tr>
    <td width="250">Made in</td><td>
        
        <?php echo inputan('text', 'madein','col-sm-4','Made in ..', 0, $r['madein'],'');?>
        
    </td>
    </tr>
	
	<tr>
    <td width="250">Production Year</td><td>
        
        <?php echo inputan('text', 'productionyear','col-sm-4','Production Year ..', 0, $r['production_year'],'');?>
        
    </td>
    </tr>
	
	<tr>
    <td width="250">Serial Number Product</td><td>
        
        <?php echo inputan('text', 'sn','col-sm-4','Serial Number Product ..', 0, $r['sn'],'');?>
        
    </td>
    </tr>
	
	<tr>
    <td width="250">Capacity</td><td>
        
        <?php echo inputan('text', 'capacity','col-sm-4','Capacity ..', 0, $r['capacity'],'');?>
        
    </td>
    </tr>
	
                                    </table>
                                    
                                </div>
                                
                                
                                
                                
                                <div class="tab-pane" id="spek">
                                    <table class="table table-bordered">
                                        <tr class="success"><th colspan="2">SPESIFIKASI</th></tr>
										
										<tr>
										<td width="250">Merk / Type Mainboard</td><td>
        
											<?php echo inputan('text', 'mbmerk','col-sm-4','Merk ..', 0, $r['mb_merk'],'');?>
											<?php echo inputan('text', 'mbtype','col-sm-4','Type ..', 0, $r['mb_type'],'');?>
										</td>
										</tr>
										
										<tr>
										<td width="250">Merk / Type Prosesor</td><td>
											<?php echo inputan('text', 'prosesormerk','col-sm-4','Merk ..', 0, $r['prosesor_merk'],'');?>
											<?php echo inputan('text', 'prosesortype','col-sm-4','Type ..', 0, $r['prosesor_spec'],'');?>
											
										</td>
										</tr>
										
										<tr>
										<td width="250">Merk / Type RAM (Memory)</td><td>
        
											<?php echo inputan('text', 'rammerk','col-sm-3','Merk ..', 0, $r['ram_merk'],'');?>
											<?php echo editcombo2('ramspec', 'tipe_ram', 'col-sm-3', 'tipe', 'tipe', '', array('id'=>'tipe'),$r['ram_spec'])?>
											<?php echo inputan('text', 'ramgb','col-sm-2','Capacity ..', 0, $r['ram_gb'],'');?>GB
										</td>
										</tr>
										
										<tr>
										<td width="250">Merk / Type Harddisk</td><td>
											
											<?php echo inputan('text', 'hddmerk','col-sm-3','Merk ..', 0, $r['hdd_merk'],'');?>
											<?php echo editcombo2('hddspec', 'tipe_hdd', 'col-sm-3', 'tipe', 'tipe', '', array('id'=>'tipe'),$r['hdd_spec'])?>
											<?php echo inputan('text', 'hddgb','col-sm-2','Capacity ..', 0,$r['hdd_gb'],'');?>GB
										</td>
										</tr>
                                        
                                        
                                        
                                        
                                    </table>
                                </div>
                                
								
														<div class="tab-pane" id="software">
															<table class="table table-bordered">
																<tr class="success"><th colspan="2">SOFTWARE</th></tr>
							<tr>
							<td width="250">Operating System (OS)</td><td>
								<?php echo editcombo2('os', 'os', 'col-sm-6', 'os_name', 'os_name', '', array('id'=>'os_name'),$r['os'])?>
							</td>
							</tr>	
							<tr>
							<td width="250">OS License</td><td>
								<?php echo inputan('text', 'oslicense','col-sm-6','OS License ..', 0, $r['os_license'],'');?>
							</td>
							</tr>	
							<tr>
							<td width="250">Office Software</td><td>
								
								<?php echo inputan('text', 'officesoft','col-sm-6','Office Software ..', 0, $r['office_software'],'');?>
								
							</td>
							</tr>
							 <tr>
							<td width="250">Office License</td><td>
								
								<?php echo inputan('text', 'officelicense','col-sm-6','Office License ..', 0, $r['office_license'],'');?>
								
							</td>
							</tr>
							
							<tr>
							<td width="250">Other Software</td><td>
								
								<?php echo inputan('text', 'othersoft','col-sm-6','Other Software ..', 0, $r['other_software'],'');?>
								
							</td>
							</tr>
							
							<tr>
							<td width="250">Antivirus</td><td>
								
								<?php echo inputan('text', 'antivirus','col-sm-6','Antivirus ..', 0, $r['antivirus'],'');?>
								
							</td>
							</tr>
							
							<tr>
							<td width="250">Antivirus License</td><td>
								
								<?php echo inputan('text', 'avlicense','col-sm-6','Antivirus License ..', 0, $r['av_license'],'');?>
								
							</td>
							</tr>
							
							
															</table>
															
														</div>
														
														<div class="tab-pane" id="user">
															<table class="table table-bordered">
																<tr class="success"><th colspan="2">PENGGUNA</th></tr>
							
							<td width="250">Nama Pengguna</td><td>
								<?php echo inputan('text', 'namapengguna','col-sm-4','Nama Pengguna ..', 0, $r['nama_pengguna'],'');?>
							</td>
							</tr>	
							<tr>
							<td width="250">Computer Name</td><td>
								
								<?php echo inputan('text', 'compname','col-sm-6','Computer Name ..', 0, $r['computer_name'],'');?>
								
							</td>
							</tr>
							 <tr>
							<td width="250">IP Address</td><td>
								
								<?php echo inputan('text', 'ipadd','col-sm-6','IP Address ..', 0, $r['ip_address'],'');?>
								
							</td>
							</tr>
							
							<tr>
							<td width="250">MAC Address</td><td>
								
								<?php echo inputan('text', 'macadd','col-sm-6','MAC Address ..', 0,$r['mac_address'],'');?>
								
							</td>
							</tr>
							
							<tr>
							<td width="250">Email Address</td><td>
								
								<?php echo inputan('text', 'email','col-sm-6','Email Address..', 0, $r['email_address'],'');?>
								
							</td>
							</tr>
							
							<tr>
							<td width="250">Location</td><td>
								
								<?php echo inputan('text', 'location','col-sm-6','Location ..', 0, $r['location'],'');?>
								
							</td>
							</tr>
							
							<tr>
							<td width="250">BPP Purchasing</td><td>
								
								<?php echo inputan('text', 'bppno','col-sm-4','Nomor BPP ..', 0, $r['bpp_no'],'');?>
								
							</td>
							</tr>
							
							<tr><td>Network Port</td>
                                            <td>
                                                <?php echo textarea('keterangan', '', 'col-sm-6', 2, $r['keterangan'])?>
                                                
                                            </td></tr>
							
							
															</table>
															
														</div>
                                
                            </div>
                        </div>
     
    
									
							 
            


<input type="submit" name="submit" value="simpan" class="btn btn-danger  btn-sm">
            <?php echo anchor($this->uri->segment(1),'kembali',array('class'=>'btn btn-danger btn-sm'));?>
</form>

