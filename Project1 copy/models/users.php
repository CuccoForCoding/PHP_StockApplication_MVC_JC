<?php

function list_users() {
    
    global $database;
    
    $query2 = 'SELECT name, email_address, cash_balance, id from users';

    //prepare the query please
    $statement2 = $database->prepare($query2);

    //run  the query please
    $statement2->execute();

    ///might be risky if you have HUGE amounts of data
    $user = $statement2->fetchAll();

    $statement2->closeCursor();
    
    return $user;
    
}

function insert_user($name_user, $email_address, $cash_balance) {
    
    global $database;
    
    $query = "INSERT INTO users (name, email_address, cash_balance)"
                . "VALUES (:name, :email_address, :cash_balance)";

        //value binding in PDO protects against SQL Injection
        $statement = $database->prepare($query);
        $statement->bindValue(":name", $name_user);
        $statement->bindValue(":email_address", $email_address);
        $statement->bindValue(":cash_balance", $cash_balance);

        $statement->execute();

        $statement->closeCursor();
}

function update_user($name_user, $email_address, $cash_balance) {
    
    global $database;
    
     $query = "update users set name = :name, email_address = :email_address, cash_balance=:cash_balance  "
                . " where email_address = :email_address";

        //value binding in PDO protects against SQL Injection
        $statement = $database->prepare($query);
        $statement->bindValue(":name", $name_user);
        $statement->bindValue(":email_address", $email_address);
        $statement->bindValue(":cash_balance", $cash_balance);

        $statement->execute();

        $statement->closeCursor();
}

function delete_user($name_user) {
    
    global $database;
   
        $query = "delete from users "
                . " where name = :name";

        //value binding in PDO protects against SQL Injection
        $statement = $database->prepare($query);
        $statement->bindValue(":name", $name_user);

        $statement->execute();

        $statement->closeCursor();
}

?>

