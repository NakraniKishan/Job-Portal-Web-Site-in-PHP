<?php
session_start();
if(isset($_SESSION["usrid"]))
{
  $usrid=$_SESSION["usrid"];
?>
<!DOCTYPE html>
<html>


<!-- Mirrored from grandetest.com/theme/jobhunt-html/blog_single.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:25:57 GMT -->
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
<script src="js/jsreview/jquery.js" type="text/javascript"></script>
<script src='js/jsreview/jquery.rating.js' type="text/javascript" language="javascript"></script>
<link href='js/jsreview/jquery.rating.css' type="text/css" rel="stylesheet"/>
<script type="text/javascript">
	function frmValidate()
    {

      var Msg="";
      if(document.getElementById("txtdes").value=="")
      {
        Msg +="Enter Review Description";
      }
      if(document.getElementById("test-1-rating-5").value=="")
      {
        Msg +="\nGive Rating";
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
$selusr="select * from tbluser where UserId=".$usrid;
$rs=mysqli_query($con,$selusr) or die(mysqli_error($con));
$res=mysqli_fetch_array($rs);
$fname=$res["FirstName"];
$mname=$res["MiddleName"];
$lname=$res["LastName"];
if(is_null($res["UserPhoto"]))
{
	$usrimg="download.jpg";	
}
else
{
	$usrimg=$res["UserPhoto"];	
}

if(isset($txtsubrev))
{
	$r=$_REQUEST["test-1-rating-5"];
	$insrev="insert into tblreview values(null,null,$usrid,'$txtdes',$r,now(),0)";
	mysqli_query($con,$insrev) or die(mysqli_error($con));
	header('location:usrreview.php');
}

if(isset($did))
{
	$del="delete from tblreview where ReviewId=".$did;
    //echo $del;
    mysqli_query($con,$del) or die(mysqli_error($con));
    header('location:usrreview.php');
}

?>
<body>

<div class="page-loading">
	<img src="images/loader.gif" alt="" />
	<span>Skip Loader</span>
</div>

<div class="theme-layout" id="scrollup">
	
	<?php include_once "usrheader.php"; ?>

	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
							<h3><?php echo $fname; ?> <?php echo $mname; ?> <?php echo $lname; ?></h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block">
			<div class="container">
				 <div class="row">
				 	<div class="col-lg-12 column">
				 		<div class="blog-single">
				 			<?php 
				 				$selrev="select * from tblreview where UserId=".$usrid;
								$rsrev=mysqli_query($con,$selrev) or die(mysqli_error($con));
				 				$resrev=mysqli_fetch_array($rsrev);
				 				$rev1=mysqli_num_rows($rsrev);
				 				$Val = $resrev["Rate"];
				 				if($rev1==1)
				 				{
				 			?>
				 			<div class="comment-sec">
				 				<h3>Reviews</h3>
				 				<ul>
				 					
				 					<li>
				 						<div class="comment">
				 							<div class="comment-avatar"> <img src="user/userimg/<?php echo $usrimg; ?>" alt="" /> </div>
				 							<div class="comment-detail">
				 								<?php for($i=1;$i<=5;$i++)
  {
  ?>
  <input name="star22" type="radio" class="star" disabled="disabled" <?php if($i<=$Val) echo "checked='checked'"?>  align="middle"/>
  <?php 
  } ?><br>
				 								<div class="date-comment"><a><i class="la la-calendar-o"></i><?php echo $resrev["CreatedOn"]; ?></a></div>
				 								<p><?php echo $resrev["Description"]; ?></p>
				 								<a href="?did=<?php echo $resrev["ReviewId"]; ?>"><i class="la la-trash-o"></i>Delete</a>
				 							</div>
				 						</div>
				 					</li>			 					
				 				</ul>
				 			</div>
				 				<?php }
				 					else
				 					{
				 				?>

				 			<div class="commentform-sec">
				 				<h3>Leave a Reply</h3>
				 				<form method="Post">
				 					<div class="row">
				 						<div class="col-lg-12">
					 						<span class="pf-title">Description</span>
					 						<div class="pf-field">
					 							<textarea name="txtdes" id="txtdes" onblur="return ValidateControl('txtdes','revdes','Review Description');"></textarea>
					 							<isindex id="revdes"> </isindex>
					 						</div>
					 					</div>
					 					<div class="col-lg-8">
					 						<span class="pf-title">Rating</span>
					 						<div class="pf-field">
					 			<input class="star required" type="radio" name="test-1-rating-5" id="test-1-rating-5" value="1" required="true" />
							  <input class="star" type="radio" name="test-1-rating-5" id="test-1-rating-5" value="2"/>
							  <input class="star" type="radio" name="test-1-rating-5" id="test-1-rating-5" value="3" />
							  <input class="star" type="radio" name="test-1-rating-5" id="test-1-rating-5" value="4"/>
							  <input class="star" type="radio" name="test-1-rating-5" id="test-1-rating-5" value="5"/>
					 						</div>
					 					</div>
					 					
					 					<div class="col-lg-12">
					 						<button type="submit" name="txtsubrev" onclick="return frmValidate()">Post Review</button>
					 					</div>
				 					</div>
				 				</form>
				 			</div>
				 		<?php } ?>
				 		</div>
					</div>
					
				 </div>
			</div>
		</div>
	</section>

	<?php include_once "usrfooter.php"; ?>

</div>


<?php include_once "usrprofilesidebar.php"; ?>
<?php include_once "loadjs.php"; ?>

</body>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/blog_single.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:26:03 GMT -->
</html>
<?php
}
else
{
	header('location:index.php');
}
?>
