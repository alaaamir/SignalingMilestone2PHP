<?php
include 'config.php';


$stmt= $conn->prepare("SELECT shop_ID, shop_name, longitude, latitude FROM shop;");

$stmt->execute();

$stmt->bind_result($shop_ID, $shop_name, $longitude, $latitude);

$shop_array= array();

while($stmt->fetch()){

    $temp= array();
    $temp['shop_ID']=$shop_ID;
    $temp['shop_name']=$shop_name;
    $temp['longitude']=$longitude;
    $temp['latitude']=$latitude;

    array_push($shop_array, $temp);

}

echo json_encode($shop_array);
?>