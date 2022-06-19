<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>Users</title>
    </head>
    <?php include ('topNavigation.php'); ?>
    <body>
         <table>
            <tr>
                <th>Name</th>
                <th>Email Address</th>
                <th>Cash Balance</th>
                <th>ID</th>
            </tr>
            <?php foreach ($user as $users) : ?>
                <tr>
                    <td> <?php echo $users['name'] ?> </td>
                    <td> <?php echo $users['email_address'] ?> </td>
                    <td> <?php echo $users['cash_balance'] ?> </td>
                    <td> <?php echo $users['id'] ?> </td>
                </tr>

            <?php endforeach; ?>
        </table>
        <br>
        <h2>Add User</h2>
        <form action="users.php" method="post">
            <label>Name: </label><br>
            <input type="text" name="name_user"><br><br>
            <label>Email Address:  </label><br>
            <input type="text" name="email_address"><br><br>
            <label>Cash Balance: </label><br>
            <input type="text" name="cash_balance"><br><br>
            <input type="hidden" name="action_user" value="insert_user">
            <label>&nbsp; </label><br><br>
            <input type="submit" value="Add User">
        </form> 
        <br>

        <h2>Update User</h2>
        <form action="users.php" method="post">
            <label>Name: </label><br>
            <input type="text" name="name_user"><br><br>
            <label>Email Address:  </label><br>
            <input type="text" name="email_address"><br><br>
            <label>Cash Balance: </label><br>
            <input type="text" name="cash_balance"><br><br>
            <input type="hidden" name="action_user" value="update_user">
            <label>&nbsp; </label><br><br>
            <input type="submit" value="Update User">
        </form> 
        <br>

        <h2>Delete User</h2>
        <form action="users.php" method="post">
            <label>Name: </label><br>
            <input type="text" name="name_user"><br><br>
            <input type="hidden" name="action_user" value="delete_user">
            <label>&nbsp; </label><br>
            <input type="submit" value="Delete User"><br><br>
        </form> 


    </body>
</html>
