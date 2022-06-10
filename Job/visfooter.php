<?php
	 $con=mysqli_connect("localhost","root","","job");
	 extract($_REQUEST);
?>

<footer>
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 column">
						<div class="widget">
							<div class="about_widget">
								<div class="logo">
									<a href="index.php" ><img src="images/resource/JOBsaware2.png" alt="" style="height:60px;" /></a>

								</div>
								<!-- <span>Collin Street West, Victor 8007, Australia.</span>
								<span>+1 246-345-0695</span>
								<span><a href="https://grandetest.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="91f8fff7fed1fbfef3f9e4ffe5bff2fefc">[email&#160;protected]</a></span>
								<div class="social">
									<a href="#" title=""><i class="fa fa-facebook"></i></a>
									<a href="#" title=""><i class="fa fa-twitter"></i></a>
									<a href="#" title=""><i class="fa fa-linkedin"></i></a>
									<a href="#" title=""><i class="fa fa-pinterest"></i></a>
									<a href="#" title=""><i class="fa fa-behance"></i></a>
								</div> -->
							</div><!-- About Widget -->
						</div>
					</div>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
				
					<div class="col-lg-4 column">
						<div class="widget">
							<center><h3 class="footer-title" style="margin-left:-40px; ">Information</h3></center>
							<div class="link_widgets">
								<div class="row">
									<div class="col-lg-6">
										<a href="visabout.php">About Us </a>
										<a href="viscontact.php">Contact Us </a>	
									</div>
									
									<div class="col-lg-6">

										<a href="viscategory.php">Browse Jobs By Category</a>
										<a href="viscompany.php">Browse Jobs By Organization </a>
									</div>
								</div>
							</div>
						</div>
					</div>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

					<div class="col-lg-2 column">
						<div class="widget">
							<h3 class="footer-title">Find Jobs By Category</h3>
							<div class="link_widgets">
								<div class="row">
									<div class="col-lg-12">
										<?php
											$catcntfoot=0;
				 							$selcata="select * from tblcategory";
				 							$rscata=mysqli_query($con,$selcata) or die(mysqli_error($con)); 
				 							while($rescata=mysqli_fetch_array($rscata))
				 							{
				 								if($catcntfoot<6)
				 								{
				 							?>	
				 								<a href="visselectedcat.php?catid=<?php echo $rescata["CategoryId"];  ?>"><?php echo $rescata["CategoryName"]; ?></a>
				 							<?php	
				 								}
				 								$catcntfoot++;
				 							}

				 							?>
									</div>

								</div>
							</div>
						</div>
					</div>
					<!--<div class="col-lg-3 column">
						<div class="widget">
							<div class="download_widget">
								<a href="#" title=""><img src="images/resource/dw1.png" alt="" /></a>
								<a href="#" title=""><img src="images/resource/dw2.png" alt="" /></a>
							</div>
						</div>
					</div>-->
				</div>
			</div>
		</div>
		<div class="bottom-line">
			<!--<span>© 2018 Jobhunt All rights reserved. Design by Creative Layers</span>-->
			 <center>  <strong><font color="white">  All rights reserved @ 2019</font></strong> <b><font color="black"> JobsAware </font></b></strong>
			<!--<a href="#scrollup" class="scrollup" title=""><i class="la la-arrow-up"></i></a>-->
		</div>
	</footer>