<?php
session_start();
if(isset($_SESSION["empid"]))
{
  $empid=$_SESSION["empid"];
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<!-- Mirrored from grandetest.com/theme/jobhunt-html/candidates_single.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:25:43 GMT -->
<head>
	<link rel="shortcut icon" type="image/x-icon" href="fevicon.png">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Jobs Aware</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers">

	<!-- Styles -->
	<?php include_once "loadcss.php"; ?>
	<style type="text/css">
	tr{text-align:center;}
	td{text-align:center;}
	.btnmain{
	float: right;
    background: #ffffff;
    border: 2px solid #fb236a;
    color: #202020;
    font-family: Open Sans;
    font-size: 15px;
    padding: 11px 40px;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    -ms-border-radius: 8px;
    -o-border-radius: 8px;
    border-radius: 8px;
    margin-top: 30px;
	}
	.btnmain:hover{
	float: right;
    background: #fb236a;
    border: 2px solid #fb236a;
    color: white;
    font-family: Open Sans;
    font-size: 15px;
    padding: 11px 40px;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    -ms-border-radius: 8px;
    -o-border-radius: 8px;
    border-radius: 8px;
    margin-top: 30px;
	}

	

	</style>
	
</head>

<?php
$con=mysqli_connect("localhost","root","","job");
extract($_REQUEST);

if(isset($btnGoHome))
{
	echo $_SESSION["orderid"];
	$x="select * from tblpackage where PackageId=".$_SESSION["pid"];
	$xx=mysqli_query($con,$x) or die(mysqli_error($con));
	$xsx=mysqli_fetch_array($xx);
	echo $pacnam=$xsx["PackageName"];
	echo $pac=$xsx["Duration"];
	echo $pacprice=$xsx["Price"];
	echo $pacdes=$xsx["Description"];

	$date = date('Y-m-d', strtotime('+'.$pac.'month'));
	//echo $date ." ". $pac;
	$ins="insert into tblcompanypackage values(null,'".$_SESSION["empid"]."','".$_SESSION["pid"]."',now(),'$date')";
	mysqli_query($con,$ins) or die(mysqli_error($con));
	echo $ins;
	$insid=mysqli_insert_id($con);


require_once("Paytm_Web_Sample_Kit_PHP-master/PaytmKit/lib/config_paytm.php");
require_once("Paytm_Web_Sample_Kit_PHP-master/PaytmKit/lib/encdec_paytm.php");

$requestParamList = array();
	$responseParamList = array();
	if (isset($_SESSION["orderid"]) && $_SESSION["orderid"] != "") 
	{

		// In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
		$ORDER_ID = $_SESSION["orderid"];

		// Create an array having all required parameters for status query.
		$requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID);  
		
		$StatusCheckSum = getChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY);
		
		$requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

		// Call the PG's getTxnStatusNew() function for verifying the transaction status.
		$responseParamList = getTxnStatusNew($requestParamList);
	}

		foreach($responseParamList as $paramName => $paramValue) 
	{
		if($paramName=="TXNID")
		{
			$TXNID=$paramValue;	
		}
		if($paramName=="ORDERID")
		{
			$ORDERID=$paramValue;
		}
		if($paramName=="TXNAMOUNT")
		{
			$TXNAMOUNT=$paramValue;
		}
		if($paramName=="STATUS")
		{
			$STATUS=$paramValue;
		}
		if($paramName=="TXNTYPE")
		{
			$TXNTYPE=$paramValue;
		}
		if($paramName=="GATEWAYNAME")
		{
			$GATEWAYNAME=$paramValue;
		}
		if($paramName=="RESPCODE")
		{
			$RESPCODE=$paramValue;
		}
		if($paramName=="RESPMSG")
		{
			$RESPMSG=$paramValue;
		}
		if($paramName=="BANKNAME")
		{
			$BANKNAME=$paramValue;
		}
		if($paramName=="MID")
		{
			$MID=$paramValue;
		}
		if($paramName=="PAYMENTMODE")
		{
			$PAYMENTMODE=$paramValue;
		}
		if($paramName=="TXNDATE")
		{
			$TXNDATE=$paramValue;
		}
	}

	$pins="insert into tblpackagepayment values(null,$insid,'$TXNID','$pacnam',$pac,$pacprice,'$pacdes','$date',now())";
	//echo $pins;
	mysqli_query($con,$pins) or die(mysqli_error($con));
	header("Location:empdashboard.php");
}

?>
<body>

<div class="page-loading">
	<img src="images/loader.gif" alt="" />
	<span>Skip Loader</span>
</div>

<div class="theme-layout" id="scrollup">
	
	<?php include_once "empheader.php"; ?>

	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
							<h3>Thank You</h3>
						</div>
						<!-- <input type="file" name="reupload" value="<?php echo $pacimg; ?>"> -->
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">

						<div class="plans-sec">
							<form method="Post">
							<h3 class="card-title">Payment Successfull..!!</h3>
							<p class="card-text t400">Click Go To Home to confirm all the Process.</p>
							<p class="card-text t400">Enjoy Your full access to the Post Job On JosAware.com</p>
							<div align="center" style="margin-top: -10px;">
<p class="mb-2 text-black" style="font-size: 20px;"><h4 style="color: red;">Don't forget to click Active Package Button</h4></p>
<button input="submit" class="btnmain" name="btnGoHome">Active Package</button>
</div>
							</form>


						</div>
					</div>
				</div>
			</div>
		</div>
	</section>








	<?php include_once "empfooter.php"; ?>

</div>









<?php include_once "loadjs.php"; ?>



<!-- Mirrored from grandetest.com/theme/jobhunt-html/candidates_single.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:25:44 GMT -->


</html>
<?php
}
else
{
	header('location:index.php');
}
?>
