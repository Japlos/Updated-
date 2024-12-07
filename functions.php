<?php

function getConnection(){
    $serverName = "localhost";
    $user = "root";
    $password = "root";
    $database = "expense_management";

    $connection = mysqli_connect($serverName, $user, $password, $database);
    if($connection){
        return $connection;
    }
    return false;
}



function saveExpense($name, $amount){
    $connection = getConnection();

    $statement = "INSERT INTO expense (name, amount) VALUES('".$name."','".$amount."')";
    if(mysqli_query($connection, $statement)){
        return "Successfully saved.";
    }else{
        return "There is an error saving the expense.";
    }

}


function getAllExpenses(){
    $connection = getConnection();
    $statement = "SELECT * FROM expense";
    $query = mysqli_query($connection, $statement);
    if(mysqli_num_rows($query) > 0){
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }

    return false;
    
}

function deleteExpense($id){
    $connection = getConnection();
    $statement = "DELETE FROM expense WHERE expense_id = ".$id;
    if(mysqli_query($connection, $statement)){
        return "Successfully deleted expense with id ". $id;
    }else{
        return "There is an error deleting expense with id ". $id;
    }
    
}


function getSingleExpense($id){
    $connection = getConnection();
    $statement ="SELECT * FROM expense WHERE expense_id = ".$id;
    $result = mysqli_query($connection, $statement);
    if($result && mysqli_num_rows($result) > 0){
        return mysqli_fetch_assoc($result);
    }
    return false;
}

function updateExpense($id, $name, $amount){
    $connection = getConnection();
    $statement = "UPDATE expense SET name = '".$name ."', amount = '" . $amount . "' WHERE expense_id = ". $id; 
    if(mysqli_query($connection, $statement)){
        return true;
    }else{
        return false;
    }
}