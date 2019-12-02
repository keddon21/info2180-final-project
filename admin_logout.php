<?php
include_once 'database_connection.php';
session_start();
 if(isset($_SESSION["admin"]))
{
    session_destroy();
    header("Location: admin_login.php");
}
?>