<?php
require_once ("header.php");
?>

<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
<div class="jumbotron">
    <p class="lead">This is a simple website that helps people find new jobs around them</p>
    <hr class="my-4">
    <p>Are you a company that wants to post a job? Start by creating your own account now!</p>
    <a class="btn btn-primary btn-lg" href="register.php" role="button">Sign up Now</a>
</div>

<style>

</style>
<div class="container text-center" style="max-width: 500px; width: 100%">
    <div class="card">
        <div class="card-body">
            <div class="alert alert-primary" role="alert" style="width: 100%">
                Already have an account? Login below now!
            </div>
            <?php
            if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
                echo "<div class=\"alert alert-danger\" role=\"alert\" style=\"width: 100%\">
                    Wrong Username or Password! Try Again!
                    </div>";
            }
            ?>
            <?php
            if (isset($_GET["msg"]) && $_GET["msg"] == 'register-success') {
                echo "<div class=\"alert alert-success\" role=\"alert\" style=\"width: 100%\">
                          <h4 class=\"alert-heading\">Well done! Registration Completed!</h4>
                          <p>You have successfully registered to our Job Vacancies. This will allow you to login and start finding jobs that suit you.</p>
                          <hr>
                          <p class=\"mb-0\">Please login with the credentials you used to register!</p>
                      </div>";
            }
            ?>
            <form method="post" action="authenticate.php" style="width: 100%">
                <div class="form-group">
                    <h1></h1>
                    <label for="company_name">Company Name:</label>
                    <input type="text" name="company_name" class="form-control" id="company_name" aria-describedby="company_name">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>

            </form>
        </div>
    </div>
</div>
<br/>
<br/>
<div class="sticky-bottom">
    <?php
    require_once ("footer.php");
    ?>
</div>
</body>
</html>

