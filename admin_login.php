<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" id="bootstrap-css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<?php
include_once 'database_connection.php';
session_start();
 if(isset($_SESSION["admin"]))
{
    header("Location: new_user.php");
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
    <title>Admin Login</title>
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
    <h1 class="font-weight-bold">Admin Login</h1><br>
    <form action="admin_login.php" method="POST">


        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" id="email" name="e_mail" placeholder="Email" required type="email">
        </div>
        <div class="form-group ">
            <label for="password">Password</label>
            <input class="form-control" id="password" name="p_assword" placeholder="Password" required type="password">
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

    $admin_email = $_POST['e_mail'];
    $admin_password = $_POST['p_assword'];
    if ($admin_email == "admin@bugme.com" && $admin_password = "password123") {
        $_SESSION["admin"] = "admin@bugme.com";
       
        
             header("Location: new_user.php");
         }
         else
         {
            echo '<script>alert("Error! Email or Password is incorrect.")</script>';

         }
    } 
    

?>
</body>

</html>
