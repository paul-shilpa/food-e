<?php
$spec=$_POST['spec'];
$food=$_POST['food'];
$price=$_POST['price'];
$server="localhost";
$username="root";
$password="";
$db_name="project";
$conn=new mysqli($server,$username,$password,$db_name);
$sql="insert into hangla values (NULL,'$spec','$food','$price')";
$results=$conn->query($sql);
echo $spec;
if($results)
{
    header('Location: hangla.php');
    exit;
}
$conn->close();
?>