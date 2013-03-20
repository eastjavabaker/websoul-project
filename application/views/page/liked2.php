<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mandala</title>


<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
</head>

<body>
<div id="wrapper" class="cover"><img src="<?php echo base_url();?>assets/images/liked2.gif" width="810" height="745" border="0" usemap="#Map" />
  <map name="Map" id="Map">
    <area shape="rect" coords="77,563,355,680" href="http://www.mandalaair.com" target="_blank" />
    <area shape="rect" coords="427,566,741,677" href="http://www.tigerairways.com" target="_blank" />
    <area shape="rect" coords="285,505,562,546" href="http://www.tigerairways.com/id/en/real_deals.php" target="_blank" />
  </map>
</div>
<div id="fb-root"></div>
<script src="https://connect.facebook.net/en_US/all.js"></script>
<script type="text/javascript">

    FB.init({ apiKey:"117549405074388", status: true, cookie:true, xfbml: true });
      
    FB.Canvas.setSize({ width: 810, height: 745 });
        FB.Event.subscribe('edge.create',
            function(response) {
                window.location = "<?php echo site_url('adv');?>"; 
            }
        );


</script>

</body>
</html>