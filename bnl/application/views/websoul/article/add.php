<h3> Modules &raquo; Article &raquo; Add</h3>
<form class="cmxform" action="<?php echo site_url("websoul/article/add"); ?>" id="addform" name="addform" method="post" enctype="multipart/form-data">
    <fieldset>
        <table>
            <tr>
                <td width="120" valign="top"><strong>Category *</strong></td>
                <td>
                    <div style="width: 50%; float: left;"><select name="category" id="category" class="text-input large-input" >
                        <option value="">-- Select Category --</option>
                        <?php foreach ($cat as $vcat){?>
                        <option value="<?php echo $vcat->id;?>"><?php echo $vcat->category;?></option>
                        <?php } ?>
                    </select></div>
                    
                    <div style="width: 28px; height: 28px; margin-top: 6px; float: left;"><a href="#" id="addcategory" title="Add new category"><img src="<?php echo base_url(); ?>assets/images/websoul/icons/plus-icon-28.png" rel="modal" /></a></div>
                </td>
            </tr>
            <tr>
                <td width="120" valign="top"><strong>Title *</strong></td>
                <td><input type="text" name="title" id="title" class="text-input large-input" /></td>
            </tr>
            <tr>
                <td width="120" valign="top"><strong>Short Content *</strong></td>
                <td valign="top"><textarea rows="3" cols="100" name="txtsortcontent" id="txtsortcontent" class="textarea" /></textarea></td>
            </tr>
            <tr>
                <td width="120" valign="top"><strong>Content *</strong></td>
                <td valign="top"><textarea rows="5" cols="100" name="txtcontent" id="txtcontent" class="textarea" /></textarea>
                    <div id="contentnotif" class="errorx" style="font-weight: bold;" >Please enter an article content.</div>
                </td>
            </tr>
            <tr>
                <td valign="top" bgcolor="#cccccc"><strong>Picture</strong></td>
                <td bgcolor="#cccccc"><input type="file" name="picture" id="picture" size="20" class="text-input" /></td>
            </tr>
            <tr valign="top">
                <td width="120"><strong>SEO Title</strong></td>
                <td><input type="text" name="seotitle" id="seotitle" class="text-input large-input" />
                </td>
            </tr>
            <tr>
                <td width="120" valign="top"><strong>Meta Description</strong></td>
                <td valign="top"><textarea rows="5" cols="100" name="meta_desc" id="meta_desc" class="textarea" /></textarea></td>
            </tr>
            <tr>
                <td width="120" valign="top"><strong>Meta Keywords</strong></td>
                <td valign="top"><textarea rows="5" cols="100" name="meta_key" id="meta_key" class="textarea" /></textarea></td>
            </tr>		
            <tr valign="top">
                <td width="120"><strong>Publish</strong></td>
                <td>
                    <input type="radio" name="publish" value="1" /> Publish <input type="radio" name="publish" value="0" checked="checked" /> Unpublish
                </td>
            </tr>
            <tr valign="top" id="publishd">
                <td width="120">&nbsp;</td>
                <td><strong>Publish Date : From :</strong>
                    <select id="dayfrom" name="dayfrom">
                        <option value="0">-Day-</option>
                        <?php for ($d = 1; $d <= 31; $d++) { ?>
                            <option value="<?php echo $d; ?>" <?php echo ($d == date('d')) ? 'selected="selected"' : ""; ?> ><?php echo $d; ?></option>
                        <?php } ?>
                    </select>

                    <select id="monthfrom" name="monthfrom">
                        <?php foreach ($arrmonth as $key => $month) { ?>
                            <option value="<?php echo $key; ?>" <?php echo ($key == date('m')) ? 'selected="selected"' : ""; ?>><?php echo $month; ?></option>
                        <?php } ?> 
                    </select>

                    <select id="yearfrom" name="yearfrom">
                        <option value="0">-Year-</option>
                        <?php for ($e = 2012; $e <= 2015; $e++) { ?>
                            <option value="<?php echo $e; ?>"  <?php echo ($e == date('Y')) ? 'selected="selected"' : ""; ?>><?php echo $e; ?></option>
                        <?php } ?>
                    </select> - <strong>To :</strong>
                    <select id="dayto" name="dayto">
                        <option value="0">-Day-</option>
                        <?php for ($d = 1; $d <= 31; $d++) { ?>
                            <option value="<?php echo $d; ?>" <?php echo ($d == date('d')) ? 'selected="selected"' : ""; ?>><?php echo $d; ?></option>
                        <?php } ?>
                    </select>

                    <select id="monthto" name="monthto">
                        <?php foreach ($arrmonth as $key => $month) { ?>
                            <option value="<?php echo $key; ?>" <?php echo ($key == date('m')) ? 'selected="selected"' : ""; ?>><?php echo $month; ?></option>
                        <?php } ?>
                    </select>

                    <select id="yearto" name="yearto">
                        <option value="0">-Year-</option>
                        <?php for ($e = 2012; $e <= 2015; $e++) { ?>
                            <option value="<?php echo $e; ?>" <?php echo ($e == date('Y')) ? 'selected="selected"' : ""; ?>><?php echo $e; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" valign="top">
                    <input type="submit" class="button" value="Save" /><input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" >
                </td>
            </tr>

        </table>
        <input type="hidden" id="tmp"  />
    </fieldset></form>

<div id="messages" class="overlay_box" style="display: none">    
    <a href="#" id="boxclose" ><img src="<?php echo base_url('assets/images/websoul');?>/close.png" /></a>
    <a href="#" id="boxtitle" >Article Category</a>
    <div style=" clear: both;"></div>   
    <div id="content">
        <table width="360" class="cmxform">
            <tr>
                <th width="60"><strong>Cat. ID</strong></th>
                <th width="160"><strong>Category Name</strong></th>
                <th><strong>Description</strong></th>
            </tr>
            <?php foreach ($cat as $vcat){?>
            <tr>
                <td><?php echo $vcat->id;?>.</td>
                <td><?php echo $vcat->category;?></td>
                <td><?php echo $vcat->description;?></td>
            </tr>
            <?php }?>
        </table>            
    </div>		
</div> <!-- End #messages -->

<script type="text/javascript" src="<?php echo site_url(); ?>assets/js/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url('assets/js');?>/jquery.tools.min.js"></script>
<script src="<?php echo site_url(); ?>assets/jquery-validation-1.11.0/dist/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript">
    //<![CDATA[
    
    CKEDITOR.on('instanceCreated', function (e) {
        e.editor.on('blur', function (ev) {
            $('#txtcontent').val(ev.editor.getData());
        });
    });
    
    var config = { extraPlugins: 'onchange'};
    
    CKEDITOR.replace( 'txtcontent',
    {
        toolbar : 'Basic',
        enterMode : CKEDITOR.ENTER_BR
    });
    //]]>
    
                        $('#addcategory').click( function (){
                            $(".overlay_box").overlay({
                                top: 260,
                                mask: {
                                    color: '#000',
                                    loadSpeed: 200,
                                    opacity: 0.7
                                },
                                closeOnClick: true,
                                load: true,
                                oneInstance: true
                                
                            }).load();
                        })
                        
                        $('#boxclose').click( function (){
                            $(".overlay_box").overlay().close();
                        })
    
    $(document).ready(function() {
        
        $('#publishd').hide();
        
        $('#contentnotif').hide();
        
        $("#addform").validate({
            rules: {
                category: "required",
                title: "required",
                txtsortcontent: "required",
                txtcontent: "required"
            },
            messages: {
                category: "Please enter an article category.",
                title: "Please enter an article title.",
                txtsortcontent: "Please enter an article short content.",
                txtcontent: "Please enter an article content."
            }
        });
        
    });
			    
    $('input[name=publish]').click( function (){
        if($('input[name=publish]:checked').val() == '1'){
            $('#publishd').show('slow');
        }else{
            $('#publishd').hide('slow');
        }
    });	
			    
    $("form").submit( function() {

        var messageLength = CKEDITOR.instances['txtcontent'].getData().replace(/<[^>]*>/gi, '').length;
        if( !messageLength ) {
            $('#contentnotif').show();
        }else{
            $('#contentnotif').hide();
        }

    });

</script>