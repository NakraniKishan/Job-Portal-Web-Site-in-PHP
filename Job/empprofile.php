<?php
session_start();
if(isset($_SESSION["empid"]))
{
  $empid=$_SESSION["empid"];
?>
<!DOCTYPE html>
<html>

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
	input[type='file']::-webkit-file-upload-button
    {
      padding: 8px 30px;
      color : #fff;
      background-color: #34495e;
      border : none;
      font-family: 'Montserrat', sans-serif;
      font-size: 14px;
      font-weight: 500;
      border-radius: 2px;
      margin: 10px 1px;
    }
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
	<script type="text/javascript">
		function validnamelen(ControlID,LabelID,Message)
{
  //var Patteren = /^[0-9A-Za-z]{8,}$/;
  var Pwd = document.getElementById(ControlID).value;
  var len = Pwd.length;
  if(document.getElementById(ControlID).value == "")
   {
      document.getElementById(LabelID).style.display = "inline";
      document.getElementById(LabelID).innerHTML = "* Please Enter " + Message;
      document.getElementById(ControlID).focus();
      return false;
   }
  else if(Pwd.length >= 100) 
  {
     document.getElementById(LabelID).innerHTML = "* Please enter below 100 character only";
     document.getElementById(ControlID).focus();
    return false;
  }
   else
   {
      document.getElementById(LabelID).innerHTML = "";
   }
}
function frmValidate()
    {
      var Msg="";
      if(document.getElementById("fname").value=="")
      {
        Msg +="* Please Enter First Name";
      }
      if(document.getElementById("mname").value=="")
      {
        Msg +="\n* Please Enter Middle Name";
      }
      if(document.getElementById("lname").value=="")
      {
        Msg +="\n* Please Enter Last Name";
      }
      if(document.getElementById("txtdesig").value=="")
      {
        Msg +="\n* Please Enter Designation";
      }
      if(document.getElementById("optstate").value=="")
      {
        Msg +="\n* Please Select State";
      }
      if(document.getElementById("optcity").value=="")
      {
        Msg +="\n* Please Select City";
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






	</script>
</head>

<?php
$con=mysqli_connect("localhost","root","","job");
extract($_REQUEST);
$selemp="select * from tblemployer where EmployerId=".$empid;
$rsemp=mysqli_query($con,$selemp) or die(mysqli_error($con));
$resemp=mysqli_fetch_array($rsemp);
if(is_null($resemp["ImageUrl"]))
{
	$empimg="download.jpg";	
}
else
{
	$empimg=$resemp["ImageUrl"];	
}


  if(isset($btnupdateprofile))
  {
  		$selforup="select * from tblemployer where EmployerId=".$empid;
		$rsforup=mysqli_query($con,$selforup) or die(mysqli_error($con));
		$resforup=mysqli_fetch_array($rsforup);
		$profilepic=$resforup["ImageUrl"];
		if(!empty($_FILES["txtprofilepic"]["name"]))
		{
			if(file_exists("employer/employerimg/$profilepic"))
      		{
        		unlink("employer/employerimg/$profilepic");
      		}
	      $profilepic= Date("d-m-YH-i-s").$_FILES["txtprofilepic"]["name"];
	      //echo $imgnam;
	      move_uploaded_file($_FILES["txtprofilepic"]["tmp_name"],"employer/employerimg/$profilepic");		
		}
		$up="update tblemployer set FirstName='$fname', MiddleName='$mname', LastName='$lname', Designation='$txtdesig', CityId=$optcity, StateId=$optstate, CountryId=$optcountry, ImageUrl='$profilepic' where EmployerId=".$empid;
      //echo $up;
      mysqli_query($con,$up) or die(mysqli_error($con));
      header('location:empprofile.php');

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
							<h3><?php echo $resemp["FirstName"]; ?> <?php echo $resemp["MiddleName"]; ?> <?php echo $resemp["LastName"]; ?></h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block no-padding">
			<div class="container">
				 <div class="row no-gape">
				 	<div class="col-lg-9 column">
				 		<div class="padding-left">
              				<form method="post" enctype="multipart/form-data">
					 			<div class="profile-title">
					 				<h3>My Profile</h3>
					 					<div class="upload-img-bar">
					 						<span class="round"><img src="employer/employerimg/<?php echo $empimg; ?>" alt="" style="width: 200px;height: 200px;" /></span>
					 						<br>
					 						<div class="upload-info" >
					 							<input type="file" name="txtprofilepic"  />
					 						</div>
					 					</div>
					 			</div>
					 			<div class="profile-form-edit">
					 				<div class="row" style="margin-left: 10px;">
					 					<div class="col-lg-4">
					 						<span class="pf-title">First Name</span>
					 						<div class="pf-field">
					 							<input type="text" name="fname" id="fname" value="<?php echo $resemp["FirstName"]; ?>" onblur="return validnamelen('fname','lblfname','First Name');" />
					 						</div><isindex id="lblfname"></isindex>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Middle Name</span>
					 						<div class="pf-field">
					 							<input type="text" name="mname" id="mname" value="<?php echo $resemp["MiddleName"]; ?>" onblur="return validnamelen('mname','lblmname','Middle Name');" />
					 						</div><isindex id="lblmname"></isindex>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Last Name</span>
					 						<div class="pf-field">
					 							<input type="text" name="lname" id="lname" value="<?php echo $resemp["LastName"]; ?>" onblur="return validnamelen('lname','lbllname','Last Name');" />
					 						</div><isindex id="lbllname"></isindex>
					 					</div>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Designation</span>
					 						<div class="pf-field">
					 							<input type="text" name="txtdesig" id="txtdesig" value="<?php echo $resemp["Designation"]; ?>" onblur="return validnamelen('txtdesig','lbltxtdesig','Designation');" />
					 						</div><isindex id="lbltxtdesig"></isindex>
					 					</div>
					 					<div class="col-lg-4">
					 					</div>
					 					<div class="col-lg-4">
					 					</div>
					 					<?php 
					 					$selcountry="select * from tblcountry";
					 					$rscountry=mysqli_query($con,$selcountry) or die(mysqli_error($con));
					 					?>
					 					<div class="col-lg-4">
					 						<span class="pf-title">Country</span>
					 						<div class="pf-field">
					 							<select onchange="getState(this.value);" name="optcountry" id="optcountry" required="true" class="form-control" >
													<?php
					 								while($rescountry=mysqli_fetch_array($rscountry))
					 								{
					 								?>
													<option value="<?php echo $rescountry["CountryId"]; ?>" <?php if($rescountry["CountryId"]==$resemp["CountryId"]){ ?> selected="selected"   <?php } ?> ><?php echo $rescountry["CountryName"]; ?></option>
													<?php
													}
													?>
												</select>
					 						</div>
					 					</div>
					 					<?php 
                    $selstate="select * from tblstate where CountryId=".$resemp["CountryId"];
                    $rsstate=mysqli_query($con,$selstate) or die(mysqli_error($con));
                    ?>					 					
					 					<div class="col-lg-4">
					 						<span class="pf-title">State</span>
					 						<div class="pf-field" id="statediv" >
					 							<select name="optstate" id="optstate" onchange="getCity(this.value)" class="form-control" required="true" >
													<?php 
                            while($resstate=mysqli_fetch_array($rsstate))
                            { 
                          ?>
                            <option value="<?php echo $resstate['StateId']; ?>" <?php if($resstate["StateId"]==$resemp["StateId"]){ ?> selected="selected"   <?php } ?> ><?php echo $resstate['StateName']; ?></option>
                          <?php 
                            }
                           ?>
												</select>
					 						</div>
					 					</div>
					 					<?php 
                    $selcity="select * from tblcity where StateId=".$resemp["StateId"];
                    $rscity=mysqli_query($con,$selcity) or die(mysqli_error($con));
                    ?>
					 					<div class="col-lg-4">
					 						<span class="pf-title">City</span>
					 						<div class="pf-field" id="citydiv">
					 							<select name="optcity" id="optcity" class="form-control" required="true">
                          <?php while($rescity=mysqli_fetch_array($rscity)) 
                          { ?>
                        <option value="<?php echo $rescity['CityId']; ?>" <?php if($rescity["CityId"]==$resemp["CityId"]){ ?> selected="selected"   <?php } ?> ><?php echo $rescity['CityName'];?></option>
                        <?php } ?>
												</select>
					 						</div>
					 					</div>					 					
					 					<div class="col-lg-12">
					 						<button class="btnmain" type="submit" name="btnupdateprofile" onclick="return frmValidate();" >Update</button>
					 					</div>
					 				</div><br>

					 			
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
