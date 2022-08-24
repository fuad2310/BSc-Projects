<html>
    <head>
        <title> CSWAD </title>
        <link rel="stylesheet" href="../style/style.css">
        <script src="../ajax/ajax.js"></script> 
    </head>

    <body bgcolor="#f97921">


    <h1 class="headh1"> CSWAD </h1>
    <p> <i> Chilmari Student Welfare Association-Dhaka </i> </p>
    <button onclick="myFunction()">Change Mode</button>
    

    <br>

    <div class="navbar" id="cswadtopmb">
        <a href="../view/index.php" >Home</a>
        <a href="../view/memshow.php">Member</a>
        <a href="../view/event.php">Event</a>
        <a href="../view/find.php">Find</a>
        <a href="../view/blog.php">Blog</a>
        <a href="#contact">Contact</a>
        <a href="../view/login.php">Login</a>
        <a href="../view/registration.php" class="active" >Registration</a>
        
        </a>
    </div>

   
	 <h1>Member Registration</h1>


	
	<form name="form1" method="post" action="../view/registration.php">
    <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

	<?php if (isset($_GET['updated'])) { ?>
     		<p class="updated"><?php echo $_GET['updated']; ?></p>
     	<?php } ?>
	

		<table border="0" align="center">
		


			<tr> 
				<td>User Name</td>
				<td> : </td>
				<td><input type="text" name="muname"></td>
			</tr>
            <tr> 
				<td>Full Name</td>
				<td> : </td>
				<td><input type="text" name="mname"></td>
			</tr>
			<tr> 
				<td>Date of Birth</td>
				<td> : </td>
				<td><input type="date" name="mdob" ></td>
			</tr>
			<tr> 
				<td>Gender</td>
				<td> : </td>
				<td>
				<select name="mgender">
				<option value="Male"> Male </option> 
				<option value="Female"> Female </option>
				<option value="Other"> Other </option>
				</select>
			
			</td>
			</tr>
			<tr> 
				<td>Blood Group</td>
				<td> : </td>
				<td>
				<select name="mblood">
				<option name="mblood" value="A+"> A+
				<option name="mblood" value="B+"> B+
				<option name="mblood" value="AB+"> AB+
				<option name="mblood" value="A-"> A-
				<option name="mblood" value="B-"> B-
				<option name="mblood" value="AB-"> AB-
				<option name="mblood" value="O+"> O+
				<option name="mblood" value="O-"> O-
				</select>
			
			</td>
			</tr>
			<tr> 
				<td>Email</td>
				<td> : </td>
				<td><input type="email" name="memail" ></td>
			</tr>
			<tr> 
				<td>Mobile</td>
				<td> : </td>
				<td><input type="text" name="mmobile" ></td>
			</tr>
			<tr> 
				<td>Address</td>
				<td> : </td>
				<td><input type="text" name="maddress"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td> : </td>
				<td><input type="text" name="mpassword" ></td>
			</tr>
			<tr>
				<td>  </td>
				<td>  </td>
				<td><input type="submit" name="registration" value="Registration"/>
				<input type="reset" name="reset" value="Reset"/></td>
			</tr>
		</table>
	</form>




    <?php
if(isset($_POST['registration']))
{	
	$mname = $_POST['mname'];
	
	$muname = $_POST['muname'];
	$mmobile = $_POST['mmobile'];
	$maddress = $_POST['maddress'];
	$mpassword = $_POST['mpassword'];
	$mgender = $_POST['mgender'];
	$mblood = $_POST['mblood'];
	$mdob = $_POST['mdob'];
	$memail = $_POST['memail'];

	
	// checking empty fields
	if(empty($mname) ||empty($muname) || empty($mmobile)  || empty($mdob) || empty($mgender) || empty($mblood) || empty($memail) || empty($mpassword)  || empty($maddress)) 
	{
				
		if(empty($muname)) {
			header("Location: ../view/registration.php?error=User name is required");
	    exit();
		}
		if(empty($mname)) {
			header("Location: ../view/registration.php?error=Full name is required");
	    exit();
		}

		if(empty($mdob)) {
			header("Location: ../view/registration.php?error=Date of Birth is required");
	    exit();
		}
		if(empty($mgender)) {
			header("Location: ../view/registration.php?error=Gender is required");
	    exit();
		}
		if(empty($mblood)) {
			header("Location: ../view/registration.php?error=Blood Group is required");
	    exit();
		}
		if(empty($memail)) {
			header("Location: ../view/registration.php?error=Email is required");
	    exit();
		}
		if(empty($mmobile)) {
			header("Location: ../view/registration.php?error=Mobile is required");
	    exit();
		}
		
		if(empty($maddress)) {
			header("Location: ../view/registration.php?error=Address is required");
	    exit();
		}		
		if(empty($mpassword)) {
			header("Location: ../view/registration.php?error=Password is required");
	    exit();
		}	
	} 
	else 
	{	
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "final");
 

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt update query execution
$sql = "INSERT INTO member (muname, mname, mgender, memail, mblood, mdob, mpassword, maddress, mmobile) VALUES ('$muname','$mname','$mgender','$memail','$mblood','$mdob','$mpassword','$maddress','$mmobile')";
if(mysqli_query($link, $sql))
{
    header("Location: ../view/registration.php?updated=Member Registration Successful..!");
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

	}
}
?>



          

          <br><br><br>

    <div class="footer" id="footer">
        <p align="center"> <i> Copyright 2022 by CSWAD. All Rights Reserved.</i><p>
    </div>


    </body>


</html>