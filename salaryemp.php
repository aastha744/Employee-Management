<?php

require_once ('loginprocess/dbh.php');
$sql = "SELECT employee.id,employee.firstName,employee.lastName,salary.base,salary.bonus,salary.total from employee,`salary`
 where employee.id=salary.id";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>



<html>
<head>
	<title>Salary Table</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Main CSS-->
    <link media="all" rel="stylesheet" href="css/styleview.css?v=<?php echo time(); ?>">
</head>
<body>
	
<header>
    <div class="top-bar">
        <div class="container">
            <div class="col-12 text-right">
                <p><a href="#">Call us at:+01 5578754</a></p>
            </div>
        </div>
    </div>
	<!-- Navigation -->
    <nav class="navbar bg-light navbar-light navbar-expand-lg">
        <div class="container">
			<a href="index.html" class="navbar-brand"><i
				class="far fa-building p-0 mr-2 ml-3"></i>imployd</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarResponsive">
						<ul class="navbar-nav ml-auto text-center">
                            <li class="nav-item">
                                <a class="nav-link" href="adminmain.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="addemp.php">Add Employee</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="viewemp.php">View Employee</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="salaryemp.php">Salary</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="empleave.php">Employee Leave</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Log Out</a>
                            </li>
                        </ul>
					</div>
		</div>
    </nav></header>
    

	
	<table>
			<tr>
				<th align = "center">Emp. ID</th>
				<th align = "center">Name</th>
				
				
				<th align = "center">Base Salary</th>
				<th align = "center">Bonus</th>
				<th align = "center">TotalSalary</th>
				
				
			</tr>
			
			<?php
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$employee['id']."</td>";
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
					
					echo "<td>".$employee['base']."</td>";
					echo "<td>".$employee['bonus']." %</td>";
					echo "<td>".$employee['total']."</td>";
					
					

				}


			?>
			
            </table>
              <!-- jQuery -->
	<script src="js/jquery-3.5.1.min.js"></script>
	<!-- Bootstrap 4.5 JS -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Popper JS -->
	<script src="js/popper.min.js"></script>
	<!-- Font Awesome -->
	<script src="js/all.min.js"></script>
	<script src="./node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
	<script src="./node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>
</body>
</html>