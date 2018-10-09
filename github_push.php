<?php
$SECRET = "DpR0RyYl6abP32WSW6Se";
file_put_contents(json_encode(headers()), "headers");
file_put_contents(json_encode($_POST), "post");
?>
