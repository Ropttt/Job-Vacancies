<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
header(("Location: login-signup.php"));
die();
