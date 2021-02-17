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

//echo "Restaurant: ". $table;
?>
<html>
<head>
<title>
FODDIE
</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
</head>
<body>
<div class="container">
<div class="row mt-3">
<div class="col">
<h1 class="text-center text-primary"><?php echo $table; ?><h1>
</div>
</div>

<div class="row mt-3">
<div class="col">
<!-- Button trigger modal -->
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
  Add Food
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Food Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
            <div class="form-group">
                <input class="form-control" type="text" name="food" placeholder="Enter Food Name">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="price" placeholder="Enter Food Price">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="spec" placeholder="Enter Food Specification">
            </div>
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Entry</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
<div class="row mt-1">
<?php


$sql="SELECT * FROM $table";
 $results=$conn->query($sql);
if($results->num_rows>=1)
{
    while($row=$results->fetch_assoc())
    {
        echo " <input type =\"hidden\" name= \"food_price[]\"value=\"".$row['food_price']."\">";           
   ?>
   <div class="col-lg-3 col-md-4 col-sm-6 col-12 p-2">
<div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <img src="food.jpg" class="card-img-top img-fluid" alt="...">
      <div class="card-body">
          <p class="card-text" ><?php
          echo "<b>Food Name: </b>".$row['food_name']." (".$row['food_spec'].")";
          ?>
          <p class="card-text"><?php
          echo "<b>Food Price: </b> ".$row['food_price'];
          ?>
      
          </p>
      </div>
</div>
</div>
    <?php    
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