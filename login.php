<?php 
include 'connect.php';
if(isset($_POST['login'])){
    $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $password =filter_var( $_POST['password'],FILTER_SANITIZE_SPECIAL_CHARS);
    $password_hashed =password_hash($password,PASSWORD_DEFAULT);
$emails = mysqli_query($conn,"SELECT email FROM trainees WHERE email='$email'");
print_r($emails);
$passwords = mysqli_query($conn,"SELECT password FROM trainees WHERE password='$password_hashed'");
print_r($passwords);
if(mysqli_num_rows($emails)<0 && mysqli_num_rows($passwords)<0){
    header('location:report.php');
     $_SESSION['email']=$email;
}else{
    echo "Invalid crediantial";
}



}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
    <input type="email" name="email" placeholder="enter Email "> <br><br>
    <input type="password" name="password" placeholder="enter passwrod "> <br><br>
    <button type="submit" name="login">Login</button>
    <a href="traineeLoginForm.php">Regist now</a>
        

    </form> 
</body>
</html>