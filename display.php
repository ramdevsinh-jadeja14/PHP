<?php
include("db.php");

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    mysqli_query($conn,
    "DELETE FROM users WHERE id='$id'");

    header("Location: display.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Display Records</title>
</head>
<body>

<h2>User Records</h2>

<a href="add.php">Add New Record</a>

<br><br>

<table border="1" cellpadding="10">

<tr>
<th>ID</th>
<th>Photo</th>
<th>User Name</th>
<th>Phone</th>
<th>Email</th>
<th>Action</th>
</tr>

<?php

$result = mysqli_query($conn,"SELECT * FROM users");

while($row = mysqli_fetch_array($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td>
<img
src="images/<?php echo $row['photo']; ?>"
width="70"
height="70"
style="border-radius:50%;">
</td>

<td><?php echo $row['username']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td><?php echo $row['email']; ?></td>

<td>

<a href="edit.php?id=<?php echo $row['id']; ?>">
Edit
</a>

|

<a href="display.php?delete=<?php echo $row['id']; ?>"
onclick="return confirm('Delete Record?')">
Delete
</a>

</td>

</tr>

<?php
}
?>

</table>

</body>
</html>