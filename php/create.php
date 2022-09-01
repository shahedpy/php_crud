<?php

if(isset($_POST['create'])){
    include '../db_conn.php';
    
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);

    $user_data = 'name='.$name.'&email='.$email;

    if(empty($name)){
        header("Location: ../index.php?error=Name is required&$user_data");
    } elseif(empty($email)){
        header("Location: ../index.php?error=Email is required&$user_data");
    } else {

    }
    
}