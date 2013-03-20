<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mandala Treat a Trip</title>

<link rel="stylesheet" media="all" href="<?php echo base_url('assets/css');?>/index.css" type="text/css" />
<link rel="stylesheet" media="all" href="<?php echo base_url('assets/css');?>/standalone.css" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="<?php echo base_url('assets/js');?>/jquery.tools.min.js"></script>
<script src="<?php echo base_url('assets/js');?>/cufon.js"></script>
<script src="<?php echo base_url('assets/js');?>/DIN_900.font.js"></script>
<script type="text/javascript">
			Cufon.replace('.menu', { fontFamily: 'DIN' });			
</script>
<!--[if gte IE 9]> <script type="text/javascript"> Cufon.set('engine', 'canvas'); </script> <![endif]-->
</head>

<body>
<div id="wrapper" class="reg" >
	<div id="menu">
		<div>
		<ul id="navlist">
			<li style="width: 105px; text-align: center;"><a href="<?php echo site_url('page/how');?>" class="menu" >HOW TO PLAY</a></li>
			<li style="width: 102px; text-align: center;"><a href="<?php echo site_url('page/contact');?>" class="menu">CONTACT US</a></li>
			<li style="width: 60px; text-align: center;"><a href="<?php echo site_url('page/reg');?>" class="menu">QUIZ</a></li>
			<li style="width: 146px; text-align: center;"><a href="<?php echo site_url('page/tnc');?>" class="menu">TERMS & CONDITIONS</a></li>
		</ul></div>
	</div>
      <?php echo $contents;?>
</div>
<div id="validate">
    <p class="close" style="color: #000; width: 40px; height: 36px; float: right; cursor: pointer; "><img src="<?php echo base_url('assets/images');?>/close.png" /></p>
    <div style=" clear: both;"></div>
    <div id="valid_list">
	
    </div>
</div>
<div id="preload">
    <img src="<?php echo base_url('assets/images/loaders');?>/loader8.gif" />
</div>
<div id="thx">
    <div><h2>Pesan anda telah terkirim.</h2></div>
</div>
<div id="fb-root"></div>
<script src="https://connect.facebook.net/en_US/all.js"></script>
<script type="text/javascript">

    FB.init({ apiKey:"269170126538550", status: true, cookie:true, xfbml: true });
      
    FB.Canvas.setSize({ width: 810, height: 589 });
        FB.Event.subscribe('edge.create',
            function(response) {
                window.location = "<?php echo site_url('home');?>"; 
            }
        );
    
     
     
    
</script>


<script type="text/javascript">

    $(document).ready(function() {
               
	       
	       //$.post("test.php", $("#testform").serialize());
	       
	       //$("#thx").overlay().load();
	    
      
	     $('#formnya').submit(function() {
		//alert('test');
		var errorlist = '';
		var errornum = 0;
		if($('#text').val()==''){
		    errorlist = errorlist + '<li>Anda harus menuliskan ajakan ke temen pakai pantun memakai kata bangkok .</li>';
		    errornum = errornum + 1;
		}
		
		if($('#flist').val()==''){
		    errorlist = errorlist + '<li>Anda harus invite minimal satu teman anda .</li>';
		    errornum = errornum + 1;
		}
		
		//alert(errornum);
		if(errornum==0){
		     return true;
		}else{
                     $("#validate").overlay({
                     top: 260,
                      mask: {
                         color: '#000',
                         loadSpeed: 200,
                         opacity: 0.7
                     },
                     closeOnClick: true,
                     load: true,
		     oneInstance: false

                     }).load();
		     
		     $('#valid_list').html('<ul>'+errorlist+'</ul>');
		     
		     return false;
		}
                
            });
	     
	     
	    $('#thxform').submit(function() {
		var errorlist = '';
		var errornum = 0;
		if($('#name').val()==''){
		    errorlist = errorlist + '<li>Nama lengkap harus diisi.</li>';
		    errornum = errornum + 1;
		}

		if($('#email').val()==''){
		    errorlist = errorlist + '<li>Email harus diisi .</li>';
		    errornum = errornum + 1;
		}
		
		if($('#phone').val()==''){
		    errorlist = errorlist + '<li>No. HP harus diisi  .</li>';
		    errornum = errornum + 1;
		}
		//alert(errornum);
		if(errornum==0){
		     return true;
		}else{
                     $("#validate").overlay({
                     top: 260,
                      mask: {
                         color: '#000',
                         loadSpeed: 200,
                         opacity: 0.7
                     },
                     closeOnClick: true,
                     load: true,
		     oneInstance: false

                     }).load();
		     
		     $('#valid_list').html('<ul>'+errorlist+'</ul>');
		     
		     return false;
		}
                
            });  
	   
	    $('#formcnt').submit(function() {
		var errorlist = '';
		var errornum = 0;
		var val = 0;
		if($('#name').val()==''){
		    errorlist = errorlist + '<li>Nama lengkap harus diisi.</li>';
		    errornum = errornum + 1;
		}

		if($('#email').val()==''){
		    errorlist = errorlist + '<li>Email harus diisi .</li>';
		    errornum = errornum + 1;
		}
		
		if($('#pesan').val()==''){
		    errorlist = errorlist + '<li>Pesan harus diisi  .</li>';
		    errornum = errornum + 1;
		}
		
		if($('#captcha-form').val()==''){
		    errorlist = errorlist + '<li>Kode verifikasi harus diisi  .</li>';
		    errornum = errornum + 1;
		}
		

		if(errornum==0){
		     
		
		        $.get("<?php echo site_url('page/captcha');?>/"+$('#captcha-form').val(),  function(val) {
				//alert(val);
                                if(val==0){
					//alert('masuk');
					errorlist = errorlist + '<h3>Kode verifikasi tidak valid, coba ulangi lagi.</h3>';
					document.getElementById('captcha').src='<?php echo base_url('captcha');?>/captcha.php?'+Math.random();
                                        //document.getElementById('captcha-form').focus();
					
	
					return false;
				}else{
					return true;
				}
                        });
			
			
			/*$("#validate").overlay({
                     top: 260,
                      mask: {
                         color: '#000',
                         loadSpeed: 100,
                         opacity: 0.7
                     },
                     closeOnClick: true,
                     load: true,
		     oneInstance: false

                     }).load();
		      
		        $('#valid_list').html(errorlist);*/
			

		     
		}else{
                     $("#validate").overlay({
                     top: 260,
                      mask: {
                         color: '#000',
                         loadSpeed: 200,
                         opacity: 0.7
                     },
                     closeOnClick: true,
                     load: true,
		     oneInstance: false

                     }).load();
		     
		     $('#valid_list').html('<ul>'+errorlist+'</ul>');
		     
		     return false;
		}
                
            });
	    
	    <?php if($flag==1){ ?>   
	       $("#thx").overlay({

                     top: 260,
                      mask: {
                         color: '#000',
                         loadSpeed: 200,
                         opacity: 0.7
                     },
                     closeOnClick: true,
                     load: true

               });
	    <?php } ?>   
	        
    });
    
    
    function sendRequest() {
    
    var errorlist = '';
    
    FB.ui({
        method: 'apprequests',
        max_recipients: '3',
        message: 'Tulis ajakan kamu ke temen pake pantun, harus pake kata BANGKOK ya',
        filters: ['app_non_users'],
        title: 'Tulis ajakan kamu ke temen pake pantun'
    },
    function (res) {
	if(res.to.length>0){                  
                  //alert(res.to);
		  var friendto = '';
		  var i=0;
		  for(i=0;i<res.to.length;i++){
		       friendto = friendto + res.to[i] + ',';
		  }
		  var errorlist = '';
		  
		  
		  $("#preload").overlay({
                     top: 260,
                      mask: {
                         color: '#000',
                         loadSpeed: 100,
                         opacity: 0.7
                     },
                     closeOnClick: false,
                     load: true,
		     oneInstance: false

                     });
		  
		  
		  $.post("<?php echo site_url('page/savefriend');?>", { qty: res.to.length, friendlist:friendto }, function(data) {                             
			      errorlist = 'Anda telah berhasil mengundang '+data;
			      $("#preload").hide();
			      $('#flist').val(friendto);
			      			      
			      $("#validate").overlay({
                     top: 260,
                      mask: {
                         color: '#000',
                         loadSpeed: 200,
                         opacity: 0.7
                     },
                     closeOnClick: true,
                     load: true,
		     oneInstance: false

                     }).load();
		     
		     $('#valid_list').html(errorlist);
			      
			      
                  });
		  
		
		
	}else{
		errorlist = '<li>Anda belum pilih teman yang akan di invite.</li>';$("#validate").overlay({
                     top: 260,
                      mask: {
                         color: '#000',
                         loadSpeed: 200,
                         opacity: 0.7
                     },
                     closeOnClick: true,
                     load: true
                     
                     });
		     
		     $('#valid_list').html('<ul>'+errorlist+'</ul>');
		
	}
	
	             
	
    });
    }
</script>
</body>
</html>