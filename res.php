<?php

$server="localhost";
$username="root";
$password="";
$db_name="restaurant";
$conn=new mysqli($server,$username,$password,$db_name);
echo "Restaurants Are:";
echo "<br>";
if(isset($_POST['submit']))
{
    $table= $_POST['table'];
    //echo $table;
    if($conn){
    $sql="create table $table (id int NOT NULL AUTO_INCREMENT,food_spec varchar(20), food_name varchar(20),food_price varchar(20),PRIMARY KEY(id))";
    
    $query=$conn->query($sql);
    
}
}
    $sql1="show tables";
    
    
    $query1=$conn->query($sql1);
    if($query1->num_rows>0)
    {
        while($row=$query1->fetch_assoc())
        {
    ?>


        <a href="hangla/hangla.php?table=<?=$row['Tables_in_restaurant'];?>"><?=  $row['Tables_in_restaurant'];?></a>
     <?php
    // echo "<button onclick=\"delrestaurant(".$row['id'].")\">delete</button>";
          echo "<br>";
    

        }
    }
    

?>
<script>
    function delrestaurant(id){
        alert(id);
    }

</script>
<html>
<head>
<title>
FOODIE
</title>
</head>
<body>
<form method="POST">
<br>
Restaurant Entry:
<br>
<input type="text" name="table">
<br>
<input type="submit" name="submit" value="submit">
</form>

</body>
</html>
