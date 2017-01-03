<?php
//echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>";
session_start(); 
$OUTPUT = ''; 	//for displaying messages in a div.
$errors = "";	//append to this var when errors occur.
if(isset($_POST['email']) && $_POST['randcheck']==$_SESSION['rand']) {
    // EDIT THE 2 LINES BELOW AS REQUIRED 
    $email_to = "dcparham@gmail.com"; 
    $email_subject = "email from CFS";
	
	$first_name="";
	$last_name="";
	$email_from="";
	$telephone="";
	$comments="";

	function successMessage($message){
		$message = $message;
		//$message = "Your message was sent successfully - expect a reply soon!  Thank you!";
		//return "<div id='messageInfo' class='message'>$message</div>";
		//return "<script type='text/javascript'>document.getElementById('messageInfo').innerHTML = 'HELLO';</script>";
	}
	
	function failureMessage($message){
		//$message = "Your message was sent successfully - expect a reply soon!  Thank you!";
		//return "<div id='messageInfo' class='message'>$message</div>";
	}

    function died($error) { 
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die(); 
    }
     
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        //died('We are sorry, but there appears to be a problem with the form you submitted.');	
    }
	
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
	
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
 
 if(strlen($comments) < 1) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />'; 
  }

  if(strlen($error_message) > 0) {
    //died($error_message);
	//$OUTPUT = failureMessage($error_message);
  }
    $email_message = "Form details below.\n\n";
 
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n"; 
    $email_message .= "Comments: ".clean_string($comments)."\n";

// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
if (trim($email_message) == true && strlen($error_message) < 1) {
	@mail($email_to, $email_subject, $email_message, $headers);
	$email_message = "";
	//echo "<meta http-equiv='refresh' content='1' />";
	$message = "Your message was sent successfully - expect a reply soon!  Thank you!";
	$OUTPUT = successMessage($message);
	//header("Location:send_form_email.php");
} else {
	$message = $error_message;
	$OUTPUT = failureMessage($message);
}
?>

<?php
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Cape Fear Serpentarium</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/image_slide.js"></script>
  <script type="text/javascript" src="js/image_slide.js"></script>
  <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js'></script>
</head>


<body onLoad="javascript: home();">
  <div id="main">
    <div id="header">
	  <div id="banner">
	    <div id="welcome">
	      <h1>Cape Fear Serpentarium</h1></ br><span id="address">20 Orange St, Wilmington, NC (910) 762-1669</span>
	    </div><!--close welcome-->
	    <div id="menubar">
          <ul id="menu">
            <li><a href="index.html">Home</a></li>
            <li><a href="groupRates.html">Group Rates</a></li>
            <li><a href="education.html">Education</a></li>
            <li><a href="directions.html">Directions</a></li>
            <li><a href="videos.html">Videos</a></li>
            <li class="current"><a href="contact.html">Contact Us</a></li>
          </ul>
        </div><!--close menubar-->	  
	  </div><!--close banner-->	
    </div><!--close header-->	
    
	<div id="site_content" class="contact_site_content">		
      <div class="header_slideshow">  
		<ul class="header_slideshow">
          <li class="show">
			<img width="900" height="250" src="images/DSC_5188 (2).jpg" alt="Emerald Tree Boa" /></li>
          <li>
			<img width="900" height="250" src="images/DSC_5059_Eastern Green Mamba.7x5a.jpg" alt="Eastern Green Mamba" /></li>
        </ul> 
      </div><!--close header_slideshow-->	

      <div id="content">
        <div class="content_item_contact">
		  <div class="form_settings">
            <h2>Contact Us</h2>
<!--#####################################################-->
<form name="contactform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<?php 

print $OUTPUT; 
$rand=rand();
$_SESSION['rand']=$rand;
   
?>
<input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />

<table width="450px">
<tr>
 <td valign="top"><label for="first_name">First Name *</label></td>
 <td valign="top"><input id="firstName" type="text" name="first_name" maxlength="50" size="30"></td>
</tr>

<tr>
 <td valign="top""><label for="last_name">Last Name *</label></td>
 <td valign="top"><input id="lastName" type="text" name="last_name" maxlength="50" size="30"></td>
</tr>

<tr>
 <td valign="top"><label for="email">Email Address *</label></td>
 <td valign="top"><input  type="text" name="email" maxlength="80" size="30"></td>
</tr>
 
<tr>
 <td valign="top"><label for="telephone">Telephone Number</label></td>
 <td valign="top"><input  type="text" name="telephone" maxlength="30" size="30"></td>
</tr>

<tr>
 <td valign="top"><label for="comments">Comments *</label></td>
 <td valign="top"><textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea></td>
</tr>

<tr>
 <td valign="top"><label for="submit"></label></td>
 <td valign="top"><input style="text-align:center; width:60px" id="submit" name="submit" type="submit" value="Submit"></td>
</tr>

</table>

<div id="messageInfo" class="messageDisplay"><?php echo $message ?></div>
</form>

<!--#####################################################-->
			</div><!--close form_settings-->
		</div><!--close content_item-->
      </div><!--close content--> 
	  
	</div><!--close site_content--> 
	
	<div id="content_grey">
	  <div class="content_grey_container_box">
		<h4>Latest Blog Post</h4>
	    <p> Get involved in discussions about current topics related to the serpentarium.</p>
		<div class="readmore">
		  <a href="#">Read more</a>
		</div><!--close readmore-->
	  </div><!--close content_grey_container_box-->
      <div class="content_grey_container_box">
       <h4>Latest News</h4>
	    <p> Dean talks about his field trips and expeditions, and some of the reasons why safety is primary.</p>
	    <div class="readmore">
		  <a href="#">Read more</a>
		</div><!--close readmore-->
	  </div><!--close content_grey_container_box-->
      <div class="content_grey_container_boxl">
		<h4>Contact Us</h4>
	    <p> Always feel free to reach out to us about anything. We are always happy to accomodate your questions!</p>
	    <div class="readmore">
		  <a href="#">Read more</a>
		</div><!--close readmore-->	  
	  </div><!--close content_grey_container_box1-->      
	  <br style="clear:both"/>
    </div><!--close content_grey-->   
 
  </div><!--close main-->
  
  <div id="footer_container">
    <div id="footer">
		<a href="http://www.facebook.com"><img src='http://www.womenactionmedia.org/cms/assets/themes/crate/images/social/facebook.png' /></a> | 
		<a href="http://www.twitter.com"><img src='http://grfx.cstv.com/schools/wis/graphics/icon_twitter24.jpg' /></a> | 
		<a href="https://goo.gl/IkbSBW" target="_blank"><img src='images/youtube_icon.jpg' /></a>
 </div><!--close footer-->  
  </div><!--close footer_container--> 
  
</body>
</html>