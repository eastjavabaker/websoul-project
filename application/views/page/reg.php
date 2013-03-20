<div id="mainquiz"><form id="formnya" action="<?php echo site_url('page/post');?>" method="post" enctype="multipart/form-data" >
	<div id="id1">
			<div id="btninvite"><img src="<?php echo base_url('assets/images');?>/invite.png" onclick="sendRequest()" /></div>
	</div>
	<div id="id2">
			<div id="txtquiz">
					<img src="<?php echo base_url('assets/images');?>/txtquiz.gif" />	
			</div>
			<div style="height: 126px; width: 366px; margin-left: 34px;">
			

    <textarea name="text" id="text" value="" rows="5" style=" width: 366px; height: 126px; resize: none; max-height: 126px;"  ></textarea>
    <input type="hidden" id="flist" name="flist" value="" />
</div>
		<div style="width: 211px; height: 61px; margin: 0 auto; margin-top: 8px;">
			<input type="image" src="<?php echo base_url('assets/images');?>/done.png"  />
		</div>	
	</div>
	</form>
</div>
