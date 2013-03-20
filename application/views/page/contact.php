<div id="contact">
<form id="formcnt" action="<?php echo site_url('page/post3');?>" method="post" enctype="multipart/form-data" >
	<div id="form-contact">
        
	      <table width="100%" border="0" cellpadding="4" cellspacing="0" >
		    <tr>
				<td width="230" style="padding-left: 0;">Nama Lengkap</td>
				<td><input type="text" id="name" name="name" value="<?php echo $data[0]['name'];?>" /></td>
		    </tr>
		    <tr>
				<td style="padding-left: 0;">Email</td>
				<td><input type="text" id="email" name="email" value="<?php echo $data[0]['email'];?>" /></td>
		    </tr>
		    <tr>
				<td style="padding-left: 0;">Pesan</td>
				<td>
				    <textarea id="pesan" name="pesan"></textarea>		
				</td>
		    </tr>
		    <tr>
				<td>&nbsp</td>
				<td>
				<img src="<?php echo base_url('captcha');?>/captcha.php?<?php echo rand(0,1000);?>" id="captcha" />				
				</td>
		    </tr>
		    <tr>
				<td style="padding-left: 0;">Kode verifikasi</td>
				<td>
				<input type="text" name="captcha" id="captcha-form" autocomplete="off" />
				</td>
		    </tr>
	      </table>
	
	</div>
	<div style="width:204px; height: 53px; margin: 0 auto; margin-top: 28px;"><input type="image" src="<?php echo base_url('assets/images');?>/kirim.png" /></div></form>
</div>

