<html>
<head>
<title>
FOODIE
</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >

</head>
<body>
<div class="container">
<div class="row p-1">


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
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 p-2">
    <div class="card"  style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <img src="foodie-sm.jpg" class="card-img-top img-fluid" alt="hotel">
    <div class="card-body">
        <h5 class="card-title"><?=$row['Tables_in_restaurant'];?></h5>
        
        <a class="btn btn-primary" href="hangla/choose_food_spec.php?table=<?=$row['Tables_in_restaurant'];?>">Continue..</a> 
    </div>
    </div>
    </div>


        
     <?php
          echo "<br>";
        }
    }
    



?>
</div>
</div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
<script type="text/javascript">

</html>

