<?php
$con = mysqli_connect("localhost","root","","e");
if(!$con){
    die("connection failed due to". mysqli_connect_error());
}
//echo "success"




// $email=mysqli_real_escape_string($con,$_POST['email']);
// $password=mysqli_real_escape_string($con,$_POST['password']);
// $user_signup_query="insert into users(email,password) values ($email','$password')";
// $user_signup_submit=mysqli_query($con,$user_signup_query) or die(mysqli_error($con));

if(isset($_POST['submit'])){
	//echo "request ok";
    $email = $_POST['email'];
    $fpassword = $_POST['fpassword'];
    $sql = "select * from register where email = '$email' and fpassword = '$fpassword'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        if($count == 1){  
            echo "<script>window.location.href = 'index.php'</script>";  
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     

  
 
}






$con->close();

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <header><h2 class="head">Login</h2></header>
        <form action="login.php" method="POST">
            <input type="email" name="email" id="email" placeholder="Please enter your registered email" required>
            <input type="password" name="fpassword" id="fpassword" placeholder="Password" required><br>
            <button class="btn" name="submit" type="submit">Login</button><br>
            <a href="forget.php">Forget Password</a>
        </form>
        <footer>If you are not Register.So please click <a href="registration.php">Register</a></footer>
    </div>
    
</body>
</html>