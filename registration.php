<?php
if(isset($_POST['fname'])){
$con = mysqli_connect("localhost","root","","e");
if(!$con){
    die("connection failed due to". mysqli_connect_error());
}
//echo "success"
$fname= $_POST['fname'];
$email= $_POST['email'];
$phone= $_POST['phone'];
$fpassword= $_POST['fpassword'];
$dob= $_POST['dob'];
$address= $_POST['address'];
$sql="INSERT INTO `register` (`fname`, `email`, `phone`, `fpassword`, `dob`, `address`) VALUES 
('$fname', '$email', '$phone', '$fpassword', '$dob', '$address');";
if($con->query($sql)==True){
   // echo "shi";
   echo "<script>window.location.href = 'login.php'</script>";
}
else{
    echo "ERROR: $sql <br> $con->error";
}
$con->close();

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registraion</title>
</head>
<body>
    <div class="container">
        <header><h2 class="head">Registration</h2></header>
        <form action="registration.php" method="POST">
            <input type="text" name="fname" id="name" placeholder="Full name" required>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <input type="tel" name="phone" id="phone" placeholder="Phone" required>
            <input type="password" name="fpassword" id="fpassword" placeholder="Password" required>
            <input type="date" name="dob" id="dob" placeholder="DateofBirth">
            <input type="address" name="address" id="address" placeholder="Address"><br>
            <!--<input type="image" name="image" id="image" placeholder="Select image">-->
            <button class="btn" type="submit">Register</button>
        </form>
        <footer>if you are already registerd please go to tha <a href="login.php">Login</a></footer>
    </div>
    
</body>
</html>