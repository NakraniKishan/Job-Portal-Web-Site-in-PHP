<?php 
$con=mysqli_connect("localhost","root","","job");
$stateId=$_REQUEST['StID'];
$query="SELECT * FROM tblcity WHERE StateId='$stateId'";
$result=mysqli_query($con,$query);
?>
<select name="optcity" class="chosen">
<option>Select City</option>
<?php while($row=mysqli_fetch_array($result)) 
	{ ?>
<option value="<?php echo $row['CityId']; ?>"><?php echo $row['CityName'];?></option>
<?php } ?>
</select>
