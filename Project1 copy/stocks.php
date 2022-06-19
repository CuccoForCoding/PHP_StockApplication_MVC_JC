<!DOCTYPE html>
<!-- comment --><!-- <p>test</p> -->
<?php

try {

require_once 'models/database.php';
require_once 'models/stocks.php';



    $action_stock = htmlspecialchars(filter_input(INPUT_POST, "action_stock"));
    $symbol = htmlspecialchars(filter_input(INPUT_POST, "symbol"));
    $name = htmlspecialchars(filter_input(INPUT_POST, "name"));
    $current_price = filter_input(INPUT_POST, "current_price", FILTER_VALIDATE_FLOAT);

    if ($action_stock == "insert_stock" && $symbol != "" && $name != "" && $current_price != 0) {
        
        insert_stock($symbol, $name, $current_price);
        
    } else if ($action_stock == "update_s" && $symbol != "" && $name != "" && $current_price != 0) {

        update_stock($symbol, $name, $current_price);
        
    } else if ($action_stock == "delete_s" && $symbol != "") {

        delete_stock($symbol);
    }


   $stock = list_stocks(); 
   include ('views/stocks.php');
   
    
} catch (Exception $ex) {
    $error_message = $ex->getMessage();
    include('views/error.php');
}

?>



