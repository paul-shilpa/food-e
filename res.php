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
<div class="row mt-3">
<div class="col">
<!-- Button trigger modal -->
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
  Add Restaurant
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Restaurant Entry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
       <div class="form-group">
       
            <input class="form-control" type="text" name="table" placeholder="Enter Restaurant Name">
    
            <!-- <input type="submit" name="submit" value="submit"> -->
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


<div class="row p-1">
<?php
$server="localhost";
$username="root";
$password="";
$db_name="restaurant";
$conn=new mysqli($server,$username,$password,$db_name);

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
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 p-2">
    <div class="card"  style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <img src="foodie-sm.jpg" class="card-img-top img-fluid" alt="hotel">
    <div class="card-body">
        <h5 class="card-title"><?=$row['Tables_in_restaurant'];?></h5>
        
        <a class="btn btn-primary" href="hangla/hangla.php?table=<?=$row['Tables_in_restaurant'];?>">Continue</a> 
    </div>
    </div>
    </div>


        <!-- <a href="hangla/hangla.php?table=<?=$row['Tables_in_restaurant'];?>"><?=  $row['Tables_in_restaurant'];?></a> -->
     <?php
    // echo "<button onclick=\"delrestaurant(".$row['id'].")\">delete</button>";
         
    

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
