<!DOCTYPE html>
<html>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:26:12 GMT -->
<head>
	<link rel="shortcut icon" type="image/x-icon" href="fevicon.png">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Jobs Aware</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers">

	<!-- Styles -->
	<?php include_once "loadcss.php"; 
	function SendSMS($message,$MobileNo)
{
                            $ch = curl_init();
                            $setmsg=$message;
                            // set URL and other appropriate options
                            curl_setopt($ch, CURLOPT_URL, "http://login.arihantsms.com/vendorsms/pushsms.aspx?user=gaurangjoshi&password=demo123&msisdn=".$MobileNo."&sid=VISHUD&msg=".$setmsg."&fl=0&gwid=2");
                           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                            // grab URL and pass it to the browser
                            curl_exec($ch);

                            // close cURL resource, and free up system resources
                            curl_close($ch);
                            return "true";
}
	?>
	<style type="text/css"></style>
	<script type="text/javascript">
		function ValidatePwd(ControlID,LabelID,Message)
{
  var Patteren = /^[0-9A-Za-z]{8,}$/;
  var Pwd = document.getElementById(ControlID).value;
  var len = Pwd.length;
  if(document.getElementById(ControlID).value == "")
   {
      document.getElementById(LabelID).style.display = "inline";
      document.getElementById(LabelID).innerHTML = "* Please Enter " + Message;
      document.getElementById(ControlID).focus();
      return false;
   }
  else if(Patteren.test(Pwd) == false) 
  {
     document.getElementById(LabelID).innerHTML = "* Please enter minimum 8 digit and character only";
     document.getElementById(ControlID).focus();
    return false;
  }
   else
   {
      document.getElementById(LabelID).innerHTML = "";
   }
}
		function getState(CountryID)
{
	var xhttp = new XMLHttpRequest();
  	
    var strURL="visfindstate.php?ConID="+CountryID;
	   
    //alert(strURL);

  	xhttp.onreadystatechange = function() 
  	{
    
    if (this.readyState == 4 && this.status == 200) 
    {
     //alert(this.responseText);
     document.getElementById("statediv").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", strURL, true);
  xhttp.send();	
		}

function getCity(StateID)
{
	var xhttp = new XMLHttpRequest();
  	
    var strURL="visfindcity.php?StID="+StateID;
	   
   // alert(strURL);

  	xhttp.onreadystatechange = function() 
  	{
    
    if (this.readyState == 4 && this.status == 200) 
    {
     
     document.getElementById("citydiv").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", strURL, true);
  xhttp.send();	
		}

		function frmValidate()
    {

      var Msg="";
      if(document.getElementById("txtfname").value=="")
      {
        Msg +="Enter First Name";
      }
      if(document.getElementById("txtmname").value=="")
      {
        Msg +="\nEnter Middle Name";
      }
      if(document.getElementById("txtlname").value=="")
      {
        Msg +="\nEnter Last Name";
      }
      if(document.getElementById("txtphoneno").value=="")
      {
        Msg +="\nEnter Phone Number";
      }

      if(document.getElementById("optcon").value=="")
      {
        Msg +="\nSelect Country";
      }
      if(document.getElementById("optstate").value=="")
      {
        Msg +="\nSelect State";
      }
	  if(document.getElementById("optcity").value=="")
      {
        Msg +="\nSelect City";
      }
      if(document.getElementById("txtemail").value=="")
      {
        Msg +="\nEnter Email Address";
      }
      if(document.getElementById("txtpass").value=="")
      {
        Msg +="\nEnter Password";
      }
      if(document.getElementById("txtconpass").value=="")
      {
        Msg +="\nEnter Confirm Password";
      }


      
      if(Msg=="")
      {

        return true;
      }
      else
      {
        alert(Msg);
        return false;
      }

    }


	</script>
	
</head>
<?php
$con=mysqli_connect("localhost","root","","job");
extract($_REQUEST);
if(isset($txtsub))
{
	if($rdg=="Male")
        {
          $gen="Male";
        }
        else
        {
          $gen="Female";
        }
        $finalpass=base64_encode($txtconpass);
	$ins="insert into tbluser values(null,'$txtfname','$txtmname','$txtlname','$gen',null,'$txtemail','$txtphoneno','$finalpass',$optcity,$optstate,$optcon,null,now(),0,1,null,null,now())";
	echo $ins;
	mysqli_query($con,$ins) or die(mysqli_error($con));

	$newsins="insert into tblnewsletter values(null,'$txtemail',1)";
	echo $newsins;
	mysqli_query($con,$newsins) or die(mysqli_error($con));
	$email = $_REQUEST['txtemail'] ;
	$encode=base64_encode("$txtemail");
	$pas="http://localhost/job/visuserlogin.php?fpcodeusr=".$encode;
    $message = '<p style="text-align: center;">
	<span style="font-family:times new roman,times,serif;"><strong><span style="font-size:36px;">Welcome To Jobsaware.com</span></strong></span></p>
<p style="text-align: center;">
	&nbsp;</p>
<hr />
<p style="text-align: center;">
	<span style="font-family:comic sans ms,cursive;"><span style="font-size:26px;">You have successfully created an account.</span></span></p>
<p style="text-align: center;">
	<span style="font-family:comic sans ms,cursive;"><span style="font-size:26px;">Please click</span></span></p>
<p style="text-align: center;">
	<span style="font-family:comic sans ms,cursive;"><span style="font-size:26px;">on the link below to verify our email&nbsp;</span></span></p>
<p style="text-align: center;">
	<span style="font-family:comic sans ms,cursive;"><span style="font-size:26px;">address and complete your registration</span></span></p>
<p style="text-align: center;">
	&nbsp;</p>
<p style="text-align: center;">
	<a href="'.$pas.'">'.$pas.'</a></p>
<hr />
';
	//$message = $_REQUEST['message'] ;

// When we unzipped PHPMailer, it unzipped to
// public_html/PHPMailer_5.2.0
require("PHPMailer_5.2.0/class.PHPMailer.php");

$mail = new PHPMailer();

// set mailer to use SMTP
$mail->IsSMTP();

// As this email.php script lives on the same server as our email server
// we are setting the HOST to localhost
$mail->Host = "smtp.gmail.com";  // specify main and backup server

$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Port=465;
$mail->SMTPSecure = "ssl";
// When sending email using PHPMailer, you need to send from a valid email address
// In this case, we setup a test email account with the following credentials:
// email: send_from_PHPMailer@bradm.inmotiontesting.com
// pass: password
$mail->Username = "makemyoccassion@gmail.com";  // SMTP username
$mail->Password = "coolgirls"; // SMTP password

// $email is the user's email address the specified
// on our contact us page. We set this variable at
// the top of this page with:
// $email = $_REQUEST['email'] ;
$mail->From = "gaurangjo@gmail.com" ;
$mail->FromName = "JobSAware" ;

// below we want to set the email address we will be sending our email to.
$mail->AddAddress($email);


$mail->IsHTML(true);

$mail->Subject = "You have received feedback from your website!";

// $message is the user's message they typed in
// on our contact us page. We set this variable at
// the top of this page with:
// $message = $_REQUEST['message'] ;
$mail->Body    = $message;
$mail->AltBody = $message;

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

SendSMS("You%20have%20successfully%20created%20an%20account",$txtphoneno);
echo "Message has been sent";
	//mysqli_query($con,$ins) or die(mysqli_error($con));
	header('location:visuserlogin.php');
}
?>
<body>

<!-- <div class="page-loading">
	<img src="images/loader.gif" alt="" />
	<span>Skip Loader</span>
</div> -->

<div class="theme-layout" id="scrollup">
	
	<div class="responsive-header">
		<div class="responsive-menubar">
			<div class="res-logo" style="margin-left:-20px;"><a href="index.html" title=""><img src="images/resource/JOBsaware2.png" alt="" style="height:45px;"/></a></div>
			<div class="menu-resaction">
				<div class="res-openmenu">
					<img src="images/icon.png" alt="" /> Menu
				</div>
				<div class="res-closemenu">
					<img src="images/icon2.png" alt="" /> Close
				</div>
			</div>
		</div>
		<div class="responsive-opensec">
			<div class="btn-extars">
				<a href="visemplogin.php" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a>
				<ul class="account-btns">
					<li><a href="visusrregistration.php"><i class="la la-key"></i> Sign Up</a></li>
					<li><a href="visuserlogin.php"><i class="la la-external-link-square"></i> Login</a></li>
				</ul>
			</div>
			<div class="responsivemenu">
				<ul>
						<li>
							<a href="index.php" title="">Home</a>
						</li>
						<li>
							<a href="viscompany.php" title="">Organization</a>
						</li>
				</ul>
			</div>
		</div>
	</div>
	
	<header class="gradient">
		<div class="menu-sec">
			<div class="container">
				<div class="logo" >
					<a href="index.html" title=""><img src="images/resource/JOBsaware2.png" alt="" style="height:45px;margin-top:-5px;" /></a>
				</div><!-- Logo -->
				<div class="btn-extars">
					<a href="visemplogin.php" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a>
					<ul class="account-btns">
						<li><a href="visusrregistration.php"><i class="la la-key"></i> Sign Up</a></li>
						<li><a href="visuserlogin.php"><i class="la la-external-link-square"></i> Login</a></li>
					</ul>
				</div><!-- Btn Extras -->
				<nav>
					<ul>
						<li>
							<a href="index.php" title="">Home</a>
						</li>
						<li>
							<a href="viscompany.php" title="">Organization</a>
						</li>		
						
						
						
						
					</ul>
				</nav><!-- Menus -->
			</div>
		</div>
	</header>

	<section>
		<div class="block no-padding  gray">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner2">
							<div class="inner-title2">
								<h3>Register As Job Seeker</h3>
							</div>
							<div class="page-breacrumbs">
								<ul class="breadcrumbs">
									<li><a href="visempregistration.php" title="">Register As Employer</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block remove-bottom">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="account-popup-area signup-popup-box static">
							<div class="account-popup">
								
								<form method="post">
									<div class="cfield">
										<input type="text" autofocus="" name="txtfname" id="txtfname" placeholder="First Name" onblur="return ValidateControl('txtfname','lblfname','First Name');" onkeypress="return CharsOnly(event);" />
										<i class="la la-user"></i>
										
									</div><isindex id="lblfname" style="color : red;"></isindex>
									<div class="cfield">
										<input type="text" onblur="return ValidateControl('txtmname','lblmname','Middle Name');" onkeypress="return CharsOnly(event);" id="txtmname" name="txtmname" placeholder="Middle Name" />
										<i class="la la-user"></i>
									</div><isindex id="lblmname" style="color : red;"></isindex>
									<div class="cfield">
										<input type="text" name="txtlname" id="txtlname" onblur="return ValidateControl('txtlname','lbllname','Last Name');" onkeypress="return CharsOnly(event);" placeholder="Last Name" />
										<i class="la la-user"></i> 
									</div><isindex id="lbllname" style="color : red;"></isindex>


									<div class="posted_widget">
										<input type="radio" required="true" checked="checked" name="rdg" value="Male" id="Male" ><label for="Male"  >Male</label>
										<input type="radio" name="rdg" value="Female" id="Female"><label for="Female">Female</label>
									</div>	

									
									<div class="cfield">
										<input type="text" maxlength="10" minlength="10" id="txtphoneno" name="txtphoneno"  onkeypress="return NumbersOnly(event);" onblur="return LenghtValid();" onblur="return ValidateControl('txtphoneno','lblphpne','Phone Number');"  placeholder="Phone Number" />
										<i class="la la-phone"></i>
									</div><isindex id="lblphpne" style="color : red;"></isindex>

									<div class="dropdown-field">
										<?php
										$selcon="select * from tblcountry";
										$rs=mysqli_query($con,$selcon) or die(mysqli_error($con));
										?>
										<select data-placeholder="Please Select Country" onchange="getState(this.value);" name="optcon" id="optcon" class="form-control" required="true" >
											<option value="" disabled="" selected="">Please Select Country</option>
											<?php
											while($res=mysqli_fetch_array($rs))
											{
											?>
												<option value="<?php echo $res["CountryId"]; ?>"><?php echo $res["CountryName"]; ?></option>
											<?php
											}
											?>
										</select>
									</div><isindex id="lbloptcon" style="color : red;"></isindex>

									<div class="dropdown-field" id="statediv">
										
										<select class="form-control">
											<option value="0" disabled="" selected="">Select Country First</option>
										</select>
									</div>

									<div class="dropdown-field" id="citydiv">
										
										<select class="form-control">
											<option value="0" disabled="" selected="" >Select State First</option>
										</select>
									</div>

									<div class="cfield">
										<input type="email" name="txtemail" id="txtemail" onblur="return ValidateEmailID('txtemail','lblemail');" placeholder="Email" />
										<i class="la la-envelope-o"></i>
									</div><isindex id="lblemail" style="color : red;"></isindex>
									<div class="cfield">
										<input type="password" name="txtpass" id="txtpass" placeholder="Password" onblur="return ValidatePwd('txtpass','newpa','New Password');" />
										<i class="la la-key"></i>
									</div><isindex id="newpa" style="color : red;"></isindex>

									<div class="cfield">
										<input type="password" name="txtconpass" id="txtconpass" onblur="ValidatePassword('txtpass','txtconpass','conpas');" placeholder="Confirm Password" />
										<i class="la la-key"></i>
									</div><isindex id="conpas" style="color : red;"></isindex>							
									<button name="txtsub" type="submit" onclick="return frmValidate()">Signup</button>
									
								</form>
								<div class="extra-login">
									<span>Or</span>
									<div>
										<a href="visuserlogin.php">Already Registered? Login here </a>
									</div>
								</div>
							</div>
						</div><!-- SIGNUP POPUP -->
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php include_once "visfooter.php"; ?>

</div>



<?php include_once "loadjs.php"; ?>

</body>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:26:12 GMT -->
</html>

