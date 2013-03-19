<div class="title"><h5>Admin Area > Modules</h5></div>
<form action="<?php echo site_url("websoul/modules/add"); ?>" id="addform" name="addform" method="post" autocomplete="off"  class="mainForm" >

<fieldset>
                <div class="widget first">
                    <div class="head"><h5 class="iList">Add Modules</h5></div>
                        <div class="rowElem nobg"><label>Parent</label><div class="formRight"><select id="sel_root_id" name="sel_root_id" >
            <?php foreach($parentlist as $v){ ?>
            <option value="<?php echo $v->entity_id;?>"><?php echo ucwords($v->module_name);?></option>
            <?php } ?>
        </select></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Sequence</label><div class="formRight"><input type="text" id="f_level" name="f_level" /></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Module ID</label><div class="formRight"><input type="text" id="f_module_code" name="f_module_code" /></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Module Name</label><div class="formRight"><input type="text" id="f_module_name" name="f_module_name" /></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Description</label><div class="formRight"><textarea rows="4" cols="" id="f_description" name="f_description" ></textarea></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Path</label><div class="formRight"><input type="text" id="f_path" name="f_path" /></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Status</label><div class="formRight"><select id="sel_status" name="sel_status">
                <option value="0">Disable</option>
                <option value="1">Enable</option>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name()?>" value="<?php echo $this->security->get_csrf_hash()?>" >
            </select></div><div class="fix"></div></div>  
                        <input type="submit" value="Save" class="basicBtn submitForm mb22" />
                        <div class="fix"></div>

                </div>
            </fieldset>
</form>
