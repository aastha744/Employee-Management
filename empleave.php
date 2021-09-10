<?php

require_once ('loginprocess/dbh.php');

//$sql = "SELECT * from `employee_leave`";
$sql = "SELECT employee.id, employee.firstName, employee.lastName, employee_leave.start, employee_leave.end, employee_leave.reason, employee_leave.status, employee_leave.token from employee, employee_leave
 where employee.id = employee_leave.id order by employee_leave.token";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>



<html>
<head>
	<title>Employee Leave</title>
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

	 
	<div class="divider"></div>
	<div id="divimg">
		<table>
			<tr>
				<th>Emp. ID</th>
				<th>Token</th>
				<th>Name</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Total Days</th>
				<th>Reason</th>
				<th>Status</th>
				<th>Options</th>
			</tr>

			<?php
				while ($employee = mysqli_fetch_assoc($result)) {

				$date1 = new DateTime($employee['start']);
				$date2 = new DateTime($employee['end']);
				$interval = $date1->diff($date2);
				$interval = $date1->diff($date2);
				//echo "difference " . $interval->days . " days ";

					echo "<tr>";
					echo "<td>".$employee['id']."</td>";
					echo "<td>".$employee['token']."</td>";
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
					
					echo "<td>".$employee['start']."</td>";
					echo "<td>".$employee['end']."</td>";
					echo "<td>".$interval->days."</td>";
					echo "<td>".$employee['reason']."</td>";
					echo "<td>".$employee['status']."</td>";
					echo "<td><a href=\"approve.php?id=$employee[id]&token=$employee[token]\"  onClick=\"return confirm('Are you sure you want to Approve the request?')\">Approve</a> | <a href=\"cancel.php?id=$employee[id]&token=$employee[token]\" onClick=\"return confirm('Are you sure you want to Canel the request?')\">Cancel</a></td>";

				}


			?>

		</table>
		
    </div>
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