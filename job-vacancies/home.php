<?php
require_once ("header.php");
require_once ("database.php");

echo "

    <form method='post'>
    <input type='text' name='city'>
    <input type='text' name='job'>
    <input type='submit' value='search'>

</form>
";

if (isset($_POST['search'])) {

    $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
    $job = filter_var($_POST['job'], FILTER_SANITIZE_STRING);

    $task = "SELECT * FROM jobs WHERE job_city='$city' OR job_category='$job'";
    $result = $conn->query($task, PDO::FETCH_ASSOC);

    while ($row = $result->fetch()) {
        $job_name = $row['job_name'];
        echo  "<li>" . $row['job_name'];
    }

}else{

    echo "No jobs found!";

}

?>

