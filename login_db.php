<?php
$user=$_POST["name"];
$pass=$_POST["password"];
$flag=0;
$server="localhost";
$username="root";
$password="";
$database_name="project";
$conn=new mysqli($server,$username,$password,$database_name);
if($conn->connect_error)
{
    die("connection failed: ".$conn->connect_error);

}
 $sql="SELECT * FROM login";
 $results=$conn->query($sql);
if($results->num_rows>0)
{
    while($row=$results->fetch_assoc())
    {
        if($row["name"]==$user && $row["password"]==$pass)
        {
$flag=1;
break;
        }
}
if($flag==1)
{
    session_start();
    $_SESSION['uname']=$user;
    
    header('Location:l_res.php');
    exit;
}
else
{
    header('Location:login.php');
   exit;
}

}

else{
    echo "no result";
}
$conn->close();
?>
