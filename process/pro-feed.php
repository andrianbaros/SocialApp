<?php
session_start();
require '../database.php';

$text = $_POST['text'];



//query ambil id
$email = $_SESSION['email'];
$sql = "SELECT id_user FROM user WHERE email = '$email'";
$result_id = $conn->query($sql);
$id_user = $result_id->fetch_assoc()['id_user'];


if(empty($text)){
    $msg = "Tidak Boleh Kosong";
    header("Location: ../feed.php?msg=". $msg);
    return;
}

//query insert
$query = "INSERT INTO status (id_user, text) VALUES ('$id_user', '$text')";
if($conn->query($query)){
    $msg = "Berhasil ditambahkan";
}else{
    $msg = "Gagal ditambahkan";
}

header("Location: ../feed.php?msg=". $msg);
