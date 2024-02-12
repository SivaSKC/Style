<?php
// $name = $_POST['names'];
// $email = $_POST['email'];
// $mobil = $_POST['mobile'];


// $con = mysqli_connect("localhost", "root", "", "shopping");


// $check = "select * from register where email=$email";
// $runs = mysqli_query($con, $check);
// $checks = mysqli_num_rows($result);
// if ($check > 0) {

//     echo "email is already exist";
// } else {
//     echo "succesfully register";
// }


// $ins = "INSERT INTO register(names,email,mobile_no) values('$name','$email','$mobil')";
// $test = mysqli_query($con, $ins);
?> 







<?php

$names = $_POST['names'];
$email  = $_POST['email'];
$mobile = $_POST['mobile'];
// $upswd2 = $_POST['upswd2'];


if (!empty($names) || !empty($email) || !empty($mobile)) {

    // $host = "localhost";
    // $dbusername = "root";
    // $dbpassword = " ";
    // $dbname = "shopping";


    // Create connection
    // $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

    $con = mysqli_connect("localhost", "root", "", "shopping");

    if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
    } 

    else {
        $SELECT = "SELECT email From register Where email = ? Limit 1";
        $INSERT = "INSERT Into register(names,email,mobile_no)values(?,?,?)";

        //Prepare statement
        $stmt = $con->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        //checking username
        if ($rnum == 0) {
            $stmt->close();
            $stmt = $con->prepare($INSERT);
            $stmt->bind_param("sss", $names, $email, $mobile);
            $stmt->execute();
            echo "New record inserted sucessfully";
        } 

        else {
            echo "Someone already register using this email";
        }

        $stmt->close();
        $con->close();
    }
} 
else {
    echo "All field are required";
    die();
}
?>