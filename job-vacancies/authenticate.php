<?php
session_start();
include_once ("database.php");

$company_name = filter_var($_POST['company_name'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

$sql = "SELECT * FROM users WHERE company_name='$company_name' AND password=MD5('$password')";

$result = $conn->query($sql, PDO::FETCH_ASSOC);

if ($result->rowCount() > 0) {
    $row = $result->fetch();
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['company_name'];
    $_SESSION['user_phone'] = $row['phone_number'];
    $_SESSION['user_email'] = $row['email'];
    $_SESSION['currentpassword'] = $row['password'];
    $_SESSION['profile_pic'] = $row['profile_pic'];
    header("Location: company-profile.php");
} else {
    header("Location: login-signup.php?msg=failed");
}
