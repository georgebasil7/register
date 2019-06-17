<?php
$servername="localhost";
$username="root";
$password="georgebasil";
$dbname="db_data";
$con=mysqli_connect($servername,$username,$password,$dbname);
?>


<html>
<body>
<form method="POST" action="data.php">
<tr>
<center><table>
	<tr>
		<td>Id</td>
		<td><input type="text" name="id"></td>
	</tr>
	
	<tr>
		<td>Name</td>
		<td><input type="text" name="name"></td>
	</tr>
	
	<tr>
		<td>Address</td>
		<td><textarea name="address" rows='3' cols='30'> </textarea></td>
	</tr>
	
	<tr>
		<td>District</td>
		<td>
		<select name="district">
		<option>Select District</option
		<option>Ernakulam</option>
		<option>Idukki</option>
		<option>Kottayam</option>
		<option>Alapuzha</option>
		<option>Pathanamthitta</option>
		<option>Kollam</option>
		<option>Trivandrum</option>
		</td>
	</tr>
	
	<tr>
		<td>Gender</td>
		<td>
		<input type="radio" name="gender" value="Male">Male
		<input type="radio" name="gender" value="Female">Female
		</td>
	</tr>
		<tr>
	<td><input type="submit" value="Submit" name="insert"></td>
	</tr>
	
</center></table>
</tr>
<tr>
<table align="center" width="600" border="1">
<tr>
<th><h1>Display All Records</h1></th>
</tr>
<tr>
<th>Id</th> 
<th>Name</th>
<th>Address</th>
<th>District</th>
<th>Gender</th>
<th>Delete</th>
<th>Edit</th>
</tr>

<?php
$select="select * from data ";
$sel=mysqli_query($con,$select);
while($row=mysqli_fetch_array($sel))
{
	$id=$row['id'];
	$name=$row['name'];
	$address=$row['address'];
	$district=$row['district'];
	$gender=$row['gender'];
?>
<tr>
<td><?php echo $id; ?> </td>
<td><?php echo $name; ?> </td>
<td><?php echo $address; ?> </td>
<td><?php echo $district; ?> </td>
<td><?php echo $gender; ?> </td>
<td><a href="delet.php? id=<?php echo $id;?>">Delete</a></td>
<td><a href="edit.php? id=<?php echo $id;?>">Edit</a></td>
</tr>
<?php
}
?>
</table>
</tr>
</form>
</body>
</html>
<?php
if(isset($_POST['insert']))
{
	$id=$_POST['id'];
	$name=$_POST['name'];
	$address=$_POST['address'];
	$district=$_POST['district'];
	$gender=$_POST['gender'];
	$insert="insert into data (id,name,address,district,gender) values('$id','$name','$address','$district','$gender')";
	$run=mysqli_query($con,$insert);
if($run)
{
	echo "<script>alert('data insert suuccessfully')</script>";
	
}
else
{
		echo "<script>alert('data not inserted')</script>";
}
}
?>		
	
	



