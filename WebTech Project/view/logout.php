<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>


<html>
    <head>
        <title> CSWAD </title>
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

     <h2>Hello, <?php echo $_SESSION['name']; ?></h2>

     


     <?php
include('../connection/db_conn.php');

     $name = $_SESSION['name'];


$query = "SELECT * FROM users WHERE name='$name' ";
$result = $conn->query($query);
?>



<form>

<table border="0" cellspacing="0" cellpadding="10" align="center">
<?php
 if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <th></th>
    
    <td></td>
    <td><img src="../image/<?php echo $row['photo']; ?>" align="center" width = 125 height = 125 title="<?php echo $row['photo']; ?>"> </td>
 </tr>
     
 <tr>
    <th>User Name</th>
    
    <td> : </td>
    <td><?php echo $row['user_name']; ?> </td>
 </tr>
 <tr>
    <th>Full Name</th>
    
    <td> : </td>
    <td><?php echo $row['name']; ?> </td>
 </tr>
 <tr>
    <th>Gender</th>
    <td> : </td>
    <td><?php echo $row['gender']; ?> </td>
 </tr>
 <tr>
    <th>Blood Group</th>
    <td> : </td>
    <td><?php echo $row['blood']; ?> </td>
 </tr>
 <tr>
    <th>Email</th>
    <td> : </td>
    <td><?php echo $row['email']; ?> </td>
 </tr>
 <tr>
    <th>Date of Birth</th>
    <td> : </td>
    <td><?php echo $row['dob']; ?> </td>
</tr>
 <tr>   
    <th>Address</th>
    <td> : </td>
    <td><?php echo $row['address']; ?> </td>
</tr>
<tr>   
    <th>Mobile</th>
    <td> : </td>
    <td><?php echo $row['mobile']; ?> </td>
</tr>    

</table>
 </form>



 <h1>.</h1>

    <a href="../view/edit.php"> Edit Profile </a>
    

    


     <?php
}
} else {
  echo "0 results";
}
?>
 <h1>.</h1>

<form action="" method="post" enctype="multipart/form-data">
     	<h2>Add Organizer</h2>
     	<?php if (isset($_GET['error1'])) { ?>
     		<p class="error"><?php echo $_GET['error1']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="ouname" placeholder="User Name" ><br>

        <label>Full Name</label>
     	<input type="text" name="oname" placeholder="Full Name" ><br>

     	<label>User Name</label>
     	<input type="password" name="opass" placeholder="Password" ><br>

         

     	<button type="submit" name="addor"> ADD Organizer </button>

     </form>



     <?php

$link = mysqli_connect("localhost", "root", "", "final");

if(isset($_POST['addor']))
{	

   $ouname = $_POST['ouname'];
	$oname = $_POST['oname'];
	$opass = $_POST['opass'];


   if(empty($ouname) || empty($oname)  || empty($opass) ) 
	{
				
		if(empty($ouname)) {
			header("Location: ../view/logout.php?error1= Organizer User Name is required");
	    exit();
		}
		
		if(empty($oname)) {
			header("Location: ../view/logout.php?error1=Orgaizr Ful Name is required");
	    exit();
		}
		if(empty($opass)) {
			header("Location: ../view/logout.php?error1=Password is required");
	    exit();
		}
	} 
	else 
	{
   
	
 
// Attempt delete query execution
$sql2 = "INSERT into organizer (ouname, oname, opass) VALUES('$ouname', '$oname', '$opass')";
if(mysqli_query($link, $sql2))
{
	header("Location: ../view/logout.php?error1=Organizer Profile Added..!");

} else 
{
    echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

}
}
?>



<h1>.</h1>

<form action="" method="post" enctype="multipart/form-data">
     	<h2>Delete Organizer</h2>
     	<?php if (isset($_GET['error2'])) { ?>
     		<p class="error"><?php echo $_GET['error1']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="ouname" placeholder="User Name" ><br>

        <label>Mobile</label>
     	<input type="text" name="omobile" placeholder="Mobile" ><br>

         

     	<button type="submit" name="deleteor"> Delete Organizer </button>

     </form>



     <?php

$link = mysqli_connect("localhost", "root", "", "final");

if(isset($_POST['deleteor']))
{	

   $ouname = $_POST['ouname'];
	$omobile = $_POST['omobile'];



   if(empty($ouname) || empty($omobile) ) 
	{
				
		if(empty($ouname)) {
			header("Location: ../view/logout.php?error2= Organizer User Name is required");
	    exit();
		}
		
		if(empty($omobile)) {
			header("Location: ../view/logout.php?error2=Orgaizr Mobile Number is required");
	    exit();
		}
	} 
	else 
	{
   
	
 
// Attempt delete query execution
$sql2 = "DELETE from organizer WHERE ouname=$ouname and omobile=$omobile";
if(mysqli_query($link, $sql2))
{
	header("Location: ../view/logout.php?error2=Organizer Profile Deleted..!");

} else 
{
    echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

}
}
?>

<h1>.</h1>

<h1>All Organizer Data</h1>
<form  id="tableform">




<table id="table1s" border="1" align="center">
            <tr width="100%">
                <th width="11.1%">User Name</th>
                <th width="11.1%">Full Name</th>
                <th width="11.1%">Gender</th>
                <th width="11.1%">Date Of Birth</th>
                <th width="11.1%">Email</th>
                <th width="11.1%">Mobile</th>
                <th width="11.1%">Blood Group</th>
                <th width="11.1%">Address</th>
                <th width="11.1%">Password</th>
            </tr>


            <?php
include('../connection/db_conn.php');


$query1 = "SELECT * FROM organizer ";
$result1 = $conn->query($query1);
?>


<?php
 if (mysqli_num_rows($result1) > 0) {
 while($row1 = mysqli_fetch_assoc($result1)) { ?>


            <tr width="100%">
                <td width="11.1%"><?php echo $row1['ouname'];?></td>
                <td width="11.1%"><?php echo $row1['oname'];?></td>
                <td width="11.1%"><?php echo $row1['ogender'];?></td>
                <td width="11.1%"><?php echo $row1['odob'];?></td>
                <td width="11.1%"><?php echo $row1['oemail'];?></td>
                <td width="11.1%"><?php echo $row1['omobile'];?></td>
                <td width="11.1%"><?php echo $row1['oblood'];?></td>
                <td width="11.1%"><?php echo $row1['oaddress'];?></td>
                <td width="11.1%"><?php echo $row1['opass'];?></td>
            </tr>

            <?php
}
} else {
  echo "0 results";
}
?>


        </table>
 



</form>
























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

