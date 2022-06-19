<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Stocks</title>
    </head>
    <?php include ('topNavigation.php'); ?>
    <body>
        <table>
            <tr>
                <th>Name</th>
                <th>Symbol</th>
                <th>Current Price</th>
                <th>ID</th>
            </tr>
            <?php foreach ($stock as $stock) : ?>
                <tr>
                    <td> <?php echo $stock['symbol'] ?> </td>
                    <td> <?php echo $stock['name'] ?> </td>
                    <td> <?php echo $stock['current_price'] ?> </td>
                    <td> <?php echo $stock['id'] ?> </td>
                </tr>

            <?php endforeach; ?>
        </table>
        <br>
        <h2>Add Stock</h2>
        <form action="stocks.php" method="post">
            <label>Symbol: </label><br>
            <input type="text" name="symbol"><br><br>
            <label>Name:  </label><br>
            <input type="text" name="name"><br><br>
            <label>Current Price: </label><br>
            <input type="text" name="current_price"><br><br>
            <input type="hidden" name="action_stock" value="insert_stock">
            <label>&nbsp; </label><br><br>
            <input type="submit" value="Add Stock">
        </form> 
        <br>

        <h2>Update Stock</h2>
        <form action="stocks.php" method="post">
            <label>Symbol: </label><br>
            <input type="text" name="symbol"><br><br>
            <label>Name:  </label><br>
            <input type="text" name="name"><br><br>
            <label>Current Price: </label><br>
            <input type="text" name="current_price"><br><br>
            <input type="hidden" name="action_stock" value="update_s">
            <label>&nbsp; </label><br>
            <input type="submit" value="Update Stock"><br><br>
        </form> 
        <br>

        <h2>Delete Stock</h2>
        <form action="stocks.php" method="post">
            <label>Symbol: </label><br>
            <input type="text" name="symbol"><br><br>
            <input type="hidden" name="action_stock" value="delete_s">
            <label>&nbsp; </label><br>
            <input type="submit" value="Delete Stock"><br><br>
        </form>
        
        
        
        

    </body>
    <?php include ('footer.php'); ?>
</html>