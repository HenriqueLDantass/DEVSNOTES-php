<?php 
//toda liberacao
header("Access-Control-Allow-Origin: *");
//Metodos permitidos
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
//SEMPRE SERA JSON
header("Content-Type: application/json");
echo json_encode($array);
exit;





