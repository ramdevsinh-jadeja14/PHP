<?php
include("db.php");

$username = "";
$password = "";
$cpassword = "";
$phone = "";
$email = "";

if(isset($_POST['save']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    if($password != $cpassword)
    {
        echo "<script>alert('Password and Confirm Password must be same');</script>";
    }
    else
    {
        $photo = $_FILES['photo']['name'];

        move_uploaded_file(
            $_FILES['photo']['tmp_name'],
            "images/".$photo
        );

        $sql = "INSERT INTO users
        (username,password,cpassword,phone,email,photo)
        VALUES
        ('$username','$password','$cpassword','$phone','$email','$photo')";

        mysqli_query($conn,$sql);

        echo "<script>alert('Record Saved Successfully');</script>";

        $username = "";
        $password = "";
        $cpassword = "";
        $phone = "";
        $email = "";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add User</title>
</head>
<body>

<h2>Add User</h2>

<form method="post" enctype="multipart/form-data">

User Name :
<input
type="text"
name="username"
value="<?php echo $username; ?>"
required>

<br><br>

Password :
<input
type="password"
name="password"
value="<?php echo $password; ?>"
required>

<br><br>

Confirm Password :
<input
type="password"
name="cpassword"
value="<?php echo $cpassword; ?>"
required>

<br><br>

Phone :
<input
type="text"
name="phone"
value="<?php echo $phone; ?>">

<br><br>

Email :
<input
type="email"
name="email"
value="<?php echo $email; ?>">

<br><br>

Photo :
<input
type="file"
name="photo">

<br><br>

<input
type="submit"
name="save"
value="Save">

<input
type="reset"
value="Clear">

</form>

<br>

<a href="display.php">View Records</a>

</body>
</html>