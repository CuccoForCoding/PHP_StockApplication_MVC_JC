<?php

try {
    
    require_once 'models/database.php';
    require_once 'models/users.php';
    
    $action_user = htmlspecialchars(filter_input(INPUT_POST, "action_user"));
    $name_user = htmlspecialchars(filter_input(INPUT_POST, "name_user"));
    $email_address = htmlspecialchars(filter_input(INPUT_POST, "email_address"));
    $cash_balance = filter_input(INPUT_POST, "cash_balance", FILTER_VALIDATE_FLOAT);

    if ($action_user == "insert_user" && $name_user != "" && $email_address != "" && $cash_balance != 0) {
      
        insert_user($name_user, $email_address, $cash_balance);
        
    } else if ($action_user == "update_user" && $name_user != "" && $email_address != "" && $cash_balance != 0) {

       update_user($name_user, $email_address, $cash_balance);
       
    } else if ($action_user == "delete_user" && $name_user != "") {

       delete_user($name_user);
    }
    
   $user = list_users();
   include ('views/users.php');

} catch (Exception $ex) {
    $error_message = $ex->getMessage();
    include('views/error.php');
}


?>