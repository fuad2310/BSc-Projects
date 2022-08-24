<?php 
session_start();

if (isset($_SESSION['oid']) && isset($_SESSION['ouname'])) {
	$sessionId = $_SESSION["oid"];
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
        <a href="../control/outpro.php"  class="active"><?php echo $_SESSION['oname']; ?>, Logout</a>
    </div>

     <h2>Hello, <?php echo $_SESSION['oname']; ?></h2> <a href="../view/organizer.php"> Back To Profile </a>
	 <h1>.</h1>


	<?php
include('../connection/db_conn.php');

     $oname = $_SESSION['oname'];


$query = "SELECT * FROM organizer WHERE oname='$oname' ";
$result = $conn->query($query);
?>
	<form name="form1" method="post" action="../view/oredit.php">

	<h2>Update <br> <?php echo $_SESSION['oname']; ?>'s <br>  Profile</h2>
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
				<td><input type="text" name="ouname" value=<?php echo $row['ouname']; ?>></td>
			</tr>
			<tr> 
				<td>Date of Birth</td>
				<td> : </td>
				<td><input type="date" name="odob" value=<?php echo $row['odob']; ?>></td>
			</tr>
			<tr> 
				<td>Gender</td>
				<td> : </td>
				<td>
				<select name="ogender">
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
				<select name="oblood">
				<option name="oblood" value="A+"> A+
				<option name="oblood" value="B+"> B+
				<option name="oblood" value="AB+"> AB+
				<option name="oblood" value="A-"> A-
				<option name="oblood" value="B-"> B-
				<option name="oblood" value="AB-"> AB-
				<option name="oblood" value="O+"> O+
				<option name="oblood" value="O-"> O-
				</select>
			
			</td>
			</tr>


			<tr> 
				<td>NID No.</td>
				<td> : </td>
				<td><input type="text" name="NIDNo" value=<?php echo $row['NIDNo']; ?>></td>
			</tr>


			<tr> 
				<td>Email</td>
				<td> : </td>
				<td><input type="email" name="oemail" value=<?php echo $row['oemail']; ?>></td>
			</tr>
			<tr> 
				<td>Mobile</td>
				<td> : </td>
				<td><input type="text" name="omobile" value=<?php echo $row['omobile']; ?>></td>
			</tr>
			<tr> 
				<td>Address</td>
				<td> : </td>
				<td><input type="text" name="oaddress" value=<?php echo $row['oaddress']; ?>></td>
			</tr>
			<tr> 
				<td>Pssword</td>
				<td> : </td>
				<td><input type="text" name="opass" value=<?php echo $row['opass']; ?>></td>
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




        $oid = $_SESSION["oid"];
        $oname = $_SESSION["oname"];

include('../connection/db_conn.php');



$query = "SELECT * FROM organizer WHERE oname='$oname' ";
$result = $conn->query($query);

 if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)) { ?>
<?php

        $ophoto = $row['ophoto'];
        ?>

        <img src="../image/<?php echo $ophoto; ?>" align="center" width = 125 height = 125 title="<?php echo $ophoto; ?>">
        <div class="round">
          <input type="hidden" name="oid" value="<?php echo $oid; ?>">
          <input type="hidden" name="oname" value="<?php echo $oname; ?>">
          <input type="file" name="ophoto" id = "photo" accept=".jpg, .jpeg, .png">
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
    if(isset($_FILES["ophoto"]["name"])){
      $oid = $_POST["oid"];
      $oname = $_POST["oname"];

      $imageName = $_FILES["ophoto"]["name"];
      $imageSize = $_FILES["ophoto"]["size"];
      $tmpName = $_FILES["ophoto"]["tmp_name"];

      // Image validation
      $validImageExtension = ['jpg', 'jpeg', 'png'];
      $imageExtension = explode('.', $imageName);
      $imageExtension = strtolower(end($imageExtension));
      if (!in_array($imageExtension, $validImageExtension)){
        echo
        "
        <script>
          alert('Invalid Image Extension');
          document.location.href = '../view/oredit.php';
        </script>
        ";
      }
      elseif ($imageSize > 1200000){
        echo
        "
        <script>
          alert('Image Size Is Too Large');
          document.location.href = '../view/oredit.php';
        </script>
        ";
      }
      else{
        $newImageName = $oname . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
        $newImageName .= '.' . $imageExtension;
        $query = "UPDATE organizer SET ophoto = '$newImageName' WHERE oname = '$_SESSION[oname]'";
        mysqli_query($conn, $query);
        move_uploaded_file($tmpName, '../image/' . $newImageName);
        echo
        "
        <script>
        document.location.href = '../view/oredit.php';
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
	$oname = $_SESSION['oname'];
	
	$ouname = $_POST['ouname'];
	$omobile = $_POST['omobile'];
	$oaddress = $_POST['oaddress'];
	$opass = $_POST['opass'];
	$ogender = $_POST['ogender'];
	$oblood = $_POST['oblood'];
	$odob = $_POST['odob'];
	$oemail = $_POST['oemail'];
	$NIDNo = $_POST['NIDNo'];

	
	// checking empty fields
	if(empty($ouname) || empty($omobile)  || empty($odob) || empty($ogender) || empty($oblood) || empty($oemail) || empty($opass)  || empty($oaddress) || empty($NIDNo) )
	{
				
		if(empty($ouname)) {
			header("Location: ../view/oredit.php?error=User Name is required");
	    exit();
		}
		
		if(empty($odob)) {
			header("Location: ../view/oredit.php?error=Dae of Birth is required");
	    exit();
		}
		if(empty($ogender)) {
			header("Location: ../view/oredit.php?error=Gender is required");
	    exit();
		}
		if(empty($oblood)) {
			header("Location: ../view/oredit.php?error=Blood Group is required");
	    exit();
		}
		if(empty($oemail)) {
			header("Location: ../view/oredit.php?error=Email is required");
	    exit();
		}
		if(empty($omobile)) {
			header("Location: ../view/oredit.php?error=Mobile is required");
	    exit();
		}

		if(empty($NIDNo)) {
			header("Location: ../view/oredit.php?error=NID is required");
	    exit();
		}

		
		if(empty($oaddress)) {
			header("Location: ../view/oredit.php?error=Address is required");
	    exit();
		}		
		if(empty($opass)) {
			header("Location: ../view/oredit.php?error=Password is required");
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
$sql = "UPDATE organizer SET ouname='$_POST[ouname]',ogender='$_POST[ogender]',oemail='$_POST[oemail]',oblood='$_POST[oblood]',opass='$_POST[opass]',odob='$_POST[odob]', omobile='$_POST[omobile]', NIDNo='$_POST[NIDNo]', oaddress='$_POST[oaddress]' WHERE oname='$_SESSION[oname]'";
if(mysqli_query($link, $sql))
{
    header("Location: ../view/oredit.php?updated=Record Updated..!");
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
	$oname = $_SESSION['oname'];
	
 
// Attempt delete query execution
$sql2 = "DELETE From organizer WHERE oname='$_SESSION[oname]'";
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

$oname = $_SESSION['oname'];

if(isset($_POST['imageupdate']))
{	
	
	
	
	// checking empty fields
	if(empty($ophoto)) {
				
		if(empty($ophoto)) {
			echo "<font color='red'>photo file is empty.</font><br/>";
		}	
	} 
	else {
		$filename = $_FILES["ophoto"]["name"];
	$tempname = $_FILES["ophoto"]["tmp_name"];
	$folder = "../image/" . $filename;	

$link = mysqli_connect("localhost", "root", "", "final");
 

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt update query execution
$sql = "UPDATE organizer SET ophoto='$_POST[ophoto]' WHERE ouname='$_SESSION[ouname]'";
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



