<?php
session_start();
if($_SESSION["uname"]==null)
{
 header('Location:login.php');   
}
else
{ 
$server="localhost";
$username="root";
$password="";
$database_name="restaurant";
$table=$_POST['table'];
?>
<?php
$sum=0;
ob_start();
?>


<h1> Thanks for ordering food online on FOODIE </h1>
<?php
if(!empty($_POST['food']))
{
    foreach($_POST['food'] as $s)
    {
        $temp_id=$s;
        //echo $s;      
      


$conn=new mysqli($server,$username,$password,$database_name);

if($conn->connect_error)
{
    die("connection failed: ".$conn->connect_error);

}
 $sql="SELECT * FROM $table where id='$temp_id'";
 $results=$conn->query($sql);
 
 
 

if($results->num_rows>0)
{
    while($row=$results->fetch_assoc())
    {
        $w=$_POST[$row['id']];
        $p=$row['food_price'];
        ?>


    <p>
    <?php
    echo $row['food_name']; ?>  <?php echo "x" ; ?> <?php  echo number_format($w)."=".number_format($p)*number_format($w); ?>

     </p>
<?php

    $price=number_format($p)*number_format($w);
//echo "Item Total:".$price;



$sum=$sum+$price;
    }
}

} 
?>
 

<p> Item Total: <?php echo $sum; ?> </p>
<?php $gst=($sum*18)/100; ?>
<p> Taxes and Charges: <?php echo $gst; ?> </p>
<br>
<?php $net_price=$sum+$gst; ?>
<br>

<p> Bill Amount: <?php  echo $net_price; ?> </p>
<?php
}

?>
<?php
}
$body=ob_get_clean();
require('vendor/autoload.php');
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($body);
$mpdf->Output("bill.pdf",'I');
?>
