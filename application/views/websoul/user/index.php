<!-- Content -->
<script language="javascript" >
function delRec() {    
    var check = confirm("Are you sure to delete selected record ? ");
        if(check){		
            document.getElementById('fwork').submit();
        }  
}
</script><br><br>

<?php if($this->session->flashdata('notification')){?>
<div class="notification success">
<div><?php echo $this->session->flashdata('notification'); ?></div>
</div>
<?php } ?>
<form id="fdelete" action="<?php echo site_url("websoul/user/delete"); ?>" method="post" class="mainForm"><fieldset>
<h3>Administrator &raquo; User &raquo; List</h3>
            <table cellpadding="0" cellspacing="0" width="100%"> 
    <thead>
    <tr>
        <th>No.</th>
        <th>Contact Person</th>
        <th>Group</th>
        <th>Company</th>
        <th>City</th>
        <th>Email</th>
        <th>Status</th>
        <th>Created</th>
        <th width="20">&nbsp;</th>
        <th width="20">&nbsp;</th>
    </tr></thead><tbody>    
    <?php $i=1;foreach($query as $v){ ?>
    <tr>
        <td><?php echo $i;?>.</td>
        <td><?php echo $v->contact_person;?></td>
        <td><?php echo $v->group_name;?></td>
        <td><?php echo $v->company;?></td>
        <td><?php echo $v->city;?></td>
        <td><?php echo $v->email?></td>
        <td><?php echo $v->status_name;?></td>
        <td><?php echo date("d M Y, H:i",strtotime($v->created));?></td>
        <td><a title="Edit this record" href="<?php echo site_url("websoul/user/edit/".$v->entity_id); ?>"><img src="<?php echo site_url(); ?>assets/images/icons/dark/pencil.png" alt="" /></a></td>
        <td><input type="checkbox" id="chk<?php echo $i;?>" name="chk[<?php echo $i;?>]" value="<?php echo $v->entity_id;?>" />      
        </td>
    </tr>
    <?php $i++;} ?></tbody>   
</table></form>
<div class="pagination"><?php echo $paging; ?></div>
<input type="button" id="btnadd" name="btnadd" class="button" value="Add" onclick="location.href='<?php echo site_url("websoul/user/add"); ?>'" /><input type="button" id="btndelete" name="btndelete" class="button" value="Delete" onclick="document.getElementById('fdelete').submit()"  />