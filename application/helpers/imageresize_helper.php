<?php
ini_set("allow_url_fopen", '1');

function fixit($picture, $width, $height){
	        if($size = @getimagesize($picture)){
			   $cwidth = $size[0];
			   $cheight = $size[1];  
			   
			   if($cwidth>$cheight){			      
				  if($cwidth<$width){  
				     $addparam = "width='$cwidth'";
			      }else{
				     $addparam = "width='$width'";
				  }
			   }else{
			      if($cheight<$height){ 
			         $addparam = "height='$cheight'";
			      }else{
				     $addparam = "height='$height'";
				  }
			   }
			   }else{
			         $addparam = "";
			   }
			   return $addparam;			   			   
	  }
	  	        

?>