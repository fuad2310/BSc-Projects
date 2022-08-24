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
        <a href="../view/event.php" class="active">Event</a>
        <a href="../view/find.php">Find</a>
        <a href="../view/blog.php" >Blog</a>
        <a href="#contact">Contact</a>
        <a href="../view/login.php">Login</a>
        <a href="../view/registration.php">Registration</a>
        
        </a>
    </div>









          <h1>Guest Login</h1>

          <form class="form1" method="post" action="../view/event.php">
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
				<td><input type="text" name="guname"></td>
			</tr>
            <tr> 
				<td>Full Name</td>
				<td> : </td>
				<td><input type="text" name="gname"></td>
			</tr>
			<tr> 
				<td>Date of Birth</td>
				<td> : </td>
				<td><input type="date" name="gdob" ></td>
			</tr>
			<tr> 
				<td>Gender</td>
				<td> : </td>
				<td>
				<select name="ggender">
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
				<select name="gblood">
				<option name="gblood" value="A+"> A+
				<option name="gblood" value="B+"> B+
				<option name="gblood" value="AB+"> AB+
				<option name="gblood" value="A-"> A-
				<option name="gblood" value="B-"> B-
				<option name="gblood" value="AB-"> AB-
				<option name="gblood" value="O+"> O+
				<option name="gblood" value="O-"> O-
				</select>
			
			</td>
			</tr>
			<tr> 
				<td>Email</td>
				<td> : </td>
				<td><input type="email" name="gemail" ></td>
			</tr>
			<tr> 
				<td>Mobile</td>
				<td> : </td>
				<td><input type="text" name="gmobile" ></td>
			</tr>
			<tr> 
				<td>Address</td>
				<td> : </td>
				<td><input type="text" name="gaddress"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td> : </td>
				<td><input type="text" name="gpassword" ></td>
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
	$gname = $_POST['gname'];
	
	$guname = $_POST['guname'];
	$gmobile = $_POST['gmobile'];
	$gaddress = $_POST['gaddress'];
	$gpassword = $_POST['gpassword'];
	$ggender = $_POST['ggender'];
	$gblood = $_POST['gblood'];
	$gdob = $_POST['gdob'];
	$gemail = $_POST['gemail'];

	
	// checking empty fields
	if(empty($gname) ||empty($guname) || empty($gmobile)  || empty($gdob) || empty($ggender) || empty($gblood) || empty($gemail) || empty($gpassword)  || empty($gaddress)) 
	{
				
		if(empty($guname)) {
			header("Location: ../view/event.php?error=User name is required");
	    exit();
		}
		if(empty($gname)) {
			header("Location: ../view/event.php?error=Full name is required");
	    exit();
		}

		if(empty($gdob)) {
			header("Location: ../view/event.php?error=Date of Birth is required");
	    exit();
		}
		if(empty($ggender)) {
			header("Location: ../view/event.php?error=Gender is required");
	    exit();
		}
		if(empty($gblood)) {
			header("Location: ../view/event.php?error=Blood Group is required");
	    exit();
		}
		if(empty($gemail)) {
			header("Location: ../view/event.php?error=Email is required");
	    exit();
		}
		if(empty($gmobile)) {
			header("Location: ../view/event.php?error=Mobile is required");
	    exit();
		}
		
		if(empty($gaddress)) {
			header("Location: ../view/event.php?error=Address is required");
	    exit();
		}		
		if(empty($gpassword)) {
			header("Location: ../view/event.php?error=Password is required");
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
$sql = "INSERT INTO guest (guname, gname, ggender, gemail, gblood, gdob, gpassword, gaddress, gmobile) VALUES ('$guname','$gname','$ggender','$gemail','$gblood','$gdob','$gpassword','$gaddress','$gmobile')";
if(mysqli_query($link, $sql))
{
    header("Location: ../view/event.php?updated=Guest Registration Successful..!");
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

	}
}
?>













<h1>.</h1>














<br><br><br>

<div class="footer" id="footer">
    <p align="center"> <i> Copyright 2022 by CSWAD. All Rights Reserved.</i><p>
</div>


</body>


</html>
