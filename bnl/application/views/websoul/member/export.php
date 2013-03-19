<?php 
	$file_date = date('Ymdhis');
    $export_file = "mandala-".$file_date.".xls"; 
    ob_end_clean(); 
    ini_set('zlib.output_compression','Off'); 
    
    header('Pragma: public'); 
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");                  // Date in the past    
    header('Last-Modified: '.gmdate('D, d M Y H:i:s') . ' GMT'); 
    header('Cache-Control: no-store, no-cache, must-revalidate');     // HTTP/1.1 
    header('Cache-Control: pre-check=0, post-check=0, max-age=0');    // HTTP/1.1 
    header ("Pragma: no-cache"); 
    header("Expires: 0"); 
    header('Content-Transfer-Encoding: none'); 
    header('Content-Type: application/vnd.ms-excel;');                 // This should work for IE & Opera 
    header("Content-type: application/x-msexcel");                    // This should work for the rest 
    header('Content-Disposition: attachment; filename="'.basename($export_file).'"'); 

?>
<style type="text/css">
	table th{ background:#ccc; }
</style>

<table cellpadding="0" cellspacing="0" width="100%"> 
    <thead>
    <tr>
        <th width="40">No.</th>
        <th width="80">FBUID</th>
        <th width="140">Name</th>
        <th width="120">Email</th>
	<th width="120">Birthdate</th>
	<th width="120">Hometown</th>
	<th width="120">Location</th>
	<th>Text Pantun</th>
        <th width="120">Created</th>
    </tr>
    </thead><tbody>    
    <?php $i=1;foreach($query as $v){ ?>
    <tr>
        <td valign="top"><?php echo $i+$cur_page;?>.</td>
        <td valign="top"><?php echo "'".$v->fb_uid."'";?></td>
	<td valign="top"><?php echo $v->name;?></td>
        <td valign="top"><?php echo $v->email;?></td>
	<td valign="top"><?php echo date("d M Y",strtotime($v->birthdate));?></td>
	<td valign="top"><?php
		  $home = unserialize($v->hometown);
		  if($home){
		     echo $home['city']. ', ' .$home['state']. ', ' . $home['country'];		  
		  }else{
		     echo "-";
		  }
		  ?></td>
	<td valign="top"><?php
		  $curr = unserialize($v->current_location);
		  if($curr){
		      echo $curr['city']. ', ' .$curr['state']. ', ' . $curr['country'];  
		  }else{
		      echo "-";
		  }	  
		  ?></td>
	<td valign="top"><?php echo $v->yourtext;?></td>
        <td valign="top"><?php echo date("d M Y, H:i",strtotime($v->post_date));?></td>       
    </tr>
    <?php $i++;} ?></tbody>   
</table>