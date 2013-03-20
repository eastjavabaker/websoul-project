<div class="title"><h5>Admin Area > User Group</h5></div>
<?php echo $this->session->flashdata('notification'); ?>
<form id="fdelete" action="<?php echo site_url("websoul/group/delete"); ?>" method="post" class="mainForm"><fieldset>
<div class="widget first">
        	<div class="head"><h5 class="iFrames">User Group List</h5></div>
            <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic"> 
    <thead>
    <tr>
        <td>No.</td>
        <td>Group ID</td>
        <td>Group Name</td>
        <td>Description</td>
        <td>Created</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr></thead>
    <tbody>
    <?php $i=1;foreach($query as $v){ ?>
    <tr>
        <td><?php echo $i;?>.</td>
        <td><?php echo $v->entity_id;?></td>
        <td><?php echo $v->group_name;?></td>
        <td><?php echo $v->description;?></td>
        <td><?php echo $v->created;?></td>
        <td><a title="Edit this record" href="<?php echo site_url("websoul/group/edit/".$v->entity_id); ?>"><img src="<?php echo site_url(); ?>assets/images/icons/dark/pencil.png" alt="" /></a></td>
        <td><input type="checkbox" id="chk<?php echo $i;?>" name="chk[<?php echo $i;?>]" value="<?php echo $v->entity_id;?>" />      
        </td>
    </tr>
    <?php $i++;} ?></tbody>   
</table></div> </fieldset></form>
<?php echo $paging; ?><br>
<input type="button" id="btnadd" name="btnadd" class="basicBtn submitForm mb22" value="Add" onclick="location.href='<?php echo site_url("websoul/group/add"); ?>'" /><input type="button" id="btndelete" name="btndelete" value="Delete" onclick="document.getElementById('fdelete').submit()" class="basicBtn submitForm mb22"  />