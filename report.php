


<?php 

include 'connect.php';

// select 
$sql= mysqli_query($conn,"SELECT firstName,lastName,email FROM trainees");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainees Report</title>
</head>
<body>
    <h1><a href="traineeLoginForm.php">Add Trainee</a></h1>
    <h1>All Trainees</h1>
    <table style=" border: 1px solid black; " border="1" cellspacing='0'>
<tr>
    <th>No</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Desion</th>
</tr>

<?php 
$counter=0;
while($row = mysqli_fetch_assoc($sql)){?>

   <tr>
   <td> <?php echo $counter++?></td>
   <td> <?php echo $row['firstName'] ?></td>
   <td> <?php echo $row['lastName'] ?></td>
   <td> <?php echo $row['email'] ?></td>
   <td>
    <a href="update.php?email=<?php echo $row['email'];?> " >Edit</a>|
    <a href="delete.php?email=<?php echo $row['email'];?> " onclick="confirm('Confrim deletetion')">Delete</a>
   
   </td>
</tr> 

<?php }?>
?>


    </table>
</body>
</html>




