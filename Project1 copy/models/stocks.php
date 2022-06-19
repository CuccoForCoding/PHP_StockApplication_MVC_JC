<?php

function list_stocks() {
    
    global $database;
    
     $query = 'SELECT symbol, name, current_price, id from stocks';
    //prepare the query please
    $statement = $database->prepare($query);

    //run  the query please
    $statement->execute();

    ///might be risky if you have HUGE amounts of data
    $stock = $statement->fetchAll();

    $statement->closeCursor();
    
    return $stock;
}

function insert_stock($symbol, $name, $current_price) {
    
    global $database;
    
        $query = "INSERT INTO stocks (symbol, name, current_price)"
                . "VALUES (:symbol, :name, :current_price)";

        //value binding in PDO protects against SQL Injection
        $statement = $database->prepare($query);
        $statement->bindValue(":symbol", $symbol);
        $statement->bindValue(":name", $name);
        $statement->bindValue(":current_price", $current_price);

        $statement->execute();

        $statement->closeCursor();
}

function update_stock($symbol, $name, $current_price) {
    
    global $database;
    
    //Instead use substitutions with ':'
        $query = "update stocks set name = :name, current_price = :current_price "
                . " where symbol = :symbol";

        //value binding in PDO protects against SQL Injection
        $statement = $database->prepare($query);
        $statement->bindValue(":symbol", $symbol);
        $statement->bindValue(":name", $name);
        $statement->bindValue(":current_price", $current_price);

        $statement->execute();

        $statement->closeCursor();
}

function delete_stock($symbol) {
    
    global $database;
    
    //Instead use substitutions with ':'
        $query = "delete from stocks "
                . " where symbol = :symbol";

        //value binding in PDO protects against SQL Injection
        $statement = $database->prepare($query);
        $statement->bindValue(":symbol", $symbol);

        $statement->execute();

        $statement->closeCursor();
}


?>

