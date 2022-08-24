<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
	$sessionId = $_SESSION["id"];
?>


<html>
<head>
        <title> Edit Data </title>
        <link rel="stylesheet" href="../style/style.css">
		<script src="../ajax/ajax.js"></script> 
    </head>

    <body>


    <h1 class="headh1"> CSWAD </h1>
    <p> <i> Chilmari Student Welfare Association-Dhaka </i> </p>
	<button onclick="myFunction()">Change Mode</button>
    

    <br>

    <div class="navbar" id="cswadtopmb">
        <a href="../view/index.php">Home</a>
        <a href="../view/memshow.php">Member</a>
        <a href="../view/event.php">Event</a>
        <a href="../view/find.php">Find</a>
        <a href="../view/blog.php">Blog</a>
        <a href="#contact">Contact</a>
        <a href="../control/outpro.php"  class="active"><?php echo $_SESSION['name']; ?>, Logout</a>
    </div>

     <h2>Hello, <?php echo $_SESSION['name']; ?></h2> <a href="../view/logout.php"> Back To Profile </a>
	 <h1>.</h1>


	<?php
include('../connection/db_conn.php');

     $name = $_SESSION['name'];


$query = "SELECT * FROM users WHERE name='$name' ";
$result = $conn->query($query);
?>
	<form name="form1" method="post" action="../view/edit.php">

	<h2>Update <br> <?php echo $_SESSION['name']; ?>'s <br>  Profile</h2>
	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

	<?php if (isset($_GET['updated'])) { ?>
     		<p class="updated"><?php echo $_GET['updated']; ?></p>
     	<?php } ?>

		<table border="0" align="center">
		<?php
 if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)) { ?>


			<tr> 
				<td>User Name</td>
				<td> : </td>
				<td><input type="text" name="user_name" value=<?php echo $row['user_name']; ?>></td>
			</tr>
			<tr> 
				<td>Date of Birth</td>
				<td> : </td>
				<td><input type="date" name="dob" value=<?php echo $row['dob']; ?>></td>
			</tr>
			<tr> 
				<td>Gender</td>
				<td> : </td>
				<td>
				<select name="gender">
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
				<select name="blood">
				<option name="blood" value="A+"> A+
				<option name="blood" value="B+"> B+
				<option name="blood" value="AB+"> AB+
				<option name="blood" value="A-"> A-
				<option name="blood" value="B-"> B-
				<option name="blood" value="AB-"> AB-
				<option name="blood" value="O+"> O+
				<option name="blood" value="O-"> O-
				</select>
			
			</td>
			</tr>
			<tr> 
				<td>Email</td>
				<td> : </td>
				<td><input type="email" name="email" value=<?php echo $row['email']; ?>></td>
			</tr>
			<tr> 
				<td>Mobile</td>
				<td> : </td>
				<td><input type="text" name="mobile" value=<?php echo $row['mobile']; ?>></td>
			</tr>
			<tr> 
				<td>Address</td>
				<td> : </td>
				<td><input type="text" name="address" value=<?php echo $row['address']; ?>></td>
			</tr>
			<tr> 
				<td>Pssword</td>
				<td> : </td>
				<td><input type="text" name="password" value=<?php echo $row['password']; ?>></td>
			</tr>
			<tr>
				<td>  </td>
				<td>  </td>
				<td><input type="submit" name="update" value="Update"/>
				<input type="submit" name="delete" value="Delete Profile"/></td>
			</tr>
		</table>
	</form>

	<?php
}
} else {
  echo "0 results";
}
?>





































	<form class="form" id = "form" action="" enctype="multipart/form-data" method="post">
      <div class="upload">
        <?php




        $id = $_SESSION["id"];
        $name = $_SESSION["name"];

include('../connection/db_conn.php');



$query = "SELECT * FROM users WHERE name='$name' ";
$result = $conn->query($query);

 if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)) { ?>
<?php

        $photo = $row['photo'];
        ?>

        <img src="../image/<?php echo $photo; ?>" align="center" width = 125 height = 125 title="<?php echo $photo; ?>">
        <div class="round">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="hidden" name="name" value="<?php echo $name; ?>">
          <input type="file" name="photo" id = "photo" accept=".jpg, .jpeg, .png">
        </div>
      </div>
    </form>

	<script src="../js/js.js"></script> 
	

<?php
}
} else {
  echo "0 results";
}
?>

    <?php
    if(isset($_FILES["photo"]["name"])){
      $id = $_POST["id"];
      $name = $_POST["name"];

      $imageName = $_FILES["photo"]["name"];
      $imageSize = $_FILES["photo"]["size"];
      $tmpName = $_FILES["photo"]["tmp_name"];

      // Image validation
      $validImageExtension = ['jpg', 'jpeg', 'png'];
      $imageExtension = explode('.', $imageName);
      $imageExtension = strtolower(end($imageExtension));
      if (!in_array($imageExtension, $validImageExtension)){
        echo
        "
        <script>
          alert('Invalid Image Extension');
          document.location.href = '../view/edit.php';
        </script>
        ";
      }
      elseif ($imageSize > 1200000){
        echo
        "
        <script>
          alert('Image Size Is Too Large');
          document.location.href = '../view/edit.php';
        </script>
        ";
      }
      else{
        $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
        $newImageName .= '.' . $imageExtension;
        $query = "UPDATE users SET photo = '$newImageName' WHERE name = '$_SESSION[name]'";
        mysqli_query($conn, $query);
        move_uploaded_file($tmpName, '../image/' . $newImageName);
        echo
        "
        <script>
        document.location.href = '../view/edit.php';
        </script>
        ";
      }
    }
    ?>
































<h1>.</h1>
     <a href="../control/outpro.php">Logout</a>
     <h1>.</h1>
     <div class="footer" id="footer">
        <p align="center"> <i> Copyright 2022 by CSWAD. All Rights Reserved.</i></p>
    </div>


</body>
</html>

<?php 
}else{
     header("Location: ../view/login.php");
     exit();
}
 ?>
















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





<?php

$link = mysqli_connect("localhost", "root", "", "final");

if(isset($_POST['delete']))
{	
	$name = $_SESSION['name'];
	
 
// Attempt delete query execution
$sql2 = "DELETE From users WHERE name='$_SESSION[name]'";
if(mysqli_query($link, $sql2))
{
	header("Location: ../control/outpro.php?error=Profile Deleted..!");

} else 
{
    echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

	
}
?>



















<?php

$name = $_SESSION['name'];

if(isset($_POST['imageupdate']))
{	
	
	
	
	// checking empty fields
	if(empty($photo)) {
				
		if(empty($photo)) {
			echo "<font color='red'>photo file is empty.</font><br/>";
		}	
	} 
	else {
		$filename = $_FILES["photo"]["name"];
	$tempname = $_FILES["photo"]["tmp_name"];
	$folder = "../image/" . $filename;	

$link = mysqli_connect("localhost", "root", "", "final");
 

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt update query execution
$sql = "UPDATE users SET photo='$_POST[user_name]' WHERE user_name='$_SESSION[user_name]'";
if(mysqli_query($link, $sql)){
    echo "photo updated successfully.";
} else {
    echo "ERROR: Could not update photo";
}
 
// Close connection
mysqli_close($link);

	}
}
?>



