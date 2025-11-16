


<?php 
include 'connect.php';

$data=null;
if(isset($_GET['email'])){
    $email = $_GET['email'];
    $sql= mysqli_query($conn,"SELECT * FROM trainees WHERE email='$email'");
    $data= mysqli_fetch_assoc($sql);

}
if(isset($_POST['update'])){
    extract($_POST);
   foreach($_POST as $key=>$value){
    $_POST[$key]=trim($value);
   }

   $firstName = filter_var($firstName,FILTER_SANITIZE_SPECIAL_CHARS);
   $lastName = filter_var($lastName,FILTER_SANITIZE_SPECIAL_CHARS);
   $email = filter_var($email,FILTER_SANITIZE_EMAIL);
    

    $sql= "UPDATE trainees SET firstName='$firstName',lastName='$lastName' WHERE email='$email'";
    if(mysqli_query($conn,$sql)){
        header('location:report.php');
    }else{
        echo "Failed to update";
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
    First name:
    <input type="text" name="firstName" placeholder="Enter your first name"  value="<?php echo $data['firstName'];?>"><br><br>
    Last name:
    <input type="text" name="lastName" placeholder="Enter your last name" value="<?php echo $data['lastName'];?>" required><br><br>
    Email:
    <input type="email" name="email" placeholder="Enter your email" value="<?php echo $data['email'];?>"required readonly><br><br>
    

    <button type="submit" name="update">Save</button>
</form>
</body>
</html>