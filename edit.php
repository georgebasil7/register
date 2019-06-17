<?php
$servername="localhost";
$username="root";
$password="georgebasil";
$dbname="db_data";
$con=mysqli_connect($servername,$username,$password,$dbname);
$edit=$_GET['id'];
$select="select * from data where id='$edit'";
$run=mysqli_query($con,$select);
$row=mysqli_fetch_array($run);
$id=$row['id'];
$name=$row['name'];
$address=$row['address'];
$district=$row['district'];
$gender=$row['gender'];
?>


<html>
<body>
<form method="POST" action="edit.php ?id=<?php echo $id;?>">
<tr>
<center><table>
	<tr>
		<td>Id</td>
		<td><input type="text" name="id" value="<?php echo $id;?>"></td>
	</tr>
		
	<tr>
		<td>Name</td>
		<td><input type="text" name="name" value="<?php echo $name;?>"></td>
	</tr>
	
	<tr>
		<td>Address</td>
		<td><textarea  rows='3' cols='30' name="address"  > <?php echo $address;?></textarea></td>
	</tr>
	
	<tr>
		<td>District</td>
		<td>
		<select name="district">
		<option><?php echo $district;?></option>
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
	<td><input type="submit" value="Edit" name="edit"></td>
	</tr>
</tr>
</body>
</html>
<?php
if(isset($_POST['edit']))
{
	
	$eid=$_POST['id'];
	$ename=$_POST['name'];
	$eaddress=$_POST['address'];
	$edistrict=$_POST['district'];
	$egender=$_POST['gender'];
	$update="update data set id='$eid',name='$ename',address='$eaddress',district='$edistrict',gender='$egender' where id='$id'";
	$erun=mysqli_query($con,$update);
	if($erun)
	{
		echo "<script>alert('Record update successfully')</script>";
		echo "<script>window.open('data.php','_self')</script>";
		
	}
	else
	{
		echo "<script>alert('update not successfully')</script>";
	}
}
?>

	