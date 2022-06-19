<?php



try {
    
    require_once 'models/database.php';
    require_once 'models/transactions.php';
    
     $action = htmlspecialchars(filter_input(INPUT_POST, "action"));
    $user_id = htmlspecialchars(filter_input(INPUT_POST, "user_id"));
    $stock_id = htmlspecialchars(filter_input(INPUT_POST, "stock_id"));
    $quantity = htmlspecialchars(filter_input(INPUT_POST, "quantity"));
    $transaction_id = htmlspecialchars(filter_input(INPUT_POST, "transaction_id"));

    if ($action == "insert_transaction" && $user_id != "" && $stock_id != "" && $quantity != 0) {

        insert_transaction($user_id, $stock_id, $quantity);
          
    } else if ($action == "update_trans" && $transaction_id != "" && $stock_id != "" && $quantity != 0) {
   
        update_transaction($transaction_id, $stock_id, $quantity);
        
        
    } else if ($action == "delete_trans" && $stock_id != "" && $transaction_id != "") {      
        
        delete_transaction($stock_id, $transaction_id);
    }
    
   $transactions  = list_transactions();
   include ('views/transactions.php');

} catch (Exception $ex) {
    $error_message = $ex->getMessage();
    include('views/error.php');
}

?>


