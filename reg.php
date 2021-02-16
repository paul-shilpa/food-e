<html>
<head>
<title>
FOODIE
</title>
</head>
<body>
<form action="reg_db.php"  onsubmit="return validate()" method="POST">
 REGISTER
 <br>
Register Name:<input type="text" id="name" name="name" placeholder=" Enter UserName">
<br>
<small id="name_wrong" style="color:red;">  </small>
<br>
Password:<input type="password" id="password" name="password" placeholder=" Enter Password"> 
<br>
<small id="pass_wrong" style="color:red;"> </small>
<br>
<input type="submit" name="submit" value="Register Login">
<br>
</form>
</body>
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
