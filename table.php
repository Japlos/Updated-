<?php

    require_once("functions.php");
    $expenses = getAllExpenses();
    

    if(isset($_POST['delete-button'])){
        $id = $_POST['id-delete'];
        deleteExpense($id);
        header("Location: table.php");
        exit();        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Expenses</title>
</head>
<body>
<table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($expenses as $expense):?>
                <tr>
                    <td><?php echo $expense['expense_id']; ?></td>
                    <td><?php echo $expense['name']; ?></td>
                    <td><?php echo $expense['amount']; ?></td>
                    <td>
                        <form action="table.php" method="post">
                            <input type="hidden" name="id-delete" value="<?php echo $expense['expense_id'] ?>">
                            <button type="submit" name="delete-button">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="edit.php?id=<?php echo $expense['expense_id'];?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>

</body>
</html>