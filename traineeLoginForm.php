<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Trainee</title>
</head>
<body>
<form action="insert.php" method="post" enctype="multipart/form-data">
    First name:
    <input type="text" name="firstName" placeholder="Enter your first name" required><br><br>
    Last name:
    <input type="text" name="lastName" placeholder="Enter your last name" required><br><br>
    Email:
    <input type="email" name="email" placeholder="Enter your email" required><br><br>
    Password:
    <input type="password" name="password" placeholder="Enter your password" required><br><br>
    Profile Photo:
    <input type="file" name="photo" required><br><br>

    <button type="submit" name="submit">Save</button>
</form>
</body>
</html>