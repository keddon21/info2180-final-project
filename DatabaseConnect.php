<?php


    $host = "localhost";
    $db_name = "bugme_issue_tracker";
    $username = "root";
    $password = "";
    $conn;
    
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
   
   ?>