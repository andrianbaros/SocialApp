<?php

require '../database.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_pass = $_POST['confirm_password'];

//tidak boleh kosong
if(empty($username) || empty($email) || empty($password) || empty($confirm_pass)){
    $msg = "Semuanya harus diisi ngentot";
    header("Location: ../register.php?msg=". $msg);
    return;
}

//password harus sama
if($password !== $confirm_pass){
    $msg = "Password Tidak Sama Memek";
    header("Location: ../register.php?msg=". $msg);
    return;
}

try{
  $query = "INSERT INTO user (username, email, password) VALUES ('$username','$email','$password')";
  $conn->query($query);
  $msg = "Registrasi Berhasil, Silahkan Login";
}catch(mysqli_sql_exception $e){
  if($e->getCode() == 1062){
    $msg = "Email Sudah Ada";
    header("Location: ../register.php?msg=". $msg);
    return;
  }
}


header("Location: ../login.php?msg=". $msg);