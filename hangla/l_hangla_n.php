<?php
session_start();
//echo $_SESSION["uname"];
if($_SESSION["uname"]==null)
{
    header('Location:login.php');
}
else{
    $table=$_GET['table'];
?>

<html>
<head>
<title>
FOODIE
</title>
</head>
<body>
<body style="background-color:#b3d9ff;">
<form action="hangla_bill.php" method="POST"> 
<input type="hidden" name="table" value="<?=$table?>"">
<?php

$server="localhost";
$username="root";
$password="";
$database_name="restaurant";
$conn=new mysqli($server,$username,$password,$database_name);
if($conn->connect_error)
{
    die("connection failed: ".$conn->connect_error);

}
 $sql="SELECT * FROM $table where food_spec='nonveg'";
 
 $results=$conn->query($sql);
if($results->num_rows>0)
{
    echo "&nbsp &nbsp &nbsp &nbsp ";
    echo "Which Food You Want To Ordered?"  ;
    echo "<br>";
    echo "<br>";
    while($row=$results->fetch_assoc())
    {
      
    echo " <input type =\"hidden\" name= \"food_price[]\"value=\"".$row['food_price']."\">";
    
    echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ";
         
    echo " <input type =\"checkbox\" name= \"food[]\"value=\"".$row['id']."\">";           
    //echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ";

        echo "   Food Name:  <label for =\"".$row['food_name']."\">".$row['food_name']."</label>";
        echo "<br>";
        echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ";

        echo "   Food Price:  <label for =\"".$row['food_price']."\">".$row['food_price']."</label>";
        echo "<br>";
      echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ";


        echo "How many want to buy?";
        echo "<br>";
        echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ";

        echo " <input type =\"number\" name= \"".$row['id']."\"value=\"1\">";           
        echo "<br>";
        echo "<br>";
    }
    
}

?>
<!-- How many want to buy?
<input type="text" name="quant"/> -->
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
<input type="submit" name="submit" value="Buy Now">
</form>
</body>
</html>
<?php
}
?>

