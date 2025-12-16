<h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <?php echo anchor('dashboard',"Dashboard");?></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Print Record</li>
    </ol>
</div>

<?php
echo $this->session->flashdata('pesan');
echo form_open_multipart($this->uri->segment(1).'/cetak');

?>
 <div class="row">
                        <div class="col-md-12 clearfix">
                            <ul id="example-tabs" class="nav nav-tabs" data-toggle="tabs">
                                <li class="active"><a href="#identitas">Filter</a></li>
                                
                                
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="identitas">
                                    <table class="table table-bordered">
                                        <tr class="success"><th colspan="2">Filter</th></tr>
	
	<tr>
    <td width="250">Department</td><td>
        <?php echo buatcombo('deptcode', 'departments', 'col-sm-4', 'dept_name', 'code', '', array('id'=>'code'))?>
    </td>
    </tr>	
   
	<tr>
    <td width="250"></td><td>
        
    </td>
    </tr>
	
                                    </table>
                                    
                                </div>


<input type="submit" name="submit" value="PRINT" class="btn btn-danger  btn-sm">
</form>

