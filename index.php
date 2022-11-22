<?php
    if(isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password = "";


    $con = mysqli_connect($server, $username, $password);

    if(!$con) {
        die(mysqli_connect_error());
    }

    echo "Success connection";

    $s_name = $_POST['name'];
    $s_year = $_POST['year'];
    $s_div = $_POST['div'];
    $s_roll = $_POST['roll'];
    $s_phone = $_POST['phone'];
    $s_spot = $_POST['spot'];
    $s_sugg = $_POST['suggestions'];
    $added = false;
    $sql_insert = "INSERT INTO `college_trip`.`college_trip` (`s_name`, `s_year`, `s_div`, `s_roll`, `s_phone`, `s_spot`, `s_sugg`, `s_date`) VALUES ('$s_name', '$s_year', '$s_div', '$s_roll', '$s_phone', '$s_spot', '$s_sugg', current_timestamp());";
    if($con->query($sql_insert) == true) {
    $added = true;
    echo "successfully inserted";
    }
    else {
    echo "ERROR: $sql_insert <br> $con->error";
    }

    $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Trip</title>
</head>

<body>

    <div class="container">
        <h1>Welcome to Sanjivani Presents Annual Trip</h1>
        <h2>Fill in your details and help us decide the spot</h2>
        <form action="index.php" method="POST">
            <input type="text" id="name" name="name" placeholder="Your name">
            <input type="text" id="year" name="year" placeholder="Year">
            <input type="text" id="div" name="div" placeholder="Division">
            <input type="number" id="roll" name="roll" placeholder="Roll No">
            <input type="text" id="phone" name="phone" placeholder="Phone number">
            <input type="text" id="spot" name="spot" placeholder="Suggested Spot">
            <textarea name="suggestions" id="suggestions" cols="30" rows="5"></textarea>
            <button id="submit">Submit</button>
            <?php 
            if($added == true) {
                echo "<h2> Thanks for your response </h2>";
            }
            ?>
        </form>
    </div>
</body>

</html>