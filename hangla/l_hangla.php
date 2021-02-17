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
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
</head>
<body>
<div class="container">
<div class="row mt-1">
<div class ="col">
<h1 class="text-center"> <?php echo $table; ?></h1>
</div>
</div>

<div class="row mt-1">


<form action="hangla_bill.php" method="POST"> 
<input type="hidden" name="table" value="<?=$table?>">
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
 $sql="SELECT * FROM $table where food_spec='veg'";
 
 $results=$conn->query($sql);
if($results->num_rows>0)
{
    
    echo "<h5 class='text-center'>Which Food You Want To Ordered?</h5>";
    
    while($row=$results->fetch_assoc())
    {


      
    echo " <input type =\"hidden\" name= \"food_price[]\"value=\"".$row['food_price']."\">";

?>
<div class="col-lg-3 col-md-4 col-sm-6 col-12 p-2">
<?php
echo " <input type =\"checkbox\" name= \"food[]\"value=\"".$row['id']."\">";        
   ?>
      <div class="card ml-2 mt-1" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
  <img src="nn.jpg" class="card-img-top img-fluid" alt="...">
  <div class="card-body">
  <p class="card-text" >
  <?php
          echo "<b>Food Name: </b>".$row['food_name'];
          ?>
          </p>
          <p class="card-text" >
          <?php
        
          echo "<b>Food Name: </b>".$row['food_price'];
          ?>
          </p>
          <h5>How many want to buy?</h5>
          <input type="number" class="form-control" name="<?php echo $row['id'];?>" value="1">
  </div>
</div>
</div>
<?php
}
    
}
?>

<!-- How many want to buy?
<input type="text" name="quant"/> -->

<input class="btn btn-dark" type="submit" name="submit" value="Buy Now">
</form>
</div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
</html>
<?php
}
?>

