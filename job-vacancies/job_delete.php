<?php
session_start();
$user_id = $_SESSION['user_id'];

require_once "database.php";

$id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);

$conn->exec("DELETE FROM jobs WHERE id=$id AND user_id=$user_id");

header("Location: company-profile.php");
