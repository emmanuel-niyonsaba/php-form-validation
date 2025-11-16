
<?php
include ('connect.php');

if(isset($_POST['submit'])){
    extract($_POST);
   foreach($_POST as $key=>$value){
    $_POST[$key]=trim($value);
   }

   $firstName = filter_var($firstName,FILTER_SANITIZE_SPECIAL_CHARS);
   $lastName = filter_var($lastName,FILTER_SANITIZE_SPECIAL_CHARS);
   $email = filter_var($email,FILTER_SANITIZE_EMAIL);
   $password = filter_var($password,FILTER_SANITIZE_SPECIAL_CHARS);
   $password_hashed =password_hash($password,PASSWORD_DEFAULT);
  

   if(isset($_FILES['photo'] ) && $_FILES['photo']['error']===0){
    $photoName = $_FILES['photo']['name'];
    $photoTemp= $_FILES['photo']['tmp_name'];
    $uploadDr = 'uploads/';
    if(!is_dir($uploadDr)){
        mkdir($uploadDr,0777,true);
    }
    $targetFile = $uploadDr.basename($photoName);
   

    if(move_uploaded_file($photoTemp,$targetFile)){

        //insert query
$insertQuery = "INSERT INTO trainees (firstName,lastName,email,password,photo) VALUES ('$firstName','$lastName','$email','$password','$photoName')"; 

$emails = mysqli_query($conn,"SELECT * FROM trainees WHERE email='$email'");

// $result = mysqli_fetch_assoc($emails);
// print_r($result);
if(mysqli_num_rows($emails)>0){
    echo "Use another emeal ";
    header('location:traineeLoginForm.php');
}
else{
  if(!mysqli_query($conn,$insertQuery)){
    echo "Failed to insert".mysqli_error($conn);
    header('location:report.php');
  } else{
    echo "Well inserted"; 
    header('location:report.php');
  }
}


    }
   
}   

}
?>