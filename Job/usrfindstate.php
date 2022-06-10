<?php
$con=mysqli_connect("localhost","root","","job");
$country=$_REQUEST['ConID'];
$query="SELECT * FROM tblstate WHERE CountryId='$country'";
$result=mysqli_query($con,$query) or die(mysqli_error($con));
?>

<select name="optstate" onchange="getCity(this.value)" class="chosen">
<?php 
	while($row=mysqli_fetch_array($result))
 	{ 
 ?>
<option value="<?php echo $row['StateId']; ?>" ><?php echo $row['StateName']; ?></option>
<?php 
	}
 ?>
</select>
