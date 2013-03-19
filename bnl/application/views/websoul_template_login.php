<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
		<title>Simpla Admin | Sign In</title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="<?php echo site_url();?>assets/css/websoul/reset.css" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="<?php echo site_url();?>assets/css/websoul/style.css" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="<?php echo site_url();?>assets/css/websoul/invalid.css" type="text/css" media="screen" />	
		
		<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
                <META HTTP-EQUIV="Expires" CONTENT="-1">
                <META NAME="GOOGLEBOT" CONTENT="NOARCHIVE">
                <META NAME="ROBOTS" CONTENT="NONE">
                <META NAME="ROBOTS" CONTENT="NOARCHIVE">
                <META NAME="COPYRIGHT" CONTENT="&copy; 2007 Octopus.ws@gmail.com">
		
		<!-- Colour Schemes
	  
		Default colour scheme is green. Uncomment prefered stylesheet to use it.
		
		<link rel="stylesheet" href="resources/css/blue.css" type="text/css" media="screen" />
		
		<link rel="stylesheet" href="resources/css/red.css" type="text/css" media="screen" />  
	 
		-->
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="<?php echo site_url();?>assets/css/websoul/ie.css" type="text/css" media="screen" />
		<![endif]-->
		
		<!--                       Javascripts                       -->
	        <script language="javascript" type="text/javascript">

   document.write('<div id="loading" style="z-index:2; position:absolute;"><img align="absmiddle" src="<?php echo site_url();?>assets/images/facebox/preloader.gif"></div>');
    window.onload=function(){
        document.getElementById("loading").style.display="none";
    
    } </script>
    <script language="javascript" type="text/javascript">
  function clearit(){
           var puser = document.getElementById("puser");
		   var pwd = document.getElementById("pwd");
		   puser.value = '';
		   pwd.value = '';
  }
</script>
		<!-- jQuery -->
		<script type="text/javascript" src="<?php echo site_url();?>assets/js/jquery-1.3.2.min.js"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="<?php echo site_url();?>assets/js/simpla.jquery.configuration.js"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="<?php echo site_url();?>assets/js/facebox.js"></script>
		
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="<?php echo site_url();?>assets/js/jquery.wysiwyg.js"></script>
		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="<?php echo site_url();?>assets/js/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		
	</head>
  
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
				<h1>Simpla Admin</h1>
				<!-- Logo (221px width) -->
				<img id="logo" src="<?php echo site_url();?>assets/images/websoul/logo.png" alt="Simpla Admin logo" />
			</div> <!-- End #logn-top -->
			
			<?php echo $contents;?>			
			
		</div> <!-- End #login-wrapper -->
		
  </body>
  </html>



