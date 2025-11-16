


<?php 
include 'connect.php';
if(isset($_GET['email'])){
    $email = $_GET['email'];
 $sql = mysqli_query($conn," DELETE FROM trainees WHERE email='$email'");
if($sql){
    echo "Delete";
    header('location:report.php');
}else{
    echo "Fialed to delete";
}
}


?>