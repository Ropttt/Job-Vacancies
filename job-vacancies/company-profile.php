<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: login-signup.php');
    die();
}
require_once ("profile-header.php");
require_once ("database.php");

$company_id = $_SESSION['user_id'];

echo "
<link rel='stylesheet' href='company-profile.css'>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css' integrity='sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l' crossorigin='anonymous'>
<link rel='stylesheet' href='profile-picture.css'>
<div class='container'>
    <div class='main-body'>

        <div class='row gutters-sm'>
            <div class='col-md-4 mb-3'>
                <div class='card'>
                    <div class='card-body'>
                        <div class='d-flex flex-column align-items-center text-center'>
                            <img src='" . $_SESSION['profile_pic'] . "'>
                            <form action='upload.php' method='post' enctype='multipart/form-data'>
                                <input type='file' name='new_image'>
                                <input type='submit' value='Upload'>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-md-8'>
                <div class='card mb-3'>
                    <div class='card-body'>
                        <div class='row'>
                            <div class='col-sm-3'>
                                <h6 class='mb-0'>Company Name</h6>
                            </div>
                            <div class='col-sm-9 text-secondary'>
                            <p>" . $_SESSION['user_name'] . "</p>
                                
                            </div>
                        </div>
                        <hr>
                        <div class='row'>
                            <div class='col-sm-3'>
                                <h6 class='mb-0'>Email</h6>
                            </div>
                            <div class='col-sm-9 text-secondary'>
                            <p>" . $_SESSION['user_email'] . "</p>
                            </div>
                        </div>
                        <hr>
                        <div class='row'>
                            <div class='col-sm-3'>
                                <h6 class='mb-0'>Phone</h6>
                            </div>
                            <div class='col-sm-9 text-secondary'>
                             <p>" . $_SESSION['user_phone'] . "</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form method='post' action='job-posting-process.php'>
        <div class='form-group'>
            <h1></h1>
            <label for='job_name'>Job name:</label>
            <input type='text' name='job_name' class='form-control' id='job_name' aria-describedby='job_name'>
        </div>
        <div class='form-group'>
            <label for='job_category'>Job Category:</label>
            <input type='text' name='job_category' class='form-control' id='job_category' aria-describedby='job_category'>
        </div>
        <div class='form-group'>
            <label for='job_city'>Job City:</label>
            <input type='text' name='job_city' class='form-control' id='job_city'>
        </div>
        <button type='submit' class='btn btn-primary'>Submit</button>
        </form>
        <hr />
                <div>
                    <h2>Jobs</h2>
                    <ul>";
            $sqltask = "SELECT * FROM jobs WHERE company_id='$company_id'";
            $result = $conn->query($sqltask, PDO::FETCH_ASSOC);

            while($row = $result->fetch()) {
                $job_name = $row['job_name'];
                $job_id =  $row['job_id'];
                echo "<li>" . $row['job_name'] .
                    " <a href='job_delete.php?id=$job_id'>X</a></li><br />";
            }

            echo "
                    </ul>
                </div>
                </div>
                    </div>
"
?>