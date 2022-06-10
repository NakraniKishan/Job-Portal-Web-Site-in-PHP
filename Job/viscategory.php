<!DOCTYPE html>
<html>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:22:52 GMT -->
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
</head>
<body>
<?php
	 $con=mysqli_connect("localhost","root","","job");
	 extract($_REQUEST);
?>

<div class="page-loading">
	<img src="images/loader.gif" alt="" />
</div>

<div class="theme-layout" id="scrollup">
	
	<?php include_once "visheader.php"; ?>
	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
							<h3>Jobs By Category</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block less-top">
			<div class="container">
				 <div class="row">
				 	<div class="col-lg-12">
				 		<section id="options" class="alpha-pag full">
							<div class="option-isotop">
							  <ul id="filter" class="option-set" data-option-key="filter">
								<li><a href="#all" data-option-value="*" class="selected">ALL</a></li>
								<li><a href="#a" data-option-value=".a">A</a></li>
								<li><a href="#b" data-option-value=".b">B</a></li>
								<li><a href="#c" data-option-value=".c">C</a></li>
								<li><a href="#d" data-option-value=".d">D</a></li>
								<li><a href="#e" data-option-value=".e">E</a></li>
								<li><a href="#f" data-option-value=".f">F</a></li>
								<li><a href="#g" data-option-value=".g">G</a></li>
								<li><a href="#h" data-option-value=".h">H</a></li>
								<li><a href="#i" data-option-value=".i">I</a></li>
								<li><a href="#j" data-option-value=".j">J</a></li>
								<li><a href="#k" data-option-value=".k">K</a></li>
								<li><a href="#l" data-option-value=".l">L</a></li>
								<li><a href="#m" data-option-value=".m">M</a></li>
								<li><a href="#n" data-option-value=".n">N</a></li>
								<li><a href="#o" data-option-value=".o">O</a></li>
								<li><a href="#p" data-option-value=".p">P</a></li>
								<li><a href="#q" data-option-value=".q">Q</a></li>
								<li><a href="#r" data-option-value=".r">R</a></li>
								<li><a href="#s" data-option-value=".s">S</a></li>
								<li><a href="#t" data-option-value=".t">T</a></li>
								<li><a href="#u" data-option-value=".u">U</a></li>
								<li><a href="#v" data-option-value=".v">V</a></li>
								<li><a href="#w" data-option-value=".w">W</a></li>
								<li><a href="#x" data-option-value=".x">X</a></li>
								<li><a href="#y" data-option-value=".y">Y</a></li>
								<li><a href="#z" data-option-value=".z">Z</a></li>
							  </ul>
							</div>
						</section><!-- FILTER BUTTONS -->
				 		<div class="emply-text-sec">
				 			<div class="row" id="masonry_abc">
				 				<div class="col-lg-4 a">
				 					<div class="emply-text">
				 						<h3><span>A</span></h3>
				 						<ul>
				 							<?php
				 							$selcata="select * from tblcategory where IsActive=1 and CategoryName like 'a%' ";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 							?>	
				 								<li><a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>" ><?php echo $rescata["CategoryName"]; ?></a></li>
				 							<?php	
				 							}
				 							?>				 							
				 						</ul>
				 					</div><!-- Emply text -->
				 				</div>
				 				<div class="col-lg-4 b">
				 					<div class="emply-text">
				 						<h3><span>B</span></h3>
				 						<ul>
				 							<?php
				 							$selcata="select * from tblcategory where IsActive=1 and CategoryName like 'b%' ";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 							?>	
				 								<li><a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>" ><?php echo $rescata["CategoryName"]; ?></a></li>
				 							<?php	
				 							}
				 							?>
				 						</ul>
				 					</div><!-- Emply text -->
				 				</div>
				 				<div class="col-lg-4 c">
				 					<div class="emply-text">
				 						<h3><span>C</span></h3>
				 						<ul>
				 							<?php
				 							$selcata="select * from tblcategory where IsActive=1 and CategoryName like 'c%' ";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 							?>	
				 								<li><a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>" ><?php echo $rescata["CategoryName"]; ?></a></li>
				 							<?php	
				 							}
				 							?>
				 						</ul>
				 					</div><!-- Emply text -->
				 				</div>
				 				<div class="col-lg-4 d">
				 					<div class="emply-text">
				 						<h3><span>D</span></h3>
				 						<ul>
				 							<?php
				 							$selcata="select * from tblcategory where IsActive=1 and CategoryName like 'd%' ";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 							?>	
				 								<li><a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>" ><?php echo $rescata["CategoryName"]; ?></a></li>
				 							<?php	
				 							}
				 							?>
				 						</ul>
				 					</div><!-- Emply text -->
				 				</div>
				 				<div class="col-lg-4 e">
				 					<div class="emply-text">
				 						<h3><span>E</span></h3>
				 						<ul>
				 							<?php
				 							$selcata="select * from tblcategory where IsActive=1 and CategoryName like 'e%' ";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 							?>	
				 								<li><a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>" ><?php echo $rescata["CategoryName"]; ?></a></li>
				 							<?php	
				 							}
				 							?>
				 						</ul>
				 					</div><!-- Emply text -->
				 				</div>
				 				<div class="col-lg-4 f">
				 					<div class="emply-text">
				 						<h3><span>F</span></h3>
				 						<ul>
				 							<?php
				 							$selcata="select * from tblcategory where IsActive=1 and CategoryName like 'f%' ";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 							?>	
				 								<li><a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>" ><?php echo $rescata["CategoryName"]; ?></a></li>
				 							<?php	
				 							}
				 							?>
				 						</ul>
				 					</div><!-- Emply text -->
				 				</div>
				 				<div class="col-lg-4 g">
				 					<div class="emply-text">
				 						<h3><span>G</span></h3>
				 						<ul>
				 							<?php
				 							$selcata="select * from tblcategory where IsActive=1 and CategoryName like 'g%' ";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 							?>	
				 								<li><a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>" ><?php echo $rescata["CategoryName"]; ?></a></li>
				 							<?php	
				 							}
				 							?>
				 						</ul>
				 					</div><!-- Emply text -->
				 				</div>
				 				<div class="col-lg-4 h">
				 					<div class="emply-text">
				 						<h3><span>H</span></h3>
				 						<ul>
				 							<?php
				 							$selcata="select * from tblcategory where IsActive=1 and CategoryName like 'h%' ";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 							?>	
				 								<li><a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>" ><?php echo $rescata["CategoryName"]; ?></a></li>
				 							<?php	
				 							}
				 							?>
				 						</ul>
				 					</div><!-- Emply text -->
				 				</div>
				 				<div class="col-lg-4 i">
				 					<div class="emply-text">
				 						<h3><span>I</span></h3>
				 						<ul>
				 							<?php
				 							$selcata="select * from tblcategory where IsActive=1 and CategoryName like 'i%' ";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 							?>	
				 								<li><a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>" ><?php echo $rescata["CategoryName"]; ?></a></li>
				 							<?php	
				 							}
				 							?>
				 						</ul>
				 					</div><!-- Emply text -->
				 				</div>
				 				<div class="col-lg-4 j">
				 					<div class="emply-text">
				 						<h3><span>J</span></h3>
				 						<ul>
				 							<?php
				 							$selcata="select * from tblcategory where IsActive=1 and CategoryName like 'j%' ";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 							?>	
				 								<li><a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>" ><?php echo $rescata["CategoryName"]; ?></a></li>
				 							<?php	
				 							}
				 							?>
				 						</ul>
				 					</div><!-- Emply text -->
				 				</div>
				 				<div class="col-lg-4 k">
				 					<div class="emply-text">
				 						<h3><span>K</span></h3>
				 						<ul>
				 							<?php
				 							$selcata="select * from tblcategory where IsActive=1 and CategoryName like 'k%' ";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 							?>	
				 								<li><a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>" ><?php echo $rescata["CategoryName"]; ?></a></li>
				 							<?php	
				 							}
				 							?>
				 						</ul>
				 					</div><!-- Emply text -->
				 				</div>
				 				<div class="col-lg-4 l">
				 					<div class="emply-text">
				 						<h3><span>L</span></h3>
				 						<ul>
				 							<?php
				 							$selcata="select * from tblcategory where IsActive=1 and CategoryName like 'l%' ";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 							?>	
				 								<li><a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>" ><?php echo $rescata["CategoryName"]; ?></a></li>
				 							<?php	
				 							}
				 							?>
				 						</ul>
				 					</div><!-- Emply text -->
				 				</div>
				 				<div class="col-lg-4 m">
				 					<div class="emply-text">
				 						<h3><span>M</span></h3>
				 						<ul>
				 							<?php
				 							$selcata="select * from tblcategory where IsActive=1 and CategoryName like 'M%' ";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 							?>	
				 								<li><a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>" ><?php echo $rescata["CategoryName"]; ?></a></li>
				 							<?php	
				 							}
				 							?>
				 						</ul>
				 					</div><!-- Emply text -->
				 				</div>
				 				<div class="col-lg-4 n">
				 					<div class="emply-text">
				 						<h3><span>N</span></h3>
				 						<ul>
				 							<?php
				 							$selcata="select * from tblcategory where IsActive=1 and CategoryName like 'n%' ";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 							?>	
				 								<li><a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>" ><?php echo $rescata["CategoryName"]; ?></a></li>
				 							<?php	
				 							}
				 							?>
				 						</ul>
				 					</div><!-- Emply text -->
				 				</div>
				 				<div class="col-lg-4 o">
				 					<div class="emply-text">
				 						<h3><span>O</span></h3>
				 						<ul>
				 							<?php
				 							$selcata="select * from tblcategory where IsActive=1 and CategoryName like 'o%' ";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 							?>	
				 								<li><a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>" ><?php echo $rescata["CategoryName"]; ?></a></li>
				 							<?php	
				 							}
				 							?>
				 						</ul>
				 					</div><!-- Emply text -->
				 				</div>
				 				<div class="col-lg-4 p">
				 					<div class="emply-text">
				 						<h3><span>P</span></h3>
				 						<ul>
				 							<?php
				 							$selcata="select * from tblcategory where IsActive=1 and CategoryName like 'p%' ";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 							?>	
				 								<li><a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>" ><?php echo $rescata["CategoryName"]; ?></a></li>
				 							<?php	
				 							}
				 							?>
				 						</ul>
				 					</div><!-- Emply text -->
				 				</div>
				 				<div class="col-lg-4 q">
				 					<div class="emply-text">
				 						<h3><span>Q</span></h3>
				 						<ul>
				 							<?php
				 							$selcata="select * from tblcategory where IsActive=1 and CategoryName like 'q%' ";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 							?>	
				 								<li><a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>" ><?php echo $rescata["CategoryName"]; ?></a></li>
				 							<?php	
				 							}
				 							?>
				 						</ul>
				 					</div><!-- Emply text -->
				 				</div>
				 				<div class="col-lg-4 r">
				 					<div class="emply-text">
				 						<h3><span>R</span></h3>
				 						<ul>
				 							<?php
				 							$selcata="select * from tblcategory where IsActive=1 and CategoryName like 'r%' ";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 							?>	
				 								<li><a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>" ><?php echo $rescata["CategoryName"]; ?></a></li>
				 							<?php	
				 							}
				 							?>
				 						</ul>
				 					</div><!-- Emply text -->
				 				</div>
				 				<div class="col-lg-4 s">
				 					<div class="emply-text">
				 						<h3><span>S</span></h3>
				 						<ul>
				 							<?php
				 							$selcata="select * from tblcategory where IsActive=1 and CategoryName like 's%' ";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 							?>	
				 								<li><a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>" ><?php echo $rescata["CategoryName"]; ?></a></li>
				 							<?php	
				 							}
				 							?>
				 						</ul>
				 					</div><!-- Emply text -->
				 				</div>
				 				<div class="col-lg-4 t">
				 					<div class="emply-text">
				 						<h3><span>T</span></h3>
				 						<ul>
				 							<?php
				 							$selcata="select * from tblcategory where IsActive=1 and CategoryName like 't%' ";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 							?>	
				 								<li><a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>" ><?php echo $rescata["CategoryName"]; ?></a></li>
				 							<?php	
				 							}
				 							?>
				 						</ul>
				 					</div><!-- Emply text -->
				 				</div>
				 				<div class="col-lg-4 U">
				 					<div class="emply-text">
				 						<h3><span>U</span></h3>
				 						<ul>
				 							<?php
				 							$selcata="select * from tblcategory where IsActive=1 and CategoryName like 'u%' ";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 							?>	
				 								<li><a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>" ><?php echo $rescata["CategoryName"]; ?></a></li>
				 							<?php	
				 							}
				 							?>
				 						</ul>
				 					</div><!-- Emply text -->
				 				</div>
				 				<div class="col-lg-4 v">
				 					<div class="emply-text">
				 						<h3><span>V</span></h3>
				 						<ul>
				 							<?php
				 							$selcata="select * from tblcategory where IsActive=1 and CategoryName like 'v%' ";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 							?>	
				 								<li><a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>" ><?php echo $rescata["CategoryName"]; ?></a></li>
				 							<?php	
				 							}
				 							?>
				 						</ul>
				 					</div><!-- Emply text -->
				 				</div>
				 				<div class="col-lg-4 w">
				 					<div class="emply-text">
				 						<h3><span>W</span></h3>
				 						<ul>
				 							<?php
				 							$selcata="select * from tblcategory where IsActive=1 and CategoryName like 'w%' ";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 							?>	
				 								<li><a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>" ><?php echo $rescata["CategoryName"]; ?></a></li>
				 							<?php	
				 							}
				 							?>
				 						</ul>
				 					</div><!-- Emply text -->
				 				</div>
				 				<div class="col-lg-4 x">
				 					<div class="emply-text">
				 						<h3><span>X</span></h3>
				 						<ul>
				 							<?php
				 							$selcata="select * from tblcategory where IsActive=1 and CategoryName like 'x%' ";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 							?>	
				 								<li><a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>" ><?php echo $rescata["CategoryName"]; ?></a></li>
				 							<?php	
				 							}
				 							?>
				 						</ul>
				 					</div><!-- Emply text -->
				 				</div>
				 				<div class="col-lg-4 y">
				 					<div class="emply-text">
				 						<h3><span>Y</span></h3>
				 						<ul>
				 							<?php
				 							$selcata="select * from tblcategory where IsActive=1 and CategoryName like 'y%' ";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 							?>	
				 								<li><a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>" ><?php echo $rescata["CategoryName"]; ?></a></li>
				 							<?php	
				 							}
				 							?>
				 						</ul>
				 					</div><!-- Emply text -->
				 				</div>
				 				<div class="col-lg-4 z">
				 					<div class="emply-text">
				 						<h3><span>Z</span></h3>
				 						<ul>
				 							<?php
				 							$selcata="select * from tblcategory where IsActive=1 and CategoryName like 'z%' ";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 							?>	
				 								<li><a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>" ><?php echo $rescata["CategoryName"]; ?></a></li>
				 							<?php	
				 							}
				 							?>
				 						</ul>
				 					</div><!-- Emply text -->
				 				</div>








				 			</div>
				 		</div>
					</div>
				 </div>
			</div>
		</div>
	</section>
	

	
	
	
		<?php include_once "visfooter.php"; ?>

</div>

<?php include_once "loadjs.php"; ?>

</body>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Feb 2019 15:23:54 GMT -->
</html>

