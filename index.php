<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("Connection to this database failed due to " . mysqli_connect_error());

    }
    // echo "Success Connecting to the Database";

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];
    $query = $_POST['query'];


    $sql = "INSERT INTO `trip`.`trip` (`Name`, `Email`, `Phone Number`, `Course`, `Query`, `Date`) VALUES ('$name', '$email', '$phone', '$course', '$query', current_timestamp());"

    // echo $sql;

    if($con->query($sql)) == true{
        // echo "Successfully inserted";
        $insert= true;
    }
    else{
        echo "Error: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">
</head>
<body>
    <img class ="bg" src="img/trav.jpg" alt="">
    <div class="container">
        <h1>Welcome to Dubai Trip</h1>
        <p>Enter your details and submit your form to conform your participation in the trip</p>
        
        <?php 
        if($insert == true){
        echo "<p class='submitmsg'>Thanks for submmiting your form, We are happy to see you joining us for dubai trip</p>";}
        ?> 

        <form action="index.php" method="POST"></form>
        <input type="text" name="name" placeholder="Enter your name">
        <input type="email" name="Email Id" placeholder="Enter your Email">
        <input type="text" name="Phone Number" placeholder="Enter your Phone Number">
        <input type="text" name="Your Course" placeholder="Enter your Course">
        <textarea name="desc" id="" cols="30" rows="10" placeholder="Enter any other information here!!!"></textarea>
        <button class="btn">Submit</button>
        <!-- <button class="btn">Reset</button> -->
        

    </div>

    <script src="index.js">

    </script>
</body>
</html>