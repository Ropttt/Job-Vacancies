<?php
require_once ("database.php");
session_start();

$company_id = $_SESSION['user_id'];
$job_name = filter_var($_POST['job_name'], FILTER_SANITIZE_STRING);
$job_category = filter_var($_POST['job_category'], FILTER_SANITIZE_STRING);
$job_city= filter_var($_POST['job_city'], FILTER_SANITIZE_STRING);

if (empty($job_name) || empty($job_category) || empty($job_city)) {
    header("Location: company-profile.php?msg=failed");
}
else {
    $sql = "INSERT INTO jobs (job_name, job_category, job_city, company_id) VALUES ('$job_name', '$job_category', '$job_city', '$company_id')";
    $conn->exec($sql);

    header("Location: company-profile.php?msg=job-posted");
    die();
}
