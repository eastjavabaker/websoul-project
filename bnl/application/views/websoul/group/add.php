<div class="title"><h5>Admin Area > User Group</h5></div>
<form action="<?php echo site_url("websoul/group/add"); ?>" id="addform" name="addform" method="post" autocomplete="off" class="mainForm" >
<fieldset>
                <div class="widget first">
                    <div class="head"><h5 class="iList">Add User Group</h5></div>
                        <div class="rowElem nobg"><label>Group ID</label><div class="formRight"><input type="text" id="f_entity_id" name="f_entity_id" /></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Group Name</label><div class="formRight"><input type="text" id="f_group_name" name="f_group_name" /></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Description</label><div class="formRight"><textarea rows="4" cols="" id="f_description" name="f_description" ></textarea></div><div class="fix"></div></div>
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name()?>" value="<?php echo $this->security->get_csrf_hash()?>" >  
                        <input type="submit" value="Save" class="basicBtn submitForm mb22" />
                        <div class="fix"></div>

                </div>
            </fieldset>
</form>