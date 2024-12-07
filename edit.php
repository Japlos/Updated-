<?php

    require_once("functions.php");
    $singleExpense = null;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $singleExpense = getSingleExpense($id);
    }

    if(isset($_POST['update-button'])){
        $id = $_POST['update-id'];
        $name = $_POST['update-name'];
        $amount = $_POST['update-amount'];
        updateExpense($id, $name, $amount);
        header("Location: table.php");
        exit();
    }
        <img
                src="assets/hide.png"
                alt="Toggle Password Visibility"
                id="hidesignup"
              />
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="edit.php" method="POST">
        <label for="">Name</label>
        <input type="text" name="update-name" id="" value="<?php echo $singleExpense['name']; ?>">
        <label for="">Amount</label>
        <input type="text" name="update-amount" id="" value="<?php echo $singleExpense['amount'];?>">
        <input type="hidden" name="update-id" value="<?php echo $singleExpense['expense_id']; ?>">
        <button type="submit" name="update-button">Update</button>
    </form>
</body>
</html>