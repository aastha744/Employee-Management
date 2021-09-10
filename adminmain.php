<?php 
require_once ('loginprocess/dbh.php');
$sql = "SELECT id, firstName, lastName,  points FROM employee, rank WHERE rank.eid = employee.id order by rank.points desc";
$result = mysqli_query($conn, $sql);
?>
<html>
<head>
    <title>Employee Management System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css?v=<?php echo time(); ?>">
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
                                <a class="nav-link active" href="adminmain.php">Home</a>
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
	 
		<h2 style="font-family: 'Montserrat', sans-serif; font-weight:bold;font-size: 25px; text-align: center;margin:50px;">Employee List </h2>
    	<table>

			<tr>
				<th align = "center">SN</th>
				<th align = "center">Emp. ID</th>
				<th align = "center">Name</th>
				<th align = "center">Points</th>
				

			</tr>

			
			<?php
				$seq = 1;
				while ($employee = mysqli_fetch_assoc($result)){
					echo "<tr>";
					echo "<td>".$seq."</td>";
					echo "<td>".$employee['id']."</td>";
					
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
					
					echo "<td>".$employee['points']."</td>";
					
					$seq+=1;
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
		
	</div>
</body>
</html>