<?php

function list_transactions() {
    
    global $database;
    
     $query3 = 'SELECT user_id, stock_id, quantity, price, timestamp, id from transaction';

    //prepare the query please
    $statement3 = $database->prepare($query3);

    //run  the query please
    $statement3->execute();

    ///might be risky if you have HUGE amounts of data
    $transactions = $statement3->fetchAll();

    $statement3->closeCursor();
    
    return $transactions;
}

function insert_transaction($user_id, $stock_id, $quantity) {
    
    global $database;

    $query = 'SELECT name, email_address, cash_balance, id FROM users WHERE id = :user_id';
        
        $statement_current_price = $database->prepare($query);
        $statement_current_price->bindValue(':user_id', $user_id);
        $statement_current_price->execute();
        $stock = $statement_current_price->fetch();
        $cash_bal = $stock['cash_balance'];
        $statement_current_price->closeCursor();

        $query = 'SELECT symbol, name, current_price, id FROM stocks WHERE id = :stock_id';

        $statement_stock_price = $database->prepare($query);
        $statement_stock_price->bindValue(':stock_id', $stock_id);
        $statement_stock_price->execute();
        $stock = $statement_stock_price->fetch();
        $current_p = $stock['current_price'];
        $statement_stock_price->closeCursor();

        $current_p = $current_p * $quantity;

        if ($cash_bal > $current_p) {
          echo "Success!";
          
            $query = 'INSERT INTO transaction(user_id, stock_id, quantity, price)'
                    . ' VALUES (:user_id,:stock_id,:quantity, :price)';

            //prepare the query please
            $statement_transaction_price = $database->prepare($query);

            $statement_transaction_price->bindValue(':user_id', $user_id);
            $statement_transaction_price->bindValue(':stock_id', $stock_id);
            $statement_transaction_price->bindValue(':quantity', $quantity);
            $statement_transaction_price->bindValue(':price', $current_p);

            //run  the query please
            $statement_transaction_price->execute();
            $statement_transaction_price->closeCursor();
            
             $cash_bal = $cash_bal - $current_p;
            
            $query = "update users set cash_balance = :cash_balance WHERE id = :user_id";

        //value binding in PDO protects against SQL Injection
        $statement = $database->prepare($query);
        $statement->bindValue(":cash_balance", $cash_bal);
        $statement->bindValue(":user_id", $user_id);
        $statement->execute();
        $statement->closeCursor();
    }
}

function update_transaction($transaction_id, $stock_id, $quantity) {
    
    global $database;
    
    $query = "UPDATE transaction SET stock_id = :stock_id, quantity = :quantity WHERE id = :transaction_id";

        //value binding in PDO protects against SQL Injection
        $statement = $database->prepare($query);
        $statement->bindValue(':transaction_id', $transaction_id);
        $statement->bindValue(':stock_id', $stock_id);
        $statement->bindValue(':quantity', $quantity);
        $statement->execute();
       // $current_p = $stock['current_price'];
        $statement->closeCursor();
        
       // $current_p = $current_p * $quantity;
}

function delete_transaction($stock_id, $transaction_id) {
    
    global $database;
    
    $query = 'SELECT quantity, user_id FROM transaction WHERE id = :transaction_id';

        $statement = $database->prepare($query);
        $statement->bindValue(':transaction_id', $transaction_id);
        $statement->execute();
        $stock = $statement->fetch();
        $quantity = $stock['quantity'];
        $user_id = $stock['user_id'];
        $statement->closeCursor();
        
        
        $query = 'SELECT current_price FROM stocks WHERE id = :stock_id';

        $statement = $database->prepare($query);
        $statement->bindValue(':stock_id', $stock_id);
        $statement->execute();
        $stock = $statement->fetch();
        $current_p = $stock['current_price'];
        $statement->closeCursor();

        $current_p = $current_p * $quantity;
        
        
        $query = 'SELECT cash_balance FROM users WHERE id = :user_id';

        $statement = $database->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement->execute();
        $stock = $statement->fetch();
        $cash_bal = $stock['cash_balance'];
        $statement->closeCursor();

        $cash_bal = $cash_bal + $current_p;

        $query = "UPDATE users set cash_balance = :cash_balance WHERE id = :user_id";
        
         $statement = $database->prepare($query);
         $statement->bindValue(':cash_balance', $cash_bal);
         $statement->bindValue(':user_id', $user_id);
         $statement->execute();
         $statement->closeCursor();
         
        
        //Instead use substitutions with ':'
        $query = "DELETE from transaction WHERE stock_id = :stock_id AND id = :transaction_id";

        //value binding in PDO protects against SQL Injection
        $statement = $database->prepare($query);
        $statement->bindValue(":stock_id", $stock_id); 
        $statement->bindValue(":transaction_id", $transaction_id);    // ":user_id" WHERE MY QUERY IS GETTING ITS VALUE FROM 
        $statement->execute();    
        $statement->closeCursor();
}

?>

