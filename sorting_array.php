<!DOCTYPE html>
<html>
<head>
    <title>Sort an Array</title>
</head>
<body>

<form method="post">
    Enter array elements (comma-separated): <br><br>
    <input type="text" name="array" required>
    <input type="submit" name="submit" value="Sort">
</form>

<?php
if (isset($_POST['submit'])) {
    
    $input = $_POST['array'];
    $arr = explode(",", $input);
    $arr = array_map('trim', $arr);

    sort($arr);

    echo "<h3>Sorted Array:</h3>";
    foreach ($arr as $value) {
        echo $value . " ";
    }
}
?>

</body>
</html>