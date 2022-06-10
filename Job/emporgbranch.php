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
// $selbranch="select * from tblemployer a 
// 			left join tblorganizationbranch b on a.OrganizationId=b.OrganizationId
//  			where a.EmployerId=".$empid;
$selbranch="select * from tblorganizationbranch a
			left join tblcity b on a.CityId=b.CityId 
			where OrganizationId=".$_SESSION["orgbranch"];

//$sel="select jp.*,em.FirstName,em.LastName,ct.CategoryName from tbljobpost as jp left join tblemployer as em on jp.EmployerId=em.EmployerId left join tblcategory as ct on jp.CategoryId=ct.CategoryId";
$rsbranch=mysqli_query($con,$selbranch) or die(mysqli_error($con));
$cntbranch=mysqli_num_rows($rsbranch);
if(isset($_REQUEST["actjob"]))
    { 
      if($_REQUEST["Status"]==0)
      { 
        $upd="update tblorganizationbranch set IsActive=1 where OrganizationBranchId='".$_REQUEST["actjob"]."'";
        mysqli_query($con,$upd) or die(mysqli_error($con));
      }
      else
      {
        $upd="update tblorganizationbranch set IsActive=0 where OrganizationBranchId='".$_REQUEST["actjob"]."'";
        mysqli_query($con,$upd) or die(mysqli_error($con));
      }
      header('location:emporgbranch.php');
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
							<h3>Organization Branch List</h3>
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
				 	<div class="col-lg-12 column">
				 		<div class="padding-left">
              				
					 			<div class="manage-jobs-sec">
					 					<h3>My Branch<a href="empaddbranch.php">
					 					<button class="btnmain" style="margin-top: -10px;" >Add Branch</button></a></h3>
					 					<?php if($cntbranch>0) { ?>
					 					<table style="width:1000px;">
						 					<thead>
								 				<tr>
								 					<td>Branch Name</td>
								 					<td>Address</td>
								 					<td>Contact No</td>
								 					<td>City</td>
								 					<td>Active</td>
								 					<td>View Details</td>	
								 				</tr>
						 					</thead>
						 					<tbody>
						 			<?php 
						 			while($resbranch=mysqli_fetch_array($rsbranch))
						 			{
						 			?>
						 				<tr>
						 					<td>
						 						<?php echo $resbranch["BranchName"]; ?>
						 					</td>
						 					<td>
						 						<?php echo $resbranch["Address"]; ?>
						 					</td>
						 					<td>
						 						<?php echo $resbranch["ContactNo"]; ?>
						 					</td>

						 					<td>
						 						<?php echo $resbranch["CityName"]; ?>
						 					</td>
						 					<td>
							                    <a href="?actjob=<?php echo $resbranch["OrganizationBranchId"]; ?>&Status=<?php echo $resbranch["IsActive"]; ?>">
							                    	<?php 
							                    		if($resbranch["IsActive"]==1)
							                    		{
							                    	?>
							                    		<i class="fa fa-check" style="color: blue;"></i>
							                    	<?php		
							                    		} 
							                    		else
							                    		{
							                    	?>
							                    		<i class="fa fa-close" style="color: red;"></i>
							                    	<?php		
							                    		}
							                    	?>
							                    </a>
						 					</td>
						 					<td>
						 						<a href="empaddbranch.php?eid=<?php echo $resbranch["OrganizationBranchId"]; ?>"><i class="fa fa-edit"></i></a>
						 					</td>
						 				</tr>
						 				<?php
						 				}
						 				?>
						 			</tbody>
						 				</table>
						 			<?php 
						 			}
						 			else
						 			{
						 			?>
						 				<table>
						 					<tr>
						 						<td><?php echo "You doesn't have any Branch. "; ?></td>
						 					</tr>
						 				</table>
						 			<?php	
						 			} 
						 			?>
					 				<br>
					 			</div>
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
