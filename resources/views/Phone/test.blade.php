<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>HTML5 Gallery Example</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Reference to html5gallery.js -->
<script src="{{ asset('plugins/html5gallery/html5gallery/html5gallery.js')}}"></script>

</head>

<body>

<!-- A wrapper DIV to center the Gallery -->
<div style="text-align:center;">

    <!-- Define the Div for Gallery -->
    <!-- 1. Add class html5gallery to the Div -->
    <!-- 2. Define parameters with HTML5 data tags -->
	<div style="display:none;margin:0 auto;" class="html5gallery"  data-width="1008" data-height="700" data-resizemode="fill" >
	
	    <!-- Add images to Gallery -->
		<a href="images/Tulip_large.jpg"><img src="images/Tulip_small.jpg" alt="Tulips"></a>
		<a href="images/Colourful_Tulip_large.jpg"><img src="images/Colourful_Tulip_small.jpg" alt="Colourful Tulips"></a>
		<a href="images/Swan_large.jpg"><img src="images/Swan_small.jpg" alt="Swan on Lake"></a>
		<a href="images/Red_Tulip_large.jpg"><img src="images/Red_Tulip_small.jpg" alt="Red Tulips"></a>
		<a href="images/Sakura_Tree_large.jpg"><img src="images/Sakura_Tree_small.jpg" alt="Sakura Trees"></a>
		
		<!-- Add videos to Gallery -->
		<!-- Big Buck Bunny Copyright 2008, Blender Foundation http://www.bigbuckbunny.org -->
		<a href="images/Big_Buck_Bunny.mp4" data-webm="images/Big_Buck_Bunny.webm"><img src="images/Big_Buck_Bunny.jpg" alt="Big Buck Bunny, Copyright Blender Foundation"></a>
		
		<!-- Add Youtube video to Gallery -->
		<a href="http://www.youtube.com/embed/YE7VzlLtp-4"><img src="http://img.youtube.com/vi/YE7VzlLtp-4/2.jpg" alt="Youtube Video"></a>
		
		<!-- Add Vimeo video to Gallery -->
		<a href="http://player.vimeo.com/video/1084537?title=0&amp;byline=0&amp;portrait=0"><img src="images/Big_Buck_Bunny.jpg" alt="Vimeo Video"></a>
	
	</div>

</div>



</body>

</html>