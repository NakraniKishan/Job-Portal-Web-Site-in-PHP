
<?php
$con=mysqli_connect("localhost","root","","job");
$country=$_REQUEST['ConID'];
$query="SELECT * FROM tblstate WHERE CountryId='$country'";
$result=mysqli_query($con,$query) or die(mysqli_error($con));
?>

<select name="optstate" id="optstate" onchange="getCity(this.value)" style="height: 50px;margin: 0;font-family: Open Sans;font-size: 13px;color: #474747;padding: 16px 45px 16px 15px;" class="form-control" required="true">
	<option value="" disabled="" selected="" >Please Select State</option>
<?php 
	while($row=mysqli_fetch_array($result))
 	{ 
 ?>
<option value="<?php echo $row['StateId']; ?>" ><?php echo $row['StateName']; ?></option>
<?php 
	}
 ?>
</select>
