<?php
$array = array(
    "Name" => "Rahul",
    "City" => "Rajkot",
    "Course" => "BCA"
);

print_r(array_change_key_case($array, CASE_LOWER));
?>