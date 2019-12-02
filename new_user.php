<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" id="bootstrap-css" rel="stylesheet">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<?php

include_once 'database_connection.php';

session_start();

 if(!isset($_SESSION["admin"]))

{

    header("Location: admin_login.php");

}

?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta content="IE=edge" http-equiv="X-UA-Compatible">

    <meta content="width=device-width, initial-scale=1" name="viewport">

    <meta content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3"

          name="description">

    <title>BugMe Issue Tracker</title>

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

            padding-left: 250px;

        }



        .sidenav {

            height: 100%;

            width: 200px;

            position: fixed;

            z-index: 1;

            top: 62px;

            left: 0;

            background-color: #f7f7f7;

            overflow-x: hidden;

            padding-top: 40px;

            padding-left: 18px;

        }



        .sidenav a {

            padding: 6px 8px 6px 16px;

            text-decoration: none;

            font-size: 20px;

            color: #292b2c;

            display: block;

        }



        .sidenav a:hover {

            color: #f1f1f1;

        }



        .main {

            margin-left: 160px; /* Same as the width of the sidenav */

            font-size: 28px; /* Increased text to enable scrolling */

            padding: 0px 10px;

        }



        @media screen and (max-height: 450px) {

            .sidenav {

                padding-top: 15px;

            }



            .sidenav a {

                font-size: 18px;

            }

        }

    </style>





</head>



<body>



<nav class="navbar navbar-expand-sm bg-dark navbar-dark">



    <a class="navbar-brand" href="#">

        <img alt="Logo" src="images\bug.png" style="width:40px;">

    </a>

    <a class="navbar-brand" href="#">BugMe Issue Tracker</a>



    <div class="sidenav">



        <a href="#"><span class="glyphicon glyphicon-home"></span> Home</a>

        <a href="#services"><span class="glyphicon glyphicon-plus"></span> Add New User</a>

        <a href="#New Issue"><span class="glyphicon glyphicon-plus-sign"></span> New Issue</a>

        <a href="admin_logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a>

    </div>





</nav>

<div class="form-check col-md-6">

    <h1 class="font-weight-bold">New User</h1><br>

    <form method="POST">



        <div class="form-group">

            <label for="first_name">First Name</label>

            <input class="form-control" id="first_name" name="f_name" required type="text">

        </div>

        <div class="form-group">

            <label for="last_name">Last Name</label>

            <input class="form-control" id="last_name" name="l_name" required type="text">

        </div>

        <div class="form-group">

            <label for="email">Email</label>

            <input class="form-control" id="email" name="e_mail" required type="email">

        </div>

        <div class="form-group ">

            <label for="password">Password</label>

            <input class="form-control" id="password" name="p_assword" required type="password">

        </div>

        <input  class="btn btn-primary" name="submit1" type="submit">

       





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



        

        



        if(isset($_POST['submit1']))

        {

            $email = $_POST['e_mail'];

            $sql = "SELECT email FROM users";

            $result = $conn->query($sql);

            $flag = 0;



        if ($result->num_rows > 0) {



            // output data of each row

            echo '<script>alert("Error! User already registered with this email.")</script>';

           

            }

            else

            {

                $first_name = $_POST['f_name'];

                $last_name = $_POST['l_name'];

                $email = $_POST['e_mail'];

                $password = $_POST['p_assword'];

                $uppercase = preg_match('@[A-Z]@', $password);

                $lowercase = preg_match('@[a-z]@', $password);

                $number = preg_match('@[0-9]@', $password);

                if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {

                    echo '<script>alert("Error! .")</script>';

                }

                else{

                    $password = md5($password);

                    $INSERT_QUERY = "INSERT INTO `users`(first_name, last_name, email, password) VALUES ('$first_name','$last_name','$email','$password')";



                    if ($conn->query($INSERT_QUERY) === TRUE) {



                        echo '<script>alert("Success! New user created.")</script>';





                    } else {

                        echo '<script>alert("Error! User not created.")</script>';

                    }

                    $conn->close();

                }

            }

            }



            

        ?>







</body>

</html>



