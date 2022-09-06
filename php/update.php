<?php
if(isset($_GET['id'])) {

    include 'db_conn.php';

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_GET['id']);

    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
    } else {
        header("Location: read.php");
    }

} elseif(isset($_POST['update'])){

    include '../db_conn.php';
    
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $id = validate($_POST['id']);

    if(empty($name)){
        header("Location: ../update.php?id=$id&error=Name is required");
    } elseif(empty($email)){
        header("Location: ../update.php?id=$id&error=Email is required");
    } else {

    }

}
else {
    header("Location: read.php");
}