 <h3> Modules &raquo; Article &raquo; Add</h3>
            <table>
              <form action="<?php echo site_url("websoul/article/add"); ?>" id="addform" name="addform" method="post" enctype="multipart/form-data">
                <tr valign="top">
                  <td width="120">Title  *</td>
                  <td><input type="text" name="title" id="title" class="text-input small-input" />
		  </td>
                </tr>
                <tr>
                  <td width="120" valign="top">Content*</td>
                  <td valign="top"><textarea rows="5" cols="100" name="content" id="content" class="text-input small-input" /></textarea></td>
                </tr>
                <tr>
                  <td valign="top" bgcolor="#cccccc">Picture</td>
                  <td bgcolor="#cccccc"><input type="file" name="picture" id="picture" size="20" class="text-input" /></td>
                </tr>
                <tr valign="top">
                  <td width="120">Editor  *</td>
                  <td><select name="editor" id="editor"  class="text-input small-input">
		           <option value="0">-- Select Editor --</option>
			   <?php foreach($editor as $v){ ?>
			         <option value="<?php echo $v->fb_uid; ?>"><?php echo $v->name." (".$v->email.")"; ?></option>
			   <?php } ?>
		      </select>
		  </td>
                </tr>
		<tr valign="top">
                  <td width="120">Publish</td>
                  <td>
		    <input type="radio" name="publish" value="1" /> Publish <input type="radio" name="publish" value="0" checked="checked" /> Unpublish
		  </td>
                </tr>
                <tr>
                  <td colspan="2" align="center" valign="top">
		   <input type="submit" class="button" value="Save" />
		  </td>
                </tr>
              </form>
            </table>
