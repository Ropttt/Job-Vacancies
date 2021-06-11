<?php
require_once ("header.php");
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<style>
    .container {
        max-width: 450px;
        padding-top: 50px;
    }
</style>
<div class="container">
    <div class="alert alert-primary" role="alert">
        Please make sure to input Your correct information!
    </div>
    <?php
    if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
        echo "<div class=\"alert alert-danger\" role=\"alert\">
                All fields should be filled!
                </div>";
    }
    ?>
    <form method="post" action="register-process.php">
        <div class="form-group">
            <h1></h1>
            <label for="company_name">Company name:</label>
            <input type="text" name="company_name" class="form-control" id="company_name" aria-describedby="company_name">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="email">
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <input type="tel" name="phone_number" class="form-control" id="phone_number">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </form>

</div>
<br/>
<div class="sticky-bottom">
    <?php
    require_once ("footer.php");
    ?>
</div>
</body>
</html>