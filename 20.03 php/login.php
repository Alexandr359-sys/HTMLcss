<?php
session_start();

$correct_email = "admin@gmail.com";
$correct_password = "1234";

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
if ($email === $correct_email && $password === $correct_password) {
   $_SESSION['logged_in'] = true;
   header("Location: logs.php");
   exit();
} else {
   header("Location: index.php?error=1");
   exit();
}