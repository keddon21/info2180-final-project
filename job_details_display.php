<?php
    

    /* $statement =$conn->query ("SELECT id FROM issues");
	//$statement->execute();
	$issue = $statement->fetchAll(PDO::FETCH_ASSOC); */
    
    

?>

<!DOCTYPE html>
	 <html>
	 <head>
	  
	 	<title>BugMe Issue Tracker</title>

		<link rel="stylesheet" type="text/css" href="styles/JobDetails.css">
		<link type="text/javascript" href="jobdetails.js">
		<meta name = "author" content = "Selvin Martin">


	</head>
	<body>

	 	<header id="banner">
		<div class="brand">
				
				<strong><img src="bug.jpg" alt="bug_pic" height="35" width = "40"></img>BugMe Issue Tracker</strong>
			</p>
		</div>
		
	</header>
	<div class="grid">
	 	<div class= "SideOptions">
		<ul><strong>
			<li>
				<a href="/Home.php">Home</a>
			</li>
			<li>
				<a href="/addUser.php">Add User</a>
			</li>
			<li>
				<a href="/newIssue.php">New Issue</a>
			</li>
			<li>
				<a src ="logout.php">Logout</a>
			</li></strong>
		</ul>

		</div>
		<div id="center">
			<div class="title">
				<h1> <?php echo$results[0]['title'];?><br> 
				<h4>Issue #<?= $results[0]['id']; ?> </h4></h1>
			</div>

			<div>
				<p> <?php echo $results[0]['description']; ?> </p>
			</div>

			<div>
				<ul>
					<li> 
						<p>Issue created on <?php echo $results[0]['created']; ?> by <?php echo $CN[0]['firstname']; ?>  <?=$CN[0]['lastname'];  ?></p>
					</li>
					<li> 
						<p> Last updated on <?php echo $results[0]['updated']; ?></p>
					</li>
				</ul>
			</div>
		</div>
	  
		<div class ="rightSide">
		 	<fieldset>
			
				<p>Assigned To <br><?php echo $AN[0]['firstname']; ?>  <?=$AN[0]['lastname'];  ?></p>
				<p>Type: <br><?php echo $results[0]['type']; ?></p>
				<p>Priority: <br><?php echo $results[0]['priority']; ?></p>
				<p>Status: <br><?php echo $results[0]['status']; ?></p>
			
			</fieldset>

			<div class="buttons">
				<form action="update_job.php" method="POST">
					<br>	
					<input id="closed"name="action" type="submit" value="Closed"/>

					<br>
					<input id="progress"name="action" type="submit" value="In Progress" />
					<input type="hidden" name="id" value="<?php echo $results[0]['id']; ?>"/>
				</form>
			</div>

		</div>
	   
	</div>

	 
	</body>
	</html>