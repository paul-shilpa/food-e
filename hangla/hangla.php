<?php

session_start();
if($_SESSION["us"]==null)
{
    header('Location:login.php');
}
else
{
$server="localhost";
$username="root";
$password="";
$db_name="restaurant";
$conn=new mysqli($server,$username,$password,$db_name);
$table=$_GET['table'];
echo "Restaurant: ". $table;
?>
<html>
<head>
<title>
FODDIE
</title>
</head>
<body>
<?php


$sql="SELECT * FROM $table";
 $results=$conn->query($sql);
if($results->num_rows>=1)
{
    while($row=$results->fetch_assoc())
    {
        echo " <input type =\"hidden\" name= \"food_price[]\"value=\"".$row['food_price']."\">";           
    //echo " <input type =\"checkbox\" name= \"food[]\"value=\"".$row['id']."\">";           
        echo "  Food Item:  <label for =\"".$row['food_name']."\">".$row['food_name']."</label>";
        echo "(".$row['food_spec'].")";
        echo "<br>";
        echo "<br>";
        
        echo "Food Price:  <label for =\"".$row['food_price']."\">".$row['food_price']."</label>";
        echo "<br>";
        echo "<br>";
    }
}


?>
<?php
if(isset($_POST['submit'])){
$spec=$_POST['spec'];
$food=$_POST['food'];
$price=$_POST['price'];
$table1=$_GET['table'];

$sql1="insert into $table1 values (NULL,'$spec','$food','$price')";
$results1=$conn->query($sql1);
echo $spec;
if($results1)
{
    header('Location: hangla.php?table='.$_GET['table']);
  
}
}

?>
<form action="" method="POST">

Food Name: <input type="text" name="food" placeholder="Enter Food Name">

Price: <input type="text" name="price" placeholder="Enter Food Price">

Food Specification: <input type="text" name="spec" placeholder="Enter Food Specification">
<br>
<br>
<br>

<input type="submit" name="submit" value="Entry">
</form>
</body>
</html>
<?php
}
?>