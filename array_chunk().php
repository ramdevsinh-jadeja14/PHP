<?php
$months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");

$result = array_chunk($months, 3);

print_r($result);
?>