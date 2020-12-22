<?php
include 'config.php';


$stmt= $conn->prepare("SELECT product_ID, product_name, description, image_url FROM product;");

$stmt->execute();

$stmt->bind_result($product_ID, $product_name, $description, $image_url);

$product_array= array();

while($stmt->fetch()){

    $temp= array();
    $temp['product_ID']=$product_ID;
    $temp['product_name']=$product_name;
    $temp['description']=$description;
    $temp['image_url']=$image_url;

    array_push($product_array, $temp);

}

echo json_encode($product_array);
?>