<?php

require_once ('loginprocess/dbh.php');
$sql = "SELECT * FROM `employee` WHERE 1";

$result = mysqli_query($conn, $sql);
if(isset($_POST['update']))
{

	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$firstname = mysqli_real_escape_string($conn, $_POST['firstName']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lastName']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$contact = mysqli_real_escape_string($conn, $_POST['contact']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);
	$nid = mysqli_real_escape_string($conn, $_POST['nid']);
	$dept = mysqli_real_escape_string($conn, $_POST['dept']);
	$degree = mysqli_real_escape_string($conn, $_POST['degree']);






	


$result = mysqli_query($conn, "UPDATE `employee` SET `firstName`='$firstname',`lastName`='$lastname',`email`='$email',`gender`='$gender',`contact`='$contact',`nid`='$nid',`address`='$address',`dept`='$dept',`degree`='$degree' WHERE id=$id");
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated')
    window.location.href='viewemp.php';
    </SCRIPT>");


	
}
?>




<?php
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	$sql = "SELECT * from `employee` WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	if($result){
	while($res = mysqli_fetch_assoc($result)){
	$firstname = $res['firstName'];
	$lastname = $res['lastName'];
	$email = $res['email'];
	$contact = $res['contact'];
	$address = $res['address'];
	$gender = $res['gender'];
	$nid = $res['nid'];
	$dept = $res['dept'];
	$degree = $res['degree'];
	
}
}

?>

<html>
<head>
    <title>View Employee |  Admin Panel | imployd</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
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
                                <a class="nav-link" href="index.html">Log Out</a>
                            </li>
                        </ul>
					</div>
		</div>
    </nav></header>
	
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Update Employee Info</h2>
                    <form id = "registration" action="edit.php" method="POST">


        <div class="input-group">
             <input class="input--style-1" type="text" name="firstName" value="<?php echo $firstname;?>" >
        </div>

        <div class="input-group">
            <input class="input--style-1" type="text" name="lastName" value="<?php echo $lastname;?>">
        </div>
    






<div class="input-group">
    <input class="input--style-1" type="email"  name="email" value="<?php echo $email;?>">
</div>

    
        <div class="input-group">
            <input class="input--style-1" type="text" name="gender" value="<?php echo $gender;?>">
        </div>
    


<div class="input-group">
    <input class="input--style-1" type="number" name="contact" value="<?php echo $contact;?>">
</div>

<div class="input-group">
    <input class="input--style-1" type="number" name="nid" value="<?php echo $nid;?>">
</div>


 <div class="input-group">
    <input class="input--style-1" type="text"  name="address" value="<?php echo $address;?>">
</div>

<div class="input-group">
    <input class="input--style-1" type="text" name="dept" value="<?php echo $dept;?>">
</div>

<div class="input-group">
    <input class="input--style-1" type="text" name="degree" value="<?php echo $degree;?>">
</div>
<input type="hidden" name="id" id="textField" value="<?php echo $id;?>" required="required"><br><br>
<div class="p-t-20">
    <button class="btn btn--radius btn--green" type="submit" name="update">Submit</button>
</div>

</form>
</div>
</div>
</div>
</div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
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
