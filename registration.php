<?php
$name=$_POST['names'];
$email=$_POST['email'];
$mobil=$_POST['mobile'];


$con=mysqli_connect("localhost","root","","shopping");


$check="select * from register where email=$email";
$runs=mysqli_query($con,$check);
$checks=mysqli_num_rows($result);
if($check>0){

    echo "email is already exist";
}
else{
    echo "succesfully register";
}






$ins="INSERT INTO register(names,email,mobile_no) values('$name','$email','$mobil')";
$test=mysqli_query($con,$ins);
?>