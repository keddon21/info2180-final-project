<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" id="bootstrap-css" rel="stylesheet">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!------ Include the above in your HEAD tag ---------->



<!DOCTYPE html>

<html lang="en">

<?php

    include_once 'database_connection.php';

    session_start();

    if(isset($_SESSION["user_email"]))

    {

        header("Location: Issues.php");

    }

?>

<head>

    <meta charset="utf-8">

    <meta content="IE=edge" http-equiv="X-UA-Compatible">

    <meta content="width=device-width, initial-scale=1" name="viewport">

    <meta content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3"

          name="description">

    <title>User Login</title>

    <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"

          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"

          rel="stylesheet">

    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>





    <style>

        body {

            font-family: "Lato", sans-serif;

        }



        .form-check {

            padding-left: 500px;

        }



    </style>





</head>



<body>



<nav class="navbar navbar-expand-sm bg-dark navbar-dark">



    <a class="navbar-brand" href="#">

        <img alt="Logo" src="images\bug.png" style="width:40px;">

    </a>

    <a class="navbar-brand" href="#">BugMe Issue Tracker</a>





</nav>

<div class="form-check col-md-7">

    <h1 class="font-weight-bold">User Login</h1><br>

    <form method="POST">





        <div class="form-group">

            <label for="email">Email</label>

            <input class="form-control" id="email" placeholder="Email" name="email" required type="email">

        </div>

        <div class="form-group ">

            <label for="password">Password</label>

            <input class="form-control" id="password" placeholder="Password" name="password" required type="password">

        </div>

        <input class="button_a btn btn-primary " name="login" type="submit">





    </form>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script crossorigin="anonymous"

        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"

        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<script crossorigin="anonymous"

        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"

        src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>





<?php

if (isset($_POST['login'])) {



    $user_email = $_POST['email'];

    $user_password = $_POST['password'];

    $sql = "SELECT email,password FROM users";

    $result = $conn->query($sql);

    $flag = 0;



if ($result->num_rows > 0) {



    // output data of each row

    while($row = $result->fetch_assoc()) {



        if($row["email"]==$user_email && $row["password"]==md5($user_password))

        {

             $_SESSION["user_email"] = $user_email;



                header("Location: user_dashboard.php");

             



        } 

    }
    header("Location: user_dashboard.php");
    $flag = 1;

    // if($flag==1)

    // {

    //     echo '<script>alert("Error")</script>';

    // }

} 

$conn->close();

    

} 

?>





</body>



</html>