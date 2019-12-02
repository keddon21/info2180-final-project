
<?php


    $action =  isset($_POST['action'])?$_POST['action']:"";
    $status =  isset($_POST['status'])?$_POST['status']:"";

    
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
	 
       
		$stmt = $conn->prepare("SELECT * FROM issues");
		$stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
		#print_r ($results);}
		if($action == "OPEN"){
            $stmt =$conn->prepare("SELECT * FROM issues WHERE status='Open' ");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
		#print_r ($results);
		//var_dump($results);
		//echo $results[0]['id'];
		   
		#get cretors
		// $createdby=$results[0]['created_by'];
		// $creatorName=$conn->prepare("SELECT firstname, lastname FROM users WHERE id = $createdby");
		// $creatorName->execute();

		// $CN= $creatorName->fetchAll(PDO::FETCH_ASSOC);
		   
		#get assigned_to
		// $assignedto=$row['assigned_to'];
		// $assignName=$conn->prepare("SELECT firstname, lastname FROM users WHERE id = $assignedto");
		// $assignName->execute();

		// $AN= $assignName->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
	 <html>
	 <head>
	  
	 	<title>BugMe Issue Tracker</title>

		<link rel="stylesheet" type="text/css" href="../styles/issues.css">

		<meta name = "author" content = "Selvin Martin">


	</head>
	<body>

	 	<header id="banner">
		<div class="brand">
				
				<strong><i class="fas fa-bug"></i>>BugMe Issue Tracker</strong>
			</p>
		</div>
		
	</header>
	<div class="grid">
	 	<div class= "SideOptions">
		 <nav class = "sidenav">
                <ul class = "sidenav_list">
                    <li class = "sidenav_list"> <a href="#home"><i class="fa fa-fw fa-home"></i> Home</a></li>
                    <li class = "sidenav_list"> <a href="new_user.php"><i class="fas fa-user-plus"></i> Add User </a> </li>
                    <li class = "sidenav_list"> <a href="CreatIssue.html"> <i class="fas fa-plus-circle"></i> New Issue </a> </li>
                    <li class = "sidenav_list"> <i class="fas fa-power-off"></i> Logout </li>
                </ul>

		</div>
		<div id="center">
			<div class="title">
				<h1> Issues </h1><br><br>
			</div>

			<form action="/createIssue.php" method="GET" class="create_issue">
                <button onclick="/newIssue.php">Create Issue</button><br>
            </div>
            
            <div class="filter">
                <p>Filter by:
                    <form action="" method ="POST">
                        <input id="all" type="submit" value="ALL" name="action"/>
                        <input id="open" type="submit" value="OPEN" name="action"/>
                        <input id="my_tickets" type="submit" value="MY TICKETS" name="action"/>
                        <input type="hidden" name="status" value="<?php echo $results[0]['status']; ?>"/>
                </p>

            </div>

            <table class="table">
		    <thead class="head">
			<tr >
				<th >Title</th>
				<th >Type</th>
				<th >Status</th>
                <th >Assigned To</th>
                <th >Created</th>
			</tr>
		</thead>
		<?php foreach ($results as $row): ?>
			<tr class="row">
				<td  >
                    <strong>#<?= $row['id'];?></strong>
                    <a href="full_job_details.php"><?= $row['title']; ?></a>
                </td>
				<td  ><?= $row['type']; ?></td>
				<td  ><?= $row['status']; ?></td>
                <td>
                    <?php
                        $assignedto=$row['assigned_to'];
                        $assignName=$conn->prepare("SELECT firstname, lastname FROM users WHERE id = $assignedto");
                        $assignName->execute();
                        $AN= $assignName->fetchAll(PDO::FETCH_ASSOC);
                        
                        echo $AN[0]['firstname']; echo " "; echo $AN[0]['lastname'];
                       
                     ?>
                </td>
                <td  ><?= $row['created'];?></td>
			</tr>
		<?php endforeach; ?>
	    </table>
		</div>
	  
		


		</div>
	   
	</div>

	 
	</body>
	</html>