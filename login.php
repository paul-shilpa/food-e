<?php
$err="";

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
 if(isset($_POST['submit']))
 {
   
    $user=$_POST["name"];
    $pass=$_POST["password"];

 $results=$conn->query($sql);
if($results->num_rows>0)
{
    //changes
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
    $err="";
    header('Location:l_res.php');
    exit;
}
else
{
    $err="Incorrect your UserName or Password";
  
}

}

 }
$conn->close();
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
<body style="background-color:#669999;">
<div class="container">

<div class="row">
<div class="col-lg-6 col-md-8 col-sm-12 col-12 offset-lg-3 offset-md-2 offset-sm-0 offset-0" style="margin-top:240px;">
<?php if($err!=null){  ?>
<div class="alert alert-danger" role="alert">
<?php
echo $err;
?>
</div>
<?php } ?>
</div>
</div>


<div class="row">
<div class="col-lg-6 col-md-8 col-sm-12 col-12 border offset-lg-3 offset-md-2 offset-sm-0 offset-0  bg-light rounded p-3" style="margin-top:1px;">


    <form onsubmit="return validate()" method="POST">
    <h1 class="text-primary text-center" >Login  </h1>
    <div class="form-group">
        <label>User Name</label>
        <input type="text" id="name" name="name" class="form-control" placeholder=" Enter UserName">
        <small id="name_wrong" style="color:red;">  </small>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder=" Enter Password">
        <small id="pass_wrong" style="color:red;">  </small>
    </div>
    <div class="text-center">
        <input type="submit" name="submit" class="btn btn-info" value="Login Now">
    </div>
    </form>
    <div class="text-center">
        <a class="btn btn-secondary" href="reg.php">
        Register
        </a>
        <a class="btn btn-success" href="admin.php">
        Admin
        </a>
    </div>
    </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
<script type="text/javascript">
function validate()
{
    var x=document.getElementById('name');
    var y=document.getElementById('password');
    if(x.value.trim()=="")
    {
    document.getElementById('name_wrong').innerHTML="Name must be filled";
    //document.getElementById('pass_wrong').innerHTML="Password must be filled";
    return false;
    }
    else{
        document.getElementById('name_wrong').innerHTML="";
    }

    if(y.value.trim()=="")
    {
        document.getElementById('pass_wrong').innerHTML="Password must be filled";
        return false;
    }
    else{
    document.getElementById('pass_wrong').innerHTML="";
        }
}
</script>
</html>
