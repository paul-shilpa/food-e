<?php
$name=$_POST['name'];
$pass=$_POST['password'];
$server="localhost";
$username="root";
$password="";
$db_name="project";
$conn=new mysqli($server,$username,$password,$db_name);
$sql="insert into login values (NULL,'$name','$pass')";
if($name!=null && $pass!=null)
{
$results=$conn->query($sql);
if($results)
{
    header('Location: login.php');
    exit;

}
}
else{
    header('Location: reg.php');
}

$conn->close();
?>