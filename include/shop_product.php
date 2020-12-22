<?php
include 'config.php';

$product_ID = $_GET['id'];

$stmt= $conn->prepare("SELECT * FROM shop_product WHERE product_ID = $product_ID;");

$stmt->execute();

$stmt->bind_result($shop_product_id, $shop_ID, $product_ID, $price, $special_offers);



$shop_products_array = array();
$shop_array= array();

while($stmt->fetch()){

    $temp= array();
    $temp['shop_product_id']=$product_ID;
    $temp['shop_ID']=$shop_ID;
    $temp['product_ID']=$product_ID;
    $temp['price']=$price;
    $temp['special_offers']=$special_offers;
    array_push($shop_products_array 
, $temp);
}
$temp3 = array("product" => $shop_products_array);

// echo json_encode($temp3);


for($i = 0; $i<sizeof($shop_products_array); $i++){
    
$stmt2= $conn->prepare("SELECT * FROM shop WHERE shop_id = ".$shop_products_array[$i]['shop_ID'].';');

$stmt2->execute();

$stmt2->bind_result($shop_ID, $shop_name, $longitude, $latitude);


while($stmt2->fetch()){

    $temp2= array();
    $temp2['shop_ID']=$shop_ID;
    $temp2['shop_name']=$shop_name;
    $temp2['longitude']=$longitude;
    $temp2['latitude']=$latitude;

    array_push($shop_array, $temp2);

}

$temp4 = array("shops" => $shop_array);

$new_arr = array_merge($temp4, $temp3);

}




echo json_encode($new_arr);
?>