<?php 
$con=mysqli_connect("localhost","root","","job");
$stateId=$_REQUEST['StID'];
$query="SELECT * FROM tblcity WHERE StateId='$stateId'";
$result=mysqli_query($con,$query);
?>
<select name="optcity" id="optcity" style="height: 50px;margin: 0;font-family: Open Sans;font-size: 13px;color: #474747;padding: 16px 45px 16px 15px;" class="form-control" required="true" >
<option value="" disabled="" selected=""  >Select City</option>
<?php while($row=mysqli_fetch_array($result)) 
	{ ?>
<option value="<?php echo $row['CityId']; ?>"><?php echo $row['CityName'];?></option>
<?php } ?>
</select>
