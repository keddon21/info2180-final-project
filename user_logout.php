<?php
include_once 'database_connection.php';
session_start();
 if(isset($_SESSION["user_email"]))
{
    session_destroy();
    header("Location: user_login.php");
}
?>