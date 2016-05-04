<!DOCTYPE html>
<html>
<head>
<?php

if (isset($_POST[submit])){
	//Form submitted, grab the data from POST
	$textinputs =trim($_POST['message']);
	//If you need to sanitize user input
	$textinputs= strip_tags($textinputs);
	$textinputs =escapeshellarg($textinputs);
	$textinputs =substr($textinputs,1,-1);
	date_default_timezone_set('MST');
	$timestamp = date('M d, Y H:i T');
	$fp = fopen('feedback.txt', 'a') or die('fopen failed');
							
	//Test if it contains some data.
	if (!isset($textinputs) || trim($textinputs) == "") {
		//Feedback to user that it contains no data
		$error_message = "We're sorry, your message was empty. We value your feedback. Please type your message in the box below and then hit send.";
	} else {					
		fwrite($fp, "\"$textinputs\"\n$timestamp\n\n") or die('fwrite failed');
		fclose($fp);
		$error_message = "Thanks for your feedback!";
	}
}

?>
	<title>espnW Summit | Feedback</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<meta name="apple-mobile-web-app-capable" content="yes" />
	
	<!--Icons-->
	<link rel="apple-touch-icon" href=" " />
	<link rel="apple-touch-icon" sizes="72x72" href=" " />
	<link rel="apple-touch-icon" sizes="114x114" href=" " />
	<link rel="apple-touch-startup-image" href=" " />
	
	<!--Styles-->
	<link rel="stylesheet" href="styles/jquery.mobile.structure-1.1.0.min.css" />
	<link rel="stylesheet" href="styles/espnwsummit2.css" />
	<link type="text/css" rel="stylesheet" media="screen and (max-device-width: 480px)" href="styles/mobile.css" />
	<link type="text/css" rel="stylesheet" media="screen and (min-device-width: 480px) and (max-device-width: 800px)" href="styles/tablet.css" />
	<link type="text/css" rel="stylesheet" media="screen and (min-device-width: 600px) and (max-device-width: 1024px)" href="styles/tablet.css" />
	<link type="text/css" rel="stylesheet" media="screen and (min-device-width: 768px) and (max-device-width: 1024px)" href="styles/tablet.css" />
	<link type="text/css" rel='stylesheet' media="screen and (min-device-width: 1024px)" href="styles/styles.css" />
	
	<!--jQuery-->
	<script src="js/jquery-1.7.2.min.js"></script>
	<script src="js/jquery.mobile-1.1.0.min.js"></script>
	
	<!-- Include Contact Form -->
</head>
<body>
    <div data-role="page" id="feedback-page">
        <div class="wrapper" data-role="content">
        	<div data-role="header" data-position="fixed" id="page-header" data-theme="e">
       			<a href="index.html" data-role="button" data-icon="home" class="back-btn">Home</a>
				<a href="#" onclick="location.reload(true)" data-role="button" data-icon="refresh" data-iconpos="notext" class="settings-btn"></a>
       		</div><!-- /#page-header -->
        	<div class="header">
        		<img src="img/header-new.png" />
       		</div><!-- /.header -->
       		<div class="mobile-header">
       			<img src="img/iphoneheader.png" />
       		</div>
        	<div class="content">
        	<p>Thank you for joining us at the espnW: Women + Sports Summit. We value your feedback. Please share your thoughts on the Summit below. </p>
        	<p class="message"><?php echo "$error_message"; ?></p>
        		<div id="feedback-form">
        			<div data-role="fieldcontain">
        				<form id="form" name="form" method="post" action="feedback.php">
	        			<textarea name="message" id="message"></textarea>
	        			<button type="submit" name="submit" id="feedback-btn"> Send </button>
        				</form>
	        		</div><!-- /fieldcontain-->
        		</div><!-- /#feedback-form-->
        	</div><!-- /.content -->	
        </div><!-- /.wrapper -->

	</div><!-- /#login-page -->
</body>
</html>