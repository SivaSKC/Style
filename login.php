
<?php
$email=$_POST['email'];
$mobil=$_POST['mobile'];
$con=mysqli_connect("localhost","root","","shopping");
$ins="INSERT INTO log(email,mobile) values('$email','$mobil')";
$test=mysqli_query($con,$ins);
if($test){
    echo "Successfully login";
}
else{
    echo "invalit";
}

?>