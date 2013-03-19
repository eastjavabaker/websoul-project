<div id="login-content">
				
				<form action="<?php echo site_url('websoul/login/post'); ?>" id="f_login" class="mainForm" method="post" >
				
					<!--<div class="notification information png_bg">
						<div>
							Just click "Sign In". No password needed.
						</div>
					</div> -->
					
					<p>
						<label>Username</label>
						<input class="text-input" type="text" name="txt_email" id="txt_email" type="text" />
					</p>
					<div class="clear"></div>
					<p>
						<label>Password</label>
						<input class="text-input" type="password" name="pwd_password" id="pwd_password" type="password" />
					</p>
					<div class="clear"></div>
					<p id="remember-password">
						<input type="checkbox" />Remember me
					</p>
					<div class="clear"></div>
					<p>
						<input class="button" type="submit" value="Sign In" />
					</p>
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name()?>" value="<?php echo $this->security->get_csrf_hash()?>" >
					
				</form>
			</div> <!-- End #login-content -->