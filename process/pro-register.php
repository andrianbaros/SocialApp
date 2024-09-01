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

$query = "INSERT INTO user (username, email, password) VALUES ('$username','$email','$password')";

if ($conn->query($query) === TRUE) {
    $msg = "Registrasi Berhasil, Silahkan Login";
  } else {
    $msg = "Registrasi Gagal"; 
  }


header("Location: ../login.php?msg=". $msg);