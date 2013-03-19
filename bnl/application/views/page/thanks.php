<div id="thanks"> 
<form id="thxform" action="<?php echo site_url('page/post2');?>" method="post" enctype="multipart/form-data" >
    <div id="thankscontent">
    <input type="text" name="name" id="name" class="inputtxt" value="<?php echo $data[0]['name'];?>" placeholder="Nama Lengkap..." />
    <input type="text" name="email" id="email" class="inputtxt" value="<?php echo $data[0]['email'];?>" placeholder="Email..."  />
    <input type="text" name="phone" id="phone" class="inputtxt" value="" placeholder="No. Hp..."  />    
    
    <div style="width:211px; height: 61px; margin: 0 auto; margin-top: 14px;"><input type="image" src="<?php echo base_url('assets/images');?>/done.png" /></div>
    </div>     
</form>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		if ($.browser.msie) {         //this is for only ie condition ( microsoft internet explore )
			$('input[type="text"][placeholder], textarea[placeholder]').each(function () {
				var obj = $(this);

				if (obj.attr('placeholder') != '') {
					obj.addClass('IePlaceHolder');

					if ($.trim(obj.val()) == '' && obj.attr('type') != 'password') {
						obj.val(obj.attr('placeholder'));
					}
				}
			});

			$('.IePlaceHolder').focus(function () {
				var obj = $(this);
				if (obj.val() == obj.attr('placeholder')) {
					obj.val('');
				}
			});

			$('.IePlaceHolder').blur(function () {
				var obj = $(this);
				if ($.trim(obj.val()) == '') {
					obj.val(obj.attr('placeholder'));
				}
			});
		}
	});
</script>