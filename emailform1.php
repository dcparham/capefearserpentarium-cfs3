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
  
  <link rel="stylesheet" type="text/css" href="css/contactForm.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  
  <link rel="stylesheet" href="css/screen.css">
  <script src="lib/jquery.js"></script>
  <script src="js/jquery.validate.js"></script>
  
  <script>
  	$.validator.setDefaults({
		submitHandler: function() {
			alert("submitted!");
		}
	});

	$().ready(function() {
		// validate the comment form when it is submitted
		$("#commentForm").validate();

		// validate signup form on keyup and submit
		$("#signupForm").validate({
			rules: {
				firstname: "required",
				lastname: "required",
				username: {
					required: true,
					minlength: 2
				},
				password: {
					required: true,
					minlength: 5
				},
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
				email: {
					required: true,
					email: true
				},
				topic: {
					required: "#newsletter:checked",
					minlength: 2
				},
				agree: "required"
			},
			messages: {
				firstname: "Please enter your firstname",
				lastname: "Please enter your lastname",
				username: {
					required: "Please enter a username",
					minlength: "Your username must consist of at least 2 characters"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				},
				email: "Please enter a valid email address",
				agree: "Please accept our policy",
				topic: "Please select at least 2 topics"
			}
		});

		// propose username by combining first- and lastname
		$("#username").focus(function() {
			var firstname = $("#firstname").val();
			var lastname = $("#lastname").val();
			if (firstname && lastname && !this.value) {
				this.value = firstname + "." + lastname;
			}
		});

		//code to hide topic selection, disable for demo
		var newsletter = $("#newsletter");
		// newsletter topics are optional, hide at first
		var inital = newsletter.is(":checked");
		var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
		var topicInputs = topics.find("input").attr("disabled", !inital);
		// show when newsletter is checked
		newsletter.click(function() {
			topics[this.checked ? "removeClass" : "addClass"]("gray");
			topicInputs.attr("disabled", !this.checked);
		});
	});
	</script>
	
		<style>
	#commentForm {
		width: 500px;
	}
	#commentForm label {
		width: 250px;
	}
	#commentForm label.error, #commentForm input.submit {
		margin-left: 253px;
	}
	#signupForm {
		width: 670px;
	}
	#signupForm label.error {
		margin-left: 10px;
		width: auto;
		display: inline;
	}
	#newsletter_topics label.error {
		display: none;
		margin-left: 103px;
	}
	</style>
</head>

<body>
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
            <li class="current"><a href="videos.html">Videos</a></li>
            <li><a href="contact.html">Contact Us</a></li>
          </ul>
        </div><!--close menubar-->	  
	  </div><!--close banner-->	
    </div><!--close header-->	
    
	<div id="site_content" class="videos_site_content">		
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
	
<h1>We'd love to hear from you!</h1>
<form class="cf" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<?php 

print $OUTPUT; 
$rand=rand();
$_SESSION['rand']=$rand;
   
?>
<input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
  <div class="half left cf">
	<input type="text" id="cname" minlength="2" type="text" placeholder="Name" required>
    <input type="email" id="cemail" placeholder="Email address" required>
  </div>
  <div class="half right cf">
    <textarea name="message" type="text" id="ccomment" placeholder="Message" required></textarea>
  </div>  
  <input class="submit" type="submit" value="Submit" id="input-submit">
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