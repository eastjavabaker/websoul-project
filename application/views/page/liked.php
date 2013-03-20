<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Break</title>

<link rel="stylesheet" media="all" href="<?php echo base_url('assets/css');?>/index.css" type="text/css" />

</head>

<body>
<div id="wrapper" class="blike">
	<div style="width: 373px; height: 87px; margin-left: 221px; padding-top: 412px;">
		<a href="javascript:top.location.href = 'https://www.facebook.com/dialog/oauth?client_id=269170126538550&redirect_uri=<?php echo urlencode("http://apps.facebook.com/mandalatreatatrip/");?>&scope=publish_stream, publish_actions ,email,user_likes,user_birthday,publish_stream,user_hometown,user_about_me,user_checkins,user_interests,user_location,user_activities,user_education_history,user_work_history';"><img border="0" src="<?php echo base_url();?>assets/images/go.jpg" /></a>
	</div>
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
</body>
</html>
