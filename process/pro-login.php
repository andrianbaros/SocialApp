<?php
session_start();

require '../database.php';

$email = $_POST['email'];
$password = $_POST['password'];

if(empty($email) || empty($password)){
    $msg = "Semuanya Harus diisi ngentot"; 
    header("Location: ../login.php?msg=". $msg);
}

$query = "SELECT email, password FROM user WHERE email = '$email' AND password = '$password'";
$result = $conn->query($query);

if($result->num_rows > 0){
    echo"Login berhasil";
    $_SESSION['email'] = $email;
    header("Location: ../feed.php");
}else{
    $msg="Login Gagal";
    header("Location: ../login.php?msg=". $msg);
}

