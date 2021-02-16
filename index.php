<?php


$response = exec("python python/read.py python\cetelem.jpg I25");

$response = (array)json_decode($response);

print_r($response);





?>