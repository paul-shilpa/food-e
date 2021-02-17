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
<div class="col-lg-6 col-md-8 col-sm-12 col-12 border offset-lg-3 offset-md-2 offset-sm-0 offset-0  bg-light rounded p-3" style="margin-top:250px;">
    <form action="login_db.php" onsubmit="return validate()" method="POST">
    <h1 class="text-primary text-center" >Register  </h1>
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
        <input type="submit" name="submit" class="btn btn-info" value="Register">
    </div>
    </form>
    
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
