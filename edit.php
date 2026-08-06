<?php
include("db.php");

if(!isset($_GET['id']))
{
    die("ID Not Found");
}

$id = $_GET['id'];

$result = mysqli_query(
$conn,
"SELECT * FROM users WHERE id='$id'"
);

$row = mysqli_fetch_array($result);

if(isset($_POST['update']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $photo = $_FILES['photo']['name'];

    if($photo != "")
    {
        move_uploaded_file(
        $_FILES['photo']['tmp_name'],
        "images/".$photo);

        mysqli_query($conn,
        "UPDATE users SET
        username='$username',
        password='$password',
        cpassword='$cpassword',
        phone='$phone',
        email='$email',
        photo='$photo'
        WHERE id='$id'");
    }
    else
    {
        mysqli_query($conn,
        "UPDATE users SET
        username='$username',
        password='$password',
        cpassword='$cpassword',
        phone='$phone',
        email='$email'
        WHERE id='$id'");
    }

    header("Location: display.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit User</title>
</head>
<body>

<h2>Edit User</h2>

<form method="post" enctype="multipart/form-data">

User Name :
<input
type="text"
name="username"
value="<?php echo $row['username']; ?>">
<br><br>

Password :
<input
type="text"
name="password"
value="<?php echo $row['password']; ?>">
<br><br>

Confirm Password :
<input
type="text"
name="cpassword"
value="<?php echo $row['cpassword']; ?>">
<br><br>

Phone :
<input
type="text"
name="phone"
value="<?php echo $row['phone']; ?>">
<br><br>

Email :
<input
type="email"
name="email"
value="<?php echo $row['email']; ?>">
<br><br>

Current Photo :

<br><br>

<img
src="images/<?php echo $row['photo']; ?>"
width="80"
height="80"
style="border-radius:50%;">

<br><br>

Change Photo :
<input type="file" name="photo">

<br><br>

<input type="submit" name="update" value="Update">

</form>

<br>

<a href="display.php">Back</a>

</body>
</html>