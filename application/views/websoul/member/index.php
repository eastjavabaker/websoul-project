<!-- Content -->
<script language="javascript" >
function delRec() {    
    var check = confirm("Are you sure to delete selected record ? ");
        if(check){		
            document.getElementById('fdelete').submit();
        }  
}

function exports(opt){
         window.location.href = '<?php echo site_url('websoul/member/export');?>/' + opt;
}

</script><br><br>
<?php if($this->session->flashdata('notification')){?>

<div class="notification success">

<div><?php echo $this->session->flashdata('notification'); ?></div>

</div>

<?php } ?>
<h3><?php if(preg_match("/websoul\/member/",$_SERVER['REQUEST_URI'])) { echo "All Member List"; } else { echo "Quiz Registrant ";echo ((preg_match("/quiz2/",$_SERVER['REQUEST_URI'])))?"Bangkok":"Padang";}?></h3>
<?php if(preg_match("/websoul\/quiz/",$_SERVER['REQUEST_URI'])) { ?>
<strong>Date Period :</strong><br><br>
<form action="<?php echo site_url("websoul/member/period");echo ((preg_match("/quiz2/",$_SERVER['REQUEST_URI'])))?"2":""; ?>" method="post" >
<strong>Date from :</strong>
<select id="dayfrom" name="dayfrom">
    <option value="0">-Day-</option>
    <?php for($d=1;$d<=31;$d++){?>
    <option value="<?php echo $d;?>"><?php echo $d;?></option>
    <?php }?>
</select>

<select id="monthfrom" name="monthfrom">
    <?php foreach($arrmonth as $key=>$month){ ?>
    <option value="<?php echo $key;?>"><?php echo $month;?></option>
    <?php }?> 
</select>

<select id="yearfrom" name="yearfrom">
    <option value="0">-Year-</option>
    <?php for($e=2012;$e<=2013;$e++){?>
    <option value="<?php echo $e;?>"><?php echo $e;?></option>
    <?php }?>
</select>

<strong>-
Date to :</strong>
<select id="dayto" name="dayto">
    <option value="0">-Day-</option>
    <?php for($d=1;$d<=31;$d++){?>
    <option value="<?php echo $d;?>"><?php echo $d;?></option>
    <?php }?>
</select>

<select id="monthto" name="monthto">
    <?php foreach($arrmonth as $key=>$month){ ?>
    <option value="<?php echo $key;?>"><?php echo $month;?></option>
    <?php }?>
</select>

<select id="yearto" name="yearto">
    <option value="0">-Year-</option>
    <?php for($e=2012;$e<=2013;$e++){?>
    <option value="<?php echo $e;?>"><?php echo $e;?></option>
    <?php }?>
</select>

<input type="submit" class="button" value="Submit" />

</form>
<?php } ?>
<form id="fdelete" action="<?php echo site_url("websoul/member/delete"); ?>" method="post" class="mainForm"><fieldset>
<div class="pagination" style="padding-bottom: 10px;"><?php echo $paging." ( $total record(s) )"; ?></div>
            <table cellpadding="0" cellspacing="0" width="100%"> 
    <thead>
    <tr>
        <th width="40">No.</th>
	<th width="50">&nbsp</th> 
        <th width="80">FBUID</th>
        <th width="140">Name</th>
        <th width="120">Email</th>
        <th width="120">Created</th>
        <?php if(preg_match("/websoul\/member/",$_SERVER['REQUEST_URI'])) { ?><th width="20">&nbsp;</th>
        <th width="20">&nbsp;</th><?php } ?>
    </tr>
    </thead><tbody>    
    <?php $i=1;foreach($query as $v){ ?>
    <tr>
        <td valign="top"><?php echo $i+$cur_page;?>.</td>
        <td valign="top"><img src="https://graph.facebook.com/<?php echo $v->fb_uid;?>/picture" /></td>
        <td valign="top"><?php echo $v->fb_uid;?></td>
	<td valign="top"><?php echo $v->name;?></td>
        <td valign="top"><?php echo $v->email;?></td>
        <td valign="top"><?php echo date("d M Y, H:i",strtotime($v->post_date));?></td>
        <td valign="top"><a title="Detil View" href="<?php echo site_url("websoul/member/view/".$v->fb_uid); ?>"><img src="<?php echo site_url(); ?>assets/images/icons/dark/locked.png" alt="" /></a></td>
        <?php if(preg_match("/websoul\/member/",$_SERVER['REQUEST_URI'])) { ?><td valign="top"><input type="checkbox" id="chk<?php echo $i;?>" name="chk[<?php echo $i;?>]" value="<?php echo $v->fb_uid;?>" />      
        </td><?php } ?>
    </tr>
    <?php $i++;} ?></tbody>   
</table></form>
<div class="pagination"><?php echo $paging." ( $total record(s) )"; ?></div>
<?php if(preg_match("/websoul\/member/",$_SERVER['REQUEST_URI'])) { ?><input type="button" id="btndelete" name="btndelete" class="button" value="Delete" onclick="document.getElementById('fdelete').submit()"  /> <input type="button" id="btnexport" name="btnexport" class="button" value="Export All Data" onclick="exports('0')"  /> <?php }else{ ?><input type="button" id="btnexport" name="btnexport" class="button" value="Export Quiz Registrant" onclick="exports('1')"  /><?php } ?>