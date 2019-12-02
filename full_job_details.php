<?php

	

	//my local server
	$host = "localhost";
	$username ="root";
	$dbname= "bugme_issue_tracker";
	$password="";

	
	 try {

		 
		 $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	   } catch (Exception $e) {
		 error_log($e->getMessage());
		 exit('Something weird happened'); //something a user can understand
	   } 
	 
	//$title = isset("SELECT title FROM issues");

	// $statement =$conn->query("SELECT * FROM issues");
	// $statement->execute();
	// $issue = $statement->fetchAll(PDO::FETCH_ASSOC);
	// var_dump($issue);
	
	// echo $issue["id"];
	//$title = isset($issue['title'])?$issue['title']:"";
		
	
	
		$stmt = $conn->prepare("SELECT * FROM issues");
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		#print_r ($results);
		
		
		
		$newstmt =$conn->prepare("SELECT * FROM Issues");
		$newstmt->execute();
		
		$results = $newstmt->fetchAll(PDO::FETCH_ASSOC);
		#print_r ($results);
		//var_dump($results);
		//echo $results[0]['id'];
		   
		#get cretors
		$createdby=$results[0]['created_by'];
		$creatorName=$conn->prepare("SELECT firstname, lastname FROM users WHERE id = $createdby");
		$creatorName->execute();

		$CN= $creatorName->fetchAll(PDO::FETCH_ASSOC);
		   
		#get assigned_to
		$assignedto=$results[0]['assigned_to'];
		$assignName=$conn->prepare("SELECT firstname, lastname FROM users WHERE id = $assignedto");
		$assignName->execute();

		$AN= $assignName->fetchAll(PDO::FETCH_ASSOC);

	//add the webpage layout
	require 'job_details_display.php';
	?>




