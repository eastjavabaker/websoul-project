<div class="title"><h5>Administrator &raquo; User &raquo; Edit</h5></div>
<?php foreach($query as $v){ ?>
<form action="<?php echo site_url("websoul/user/edit"); ?>" id="editform" name="editform" method="post" autocomplete="off" class="mainForm" >
<fieldset>
<table>  
                <tr valign="top">
                  <td width="160">Company *</td>
                  <td><input type="text" id="f_company" name="f_company" class="text-input small-input" value="<?php echo $v->company;?>" /></td>
                </tr>
                <tr valign="top">
                  <td width="160">Company Address *</td>
                  <td><textarea rows="4" cols="" id="f_company_address" name="f_company_address" class="text-input small-input"  ><?php echo $v->company_address;?></textarea></td>
                </tr>
                <tr valign="top">
                  <td width="160">City *</td>
                  <td><input type="text" id="f_city" name="f_city" class="text-input small-input" value="<?php echo $v->city;?>" /></td>
                </tr>
                <tr valign="top">
                  <td width="160">Contact Person *</td>
                  <td><input type="text" id="f_contact_person" name="f_contact_person" class="text-input small-input" value="<?php echo $v->contact_person;?>" /></td>
                </tr>
                <tr valign="top">
                  <td width="160">Department *</td>
                  <td><input type="text" id="f_department" name="f_department" class="text-input small-input" value="<?php echo $v->department;?>" /></td>
                </tr>
                <tr valign="top">
                  <td width="160">Position *</td>
                  <td><input type="text" id="f_position" name="f_position"  class="text-input small-input" value="<?php echo $v->position;?>" /></td>
                </tr>
                <tr valign="top">
                  <td width="160">Email *</td>
                  <td><input type="text" id="f_email" name="f_email" class="text-input small-input" value="<?php echo $v->email;?>" /></td>
                </tr>
                <tr valign="top">
                  <td width="160">Phone </td>
                  <td><input type="text" id="f_phone" name="f_phone" class="text-input small-input" value="<?php echo $v->phone;?>" /></td>
                </tr>
                <tr valign="top">
                  <td width="160">Mobile Phone </td>
                  <td><input type="text" id="f_mobile_phone" name="f_mobile_phone" class="text-input small-input" value="<?php echo $v->mobile_phone;?>" /></td>
                </tr>
                <tr valign="top">
                  <td width="160">User Group *</td>
                  <td><select id="sel_group_id" name="sel_group_id" class="text-input small-input" >
           <?php foreach($grouplist as $v2){ ?>
            <option value="<?php echo $v2->entity_id;?>" <?php echo ($v2->entity_id==$v->group_entity_id)?"selected='selected'":""; ?> ><?php echo ucwords($v2->group_name);?></option>
            <?php } ?>
        </select></td>
                </tr>
                <tr valign="top">
                  <td width="160">User Status *</td>
                  <td><select id="sel_status_id" name="sel_status_id" class="text-input small-input" >
            <?php foreach($statuslist as $v2){ ?>
            <option value="<?php echo $v2->entity_id;?>" <?php echo ($v2->entity_id==$v->status)?"selected='selected'":""; ?> ><?php echo ucwords($v2->status_name);?></option><?php } ?>
        </select></td>
                </tr>
                <tr valign="top">
                  <td width="160">Your Password</td>
                  <td><input type="password" id="f_password" name="f_password"  class="text-input small-input"  /></td>
                </tr>
                <tr>
                  <td colspan="2" align="center" valign="top">
		   <input type="hidden" id="f_id" name="f_id" value="<?php echo $v->entity_id;?>" />
                        <input type="submit" value="Save" class="button" /><input type="hidden" name="<?php echo $this->security->get_csrf_token_name()?>" value="<?php echo $this->security->get_csrf_hash()?>" >
		  </td>
                </tr>              
  </table></fieldset></form><?php } ?>