<?php
$con = mysqli_connect("localhost","root","","e");
if(!$con){
    die("connection failed due to". mysqli_connect_error());
}
if(isset($_POST['done'])){
	//echo "request ok";
    $email = $_POST['email'];
    $fpassword = $_POST['fpassword'];
    $sql = "select * from register where email = '$email'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        if($count == 1){  
            $update_query = "UPDATE register SET fpassword='$fpassword' WHERE email='$email' ";
            if (mysqli_query($con, $update_query)) {
                echo "<script>window.location.href = 'login.php'</script>";
              } 
              else {
                echo "Error updating record: " . mysqli_error($con);
              }
        }  
        else{  
            echo "<h1>Invalid Email.</h1>";  
        }     

  
 
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>forget page</title>
</head>
<body>
    <div class="container">
        <h2 class="head">Forget Password<h2>
        <form action="forget.php" method="POST">
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="password" name="fpassword" id="fpassword" placeholder="New Password" required><br>
            <button class="btn" name="done" type="done">Done</button> 

        </form>
    </div>
    
</body>
</html>