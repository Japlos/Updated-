
<?php

    require_once("functions.php");
    if(isset($_POST['save-expense'])){
        $name = $_POST['expense-name'];
        $amount = $_POST['amount']; 
        $signal = saveExpense($name, $amount);
        header("Location: table.php");
        exit();
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Expenses</h1>
    <form action="." method="post">
        <label for="expense">Expense Name</label>
        <input type="text" name="expense-name" id="">
        <br>
        <br>
        <label for="amount">Amount</label>
        <input type="text" name="amount" id="">
        <br>
        <button type="submit" name="save-expense">Save</button>
    </form>
    <br>
    
    
</body>

</html>