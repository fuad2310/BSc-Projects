<?php
if(isset($_POST['update']))
{	
	$name = $_SESSION['name'];
	
	$user_name = $_POST['user_name'];
	$mobile = $_POST['mobile'];
	$address = $_POST['address'];
	$password = $_POST['password'];
	$gender = $_POST['gender'];
	$blood = $_POST['blood'];
	$dob = $_POST['dob'];
	$email = $_POST['email'];

	
	// checking empty fields
	if(empty($user_name) || empty($mobile)  || empty($dob) || empty($gender) || empty($blood) || empty($email) || empty($password)  || empty($address)) 
	{
				
		if(empty($user_name)) {
			header("Location: ../view/edit.php?error=User Name is required");
	    exit();
		}
		
		if(empty($dob)) {
			header("Location: ../view/edit.php?error=Dae of Birth is required");
	    exit();
		}
		if(empty($gender)) {
			header("Location: ../view/edit.php?error=Gender is required");
	    exit();
		}
		if(empty($blood)) {
			header("Location: ../view/edit.php?error=Blood Group is required");
	    exit();
		}
		if(empty($email)) {
			header("Location: ../view/edit.php?error=Email is required");
	    exit();
		}
		if(empty($mobile)) {
			header("Location: ../view/edit.php?error=Mobile is required");
	    exit();
		}
		
		if(empty($address)) {
			header("Location: ../view/edit.php?error=Address is required");
	    exit();
		}		
		if(empty($password)) {
			header("Location: ../view/edit.php?error=Password is required");
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
$sql = "UPDATE users SET user_name='$_POST[user_name]',gender='$_POST[gender]',email='$_POST[email]',blood='$_POST[blood]',password='$_POST[password]',dob='$_POST[dob]', mobile='$_POST[mobile]', address='$_POST[address]' WHERE name='$_SESSION[name]'";
if(mysqli_query($link, $sql))
{
    header("Location: ../view/edit.php?updated=Record Updated..!");
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

	}
}
?>