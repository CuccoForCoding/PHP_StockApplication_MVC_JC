<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Transactions</title>
    </head>
    <?php include ('topNavigation.php'); ?>
    <body>
        <table>
            <tr>
                <th>User ID</th>
                <th>Stock Id</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Timestamp</th><!-- comment -->
                <th>ID</th>
            </tr>
            <?php foreach ($transactions as $transaction) : ?>
                <tr>
                    <td> <?php echo $transaction['user_id'] ?> </td>
                    <td> <?php echo $transaction['stock_id'] ?> </td>
                    <td> <?php echo $transaction['quantity'] ?> </td>
                    <td> <?php echo $transaction['price'] ?> </td>
                    <td> <?php echo $transaction['timestamp'] ?> </td>
                    <td> <?php echo $transaction['id'] ?> </td>
                </tr>

            <?php endforeach; ?>
        </table>
        <br>
        <h2>Add Transaction</h2>
        <form action="transactions.php" method="post">
            <label>User ID: </label><br>
            <input type="text" name="user_id"><br><br>
            <label>Stock ID:  </label><br>
            <input type="text" name="stock_id"><br><br>
            <label>Quantity: </label><br>
            <input type="text" name="quantity"><br><br>

            <input type="hidden" name="action" value="insert_transaction">
            <label>&nbsp; </label><br><br>
            <input type="submit" value="Add Transaction">
        </form> 
        <br>

        <h2>Update Transaction</h2>
        <form action="transactions.php" method="post">
            <label>Transaction ID: </label><br>
            <input type="text" name="transaction_id"><br><br>
            <label>Stock ID:  </label><br>
            <input type="text" name="stock_id"><br><br>
            <label>Quantity: </label><br>
            <input type="text" name="quantity"><br><br>
            <input type="hidden" name="action" value="update_trans">
            <label>&nbsp; </label><br><br>
            <input type="submit" value="Update Transaction">
        </form> 
        <br>

        <h2>Delete Transaction</h2>
        <form action="transactions.php" method="post">
            <label>Stock ID: </label><br>
            <input type="text" name="stock_id"><br><br>
            <label>Transaction ID:  </label><br>
             <input type="text" name="transaction_id"><br><br>
            <input type="hidden" name="action" value="delete_trans">
            <label>&nbsp; </label><br>
            <input type="submit" value="Delete Transaction"><br><br>
        </form> 
    </body>
</html>
