<div class="title"><h5>Admin Area > User Group</h5></div>
<form action="<?php echo site_url("websoul/group/edit"); ?>" id="editform" name="editform" method="post" autocomplete="off" class="mainForm" >
<fieldset><?php foreach($query as $v){ ?>
                <div class="widget first">
                    <div class="head"><h5 class="iList">Edit User Group</h5></div>
                        <div class="rowElem nobg"><label>Group ID</label><div class="formRight"><input type="text" id="f_entity_id" name="f_entity_id" value="<?php echo $v->entity_id;?>" disabled="disabled" /></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Group Name</label><div class="formRight"><input type="text" id="f_group_name" name="f_group_name" value="<?php echo $v->group_name;?>" /></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Description</label><div class="formRight"><textarea rows="4" cols="" id="f_description" name="f_description" ><?php echo $v->description;?></textarea></div><div class="fix"></div></div>
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name()?>" value="<?php echo $this->security->get_csrf_hash()?>" > 
                        <input type="hidden" id="f_id" name="f_id" value="<?php echo $v->entity_id;?>" />
                        <input type="submit" value="Save" class="basicBtn submitForm mb22" />
                        <div class="fix"></div>

                </div><?php } ?>
            </fieldset>
</form>