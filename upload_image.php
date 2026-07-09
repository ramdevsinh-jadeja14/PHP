<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload image</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        upload image : <input type="file" name="image"/>
        <input type="submit" value="upload"/>
    </form>
</body>
</html>

<?php

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $image = $_FILES['image'];
        $image_name = $_FILES['name'];
        $image_tmp_ = $_FILES['image'];
        $image = $_FILES['image'];
        $image = $_FILES['image'];
    }
