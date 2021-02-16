<html>
<head>
<title>
FOODIE
</title>
</head>
<body>
<?php 


$server="localhost";
$username="root";
$password="";
$db_name="restaurant";
$conn=new mysqli($server,$username,$password,$db_name);

    $sql1="show tables";
    
    
    $query1=$conn->query($sql1);
    if($query1->num_rows>0)
    {
        while($row=$query1->fetch_assoc())
        {
    ?>

        <a href="hangla/choose_food_spec.php?table=<?=$row['Tables_in_restaurant'];?>"><?=  $row['Tables_in_restaurant'];?></a>
     <?php
          echo "<br>";
        }
    }
    



?>
</body>
</html>

