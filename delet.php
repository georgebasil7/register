<?php
$servername="localhost";
$username="root";
$password="georgebasil";
$dbname="db_data";
$con=mysqli_connect($servername,$username,$password,$dbname);

if(isset($_GET['id']))
{
$del=$_GET['id'];
$delete="delete from data where id='$del'";
$run=mysqli_query($con,$delete);
if($run)
{
	echo "<script>alert('Record has been deleted')</script>";
	echo "<script>window.open('data.php','_self')</script>)";
}
else
{
	echo "not deleted";
}
}
?>