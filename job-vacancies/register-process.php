<?php
require_once ("database.php");

$company_name = filter_var($_POST['company_name'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
$phone_number = filter_var($_POST['phone_number'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

if (empty($company_name) || empty($email) || empty($phone_number) || empty($password)) {
    header("Location: register.php?msg=failed");
}
else {
    $sql = "INSERT INTO users (company_name, email, phone_number, password) VALUES ('$company_name', '$email', '$phone_number', MD5('$password'))";
    $conn->exec($sql);

    header("Location: company-profile.php?msg=register-success");
    die();
}
