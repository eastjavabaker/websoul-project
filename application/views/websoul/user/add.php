<div class="title"><h5>Administrator &raquo; User &raquo; Add</h5></div>
<form action="<?php echo site_url("websoul/user/add"); ?>" id="addform" name="addform" method="post" autocomplete="off" enctype="multipart/form-data">
<fieldset>
<table>
              
                <tr valign="top">
                  <td width="160">Company *</td>
                  <td><input type="text" id="f_company" name="f_company" class="validate[required] text-input small-input"  /></td>
                </tr>
                <tr valign="top">
                  <td width="160">Company Address *</td>
                  <td><textarea rows="4" cols="" id="f_company_address" name="f_company_address" class="validate[required] text-input small-input"  ></textarea></td>
                </tr>
                <tr valign="top">
                  <td width="160">City *</td>
                  <td><input type="text" id="f_city" name="f_city" class="text-input small-input"  /></td>
                </tr>
                <tr valign="top">
                  <td width="160">Contact Person *</td>
                  <td><input type="text" id="f_contact_person" name="f_contact_person" class="text-input small-input"  /></td>
                </tr>
                <tr valign="top">
                  <td width="160">Department *</td>
                  <td><input type="text" id="f_department" name="f_department" class="text-input small-input"  /></td>
                </tr>
                <tr valign="top">
                  <td width="160">Position *</td>
                  <td><input type="text" id="f_position" name="f_position"  class="text-input small-input"  /></td>
                </tr>
                <tr valign="top">
                  <td width="160">Email *</td>
                  <td><input type="text" id="f_email" name="f_email" class="text-input small-input"  /></td>
                </tr>
                <tr valign="top">
                  <td width="160">Phone </td>
                  <td><input type="text" id="f_phone" name="f_phone" class="text-input small-input"  /></td>
                </tr>
                <tr valign="top">
                  <td width="160">Mobile Phone </td>
                  <td><input type="text" id="f_mobile_phone" name="f_mobile_phone" class="text-input small-input"  /></td>
                </tr>
                <tr valign="top">
                  <td width="160">User Group *</td>
                  <td><select id="sel_group_id" name="sel_group_id" class="text-input small-input" >
            <?php foreach($grouplist as $v){ ?>
            <option value="<?php echo $v->entity_id;?>"><?php echo ucwords($v->group_name);?></option>
            <?php } ?>
        </select></td>
                </tr>
                <tr valign="top">
                  <td width="160">User Status *</td>
                  <td><select id="sel_status_id" name="sel_status_id" class="text-input small-input" >
            <?php foreach($statuslist as $v){ ?>
            <option value="<?php echo $v->entity_id;?>"><?php echo ucwords($v->status_name);?></option>
            <?php } ?>
        </select></td>
                </tr>
                <tr valign="top">
                  <td width="160">Your Password</td>
                  <td><input type="password" id="f_password" name="f_password"  class="text-input small-input"  /></td>
                </tr>
                <tr>
                  <td colspan="2" align="center" valign="top">
		   <input type="submit" class="button" value="Save" /><input type="hidden" name="<?php echo $this->security->get_csrf_token_name()?>" value="<?php echo $this->security->get_csrf_hash()?>" >
		  </td>
                </tr>              
  </table></fieldset></form>
<script>
		jQuery(document).ready(function(){


			jQuery("#addform").validationEngine();

		});
</script>