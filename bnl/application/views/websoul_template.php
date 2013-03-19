<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<META NAME="GOOGLEBOT" CONTENT="NOARCHIVE">
<META NAME="ROBOTS" CONTENT="NONE">
		<script language="javascript" type="text/javascript">
   document.write('<div align="right" id="loading" style="float:right;padding:10px;"><img align="absmiddle" src="<?php echo base_url(); ?>assets/images/loaders/loader7.gif"></div>');
    window.onload=function(){
        document.getElementById("loading").style.display="none";        
    } </script>
		<title>Websoul</title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="<?php echo site_url();?>assets/css/websoul/reset.css" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="<?php echo site_url();?>assets/css/websoul/style.css" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="<?php echo site_url();?>assets/css/websoul/invalid.css" type="text/css" media="screen" />	
		<link rel="stylesheet" media="all" href="<?php echo base_url('assets/css');?>/standalone.css" type="text/css" />
                
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="<?php echo site_url();?>assets/css/websoul/ie.css" type="text/css" media="screen" />
		<![endif]-->
		
		<!--                       Javascripts                       -->
  
		<!-- jQuery -->
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-1.7.2.min.js"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/simpla.jquery.configuration.js"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/facebox.js"></script>

                
		<!-- jQuery Datepicker Plugin -->
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.autoheight.js"></script>
		<!--[if IE]><script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.bgiframe.js"></script><![endif]-->

		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="<?php echo base_url()?>assets/js/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>assets/jquery-validation-1.11.0/demo/css/screen.css" />
	</head>
  
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
			<h1 id="sidebar-title"><a href="#">Websoul</a></h1>
		  
			<!-- Logo (221px wide) -->
			<a href="#"><img id="logo" src="<?php echo base_url(); ?>assets/images/websoul/logo.png" alt="Simpla Admin logo" /></a>
		  
			<!-- Sidebar Profile links -->
			<div id="profile-links">
				Hello, <a href="#" title="Edit your profile"><?php echo $this->session->userdata('username_session'); ?></a><!--, you have <a href="#messages" rel="modal" title="3 Messages">3 Messages</a> --><br />
				<br />
				<a href="<?php echo site_url();?>" title="View the Site" target="_blank">View the Site</a> | <a title="Logout" href="<?php echo site_url('websoul/login/logout')?>">Logout</a>
			</div>        
			
			<ul id="main-nav">  <!-- Accordion Menu -->
				
				<li>
					<a href="<?php echo site_url('websoul');?>" class="nav-top-item no-submenu"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						Dashboard
					</a>       
				</li>
				<li><a href="<?php echo site_url('websoul/user');?>" class="nav-top-item no-submenu <?php echo (preg_match("/websoul\/user/",$_SERVER['REQUEST_URI']))?"current":""; ?>" >User Management</a></li>
	<li><a class="nav-top-item no-submenu <?php echo (preg_match("/websoul\/member/",$_SERVER['REQUEST_URI']))?"current":""; ?>" href="<?php echo site_url('websoul/member');?>">Member</a>
	</li>
	<li><a class="nav-top-item no-submenu <?php echo (preg_match("/websoul\/article/",$_SERVER['REQUEST_URI']))?"current":""; ?>" href="<?php echo site_url('websoul/article');?>">Article</a>
	</li>
			</ul> <!-- End #main-nav -->
			
			</div></div> <!-- End #sidebar -->
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			<h2>Welcome <?php  ?></h2>
			<p id="page-intro">What would you like to do?</p>
			 <?php echo $contents;?>
			
			<div id="footer">
				<small> <!-- Remove this notice or replace it with whatever you want -->
						Copyright 2013 - | Powered by <a href="http://www.digify.us">Digify</a> | <a href="#">Top</a>
				</small>
			</div><!-- End #footer -->
			
		</div> <!-- End #main-content -->
		
	</div></body>
  

<!-- Download From www.exet.tk-->
</html>