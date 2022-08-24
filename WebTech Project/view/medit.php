<?php 
session_start();

if (isset($_SESSION['mid']) && isset($_SESSION['muname'])) {
	$sessionId = $_SESSION["mid"];
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
        <a href="../control/outpro.php"  class="active"><?php echo $_SESSION['mname']; ?>, Logout</a>
    </div>

     <h2>Hello, <?php echo $_SESSION['mname']; ?></h2> <a href="../view/organizer.php"> Back To Profile </a>
	 <h1>.</h1>


	<?php
include('../connection/db_conn.php');

     $mname = $_SESSION['mname'];


$query = "SELECT * FROM member WHERE mname='$mname' ";
$result = $conn->query($query);
?>
	<form name="form1" method="post" action="../view/oredit.php">

	<h2>Update <br> <?php echo $_SESSION['mname']; ?>'s <br>  Profile</h2>
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
				<td><input type="text" name="muname" value=<?php echo $row['muname']; ?>></td>
			</tr>
			<tr> 
				<td>Date of Birth</td>
				<td> : </td>
				<td><input type="date" name="mdob" value=<?php echo $row['mdob']; ?>></td>
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
				<td><input type="email" name="memail" value=<?php echo $row['memail']; ?>></td>
			</tr>
			<tr> 
				<td>Mobile</td>
				<td> : </td>
				<td><input type="text" name="mmobile" value=<?php echo $row['mmobile']; ?>></td>
			</tr>
			<tr> 
				<td>Address</td>
				<td> : </td>
				<td><input type="text" name="maddress" value=<?php echo $row['maddress']; ?>></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td> : </td>
				<td><input type="text" name="mpass" value=<?php echo $row['mpassword']; ?>></td>
			</tr>

			


			<tr>
				<td>  </td>
				<td>  </td>
				<td><input type="submit" name="update" value="Update"/>
				<input type="submit" name="delete" value="Delete Member"/></td>
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




        $mid = $_SESSION["mid"];
        $mname = $_SESSION["mname"];

include('../connection/db_conn.php');



$query = "SELECT * FROM member WHERE mname='$mname' ";
$result = $conn->query($query);

 if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)) { ?>
<?php

        $mphoto = $row['mphoto'];
        ?>

        <img src="../image/<?php echo $mphoto; ?>" align="center" width = 125 height = 125 title="<?php echo $mphoto; ?>">
        <div class="round">
          <input type="hidden" name="mid" value="<?php echo $mid; ?>">
          <input type="hidden" name="mname" value="<?php echo $mname; ?>">
          <input type="file" name="mphoto" id = "photo" accept=".jpg, .jpeg, .png">
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
    if(isset($_FILES["mphoto"]["name"])){
      $oid = $_POST["mid"];
      $oname = $_POST["mname"];

      $imageName = $_FILES["mphoto"]["name"];
      $imageSize = $_FILES["mphoto"]["size"];
      $tmpName = $_FILES["mphoto"]["tmp_name"];

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
        $query = "UPDATE member SET mphoto = '$newImageName' WHERE mname = '$_SESSION[mname]'";
        mysqli_query($conn, $query);
        move_uploaded_file($tmpName, '../image/' . $newImageName);
        echo
        "
        <script>
        document.location.href = '../view/medit.php';
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
	$oname = $_SESSION['mname'];
	
	$ouname = $_POST['muname'];
	$omobile = $_POST['mmobile'];
	$oaddress = $_POST['maddress'];
	$opass = $_POST['mpass'];
	$ogender = $_POST['mgender'];
	$oblood = $_POST['mblood'];
	$odob = $_POST['mdob'];
	$oemail = $_POST['memail'];
	
	
	
	if(empty($muname) || empty($mmobile)  || empty($mdob) || empty($mgender) || empty($mblood) || empty($memail) || empty($mpass)  || empty($maddress) )
	{
				
		if(empty($muname)) {
			header("Location: ../view/medit.php?error=User Name is required");
	    exit();
		}
		
		if(empty($mdob)) {
			header("Location: ../view/medit.php?error=Dae of Birth is required");
	    exit();
		}
		if(empty($mgender)) {
			header("Location: ../view/medit.php?error=Gender is required");
	    exit();
		}
		if(empty($mblood)) {
			header("Location: ../view/medit.php?error=Blood Group is required");
	    exit();
		}
		if(empty($memail)) {
			header("Location: ../view/medit.php?error=Email is required");
	    exit();
		}
		if(empty($mmobile)) {
			header("Location: ../view/medit.php?error=Mobile is required");
	    exit();
		}
		if(empty($maddress)) {
			header("Location: ../view/oredit.php?error=Address is required");
	    exit();
		}		
		if(empty($mpass)) {
			header("Location: ../view/oredit.php?error=Password is required");
	    exit();
		}	
	} 
	else 
	{	

$link = mysqli_connect("localhost", "root", "", "final");
 

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt update query execution
$sql = "UPDATE member SET muname='$_POST[muname]',mgender='$_POST[mgender]',memail='$_POST[memail]',mblood='$_POST[mblood]',mpass='$_POST[mpass]',mdob='$_POST[mdob]', mmobile='$_POST[mmobile]', maddress='$_POST[maddress]' WHERE mname='$_SESSION[mname]'";
if(mysqli_query($link, $sql))
{
    header("Location: ../view/medit.php?updated=Record Updated..!");
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
	$mname = $_SESSION['mname'];
	
 
// Attempt delete query execution
$sql2 = "DELETE From member WHERE mname='$_SESSION[mname]'";
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

$mname = $_SESSION['mname'];

if(isset($_POST['imageupdate']))
{	
	
	
	
	// checking empty fields
	if(empty($mphoto)) {
				
		if(empty($mphoto)) {
			echo "<font color='red'>photo file is empty.</font><br/>";
		}	
	} 
	else {
		$filename = $_FILES["mphoto"]["name"];
	$tempname = $_FILES["mphoto"]["tmp_name"];
	$folder = "../image/" . $filename;	

$link = mysqli_connect("localhost", "root", "", "final");
 

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt update query execution
$sql = "UPDATE member SET mphoto='$_POST[mphoto]' WHERE muname='$_SESSION[muname]'";
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



