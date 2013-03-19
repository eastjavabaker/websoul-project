<h3> Modules &raquo; Page &raquo; Edit Page</h3>
<form action="<?php echo site_url("websoul/page/edit"); ?>" id="editform" name="editform" method="post" autocomplete="off"  class="mainForm" >

<fieldset><?php foreach($query as $v){ ?>
                        <div class="rowElem"><label>Title</label><div class="formRight"><input type="text" id="title" name="title" size="20" class="text-input" value="<?php echo $v->title;?>" /></div></div>
                        <div class="rowElem"><label>Content</label><div class="formRight"><textarea rows="4" cols="" id="content" name="content" ><?php echo $v->content;?></textarea></div><div class="fix"></div></div>
                        
                        <div class="rowElem"><label>Publish</label><div class="formRight"><select id="publish" name="publish" class="text-input">
                <option value="0" <?php echo ($v->publish=='0')?"selected":"";?> >Unpublish</option>
                <option value="1" <?php echo ($v->publish=='1')?"selected":"";?>>Publish</option>
            </select></div><div class="fix"></div></div>
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name()?>" value="<?php echo $this->security->get_csrf_hash()?>" >
                        <input type="hidden" id="page_code" name="page_code" value="<?php echo $v->page_code;?>" />
                        <input type="submit" value="Save" class="button" />
                        <div class="fix"></div>
<?php } ?>
            </fieldset>
</form>
