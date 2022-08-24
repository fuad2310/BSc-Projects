<?php 
session_start();

if (isset($_SESSION['mid']) && isset($_SESSION['muname'])) {

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
        <a href="../control/outpro.php"  class="active"><?php echo $_SESSION['mname']; ?>, Logout</a>
    </div>

     <h2>Hello, <?php echo $_SESSION['mname']; ?></h2>

     


     <?php
include('../connection/db_conn.php');

     $mname = $_SESSION['mname'];


$query = "SELECT * FROM member WHERE mname='$mname' ";
$result = $conn->query($query);
?>



<form>

<table border="0" cellspacing="0" cellpadding="15" align="center">
<?php
 if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <th></th>
    
    <td></td>
    <td><img src="../image/<?php echo $row['mphoto']; ?>" align="right" width = 130 height = 128 title="<?php echo $row['mphoto']; ?>"> </td>
 </tr>
     
 <tr>
    <th>Username</th>
    
    <td> : </td>
    <td><?php echo $row['muname']; ?> </td>
 </tr>
 <tr>
    <th>Full Name</th>
    
    <td> : </td>
    <td><?php echo $row['mname']; ?> </td>
 </tr>
 <tr>
    <th>Gender</th>
    <td> : </td>
    <td><?php echo $row['mgender']; ?> </td>
 </tr>
 <tr>
    <th>Blood Group</th>
    <td> : </td>
    <td><?php echo $row['mblood']; ?> </td>
 </tr>



 <tr>
    <th>Email</th>
    <td> : </td>
    <td><?php echo $row['memail']; ?> </td>
 </tr>
 <tr>
    <th>Date of Birth</th>
    <td> : </td>
    <td><?php echo $row['mdob']; ?> </td>
</tr>
 <tr>   
    <th>Address</th>
    <td> : </td>
    <td><?php echo $row['maddress']; ?> </td>
</tr>
<tr>   
    <th>Mobile</th>
    <td> : </td>
    <td><?php echo $row['mmobile']; ?> </td>
</tr>    



</table>
 </form>



 <h1>.</h1>

    <a href="../view/medit.php"> Edit Profile </a>
    

    


     <?php
}
} else {
  echo "0 results";
}
?>
 <h1>.</h1>








 <form action="" method="post" enctype="multipart/form-data">
     	<h2>Add Guest</h2>
     	<?php if (isset($_GET['error1'])) { ?>
     		<p class="error"><?php echo $_GET['error1']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="guname" placeholder="User Name" ><br>

        <label>Full Name</label>
     	<input type="text" name="gname" placeholder="Full Name" ><br>

     	<label>Password</label>
     	<input type="password" name="gpassword" placeholder="Password" ><br>

         

     	<button type="submit" name="addg"> ADD Guest </button>

     </form>



     <?php

$link = mysqli_connect("localhost", "root", "", "final");

if(isset($_POST['addg']))
{	

   $guname = $_POST['guname'];
	$gname = $_POST['gname'];
	$gpass = $_POST['gpassword'];


   if(empty($guname) || empty($gname)  || empty($gpass) ) 
	{
				
		if(empty($guname)) {
			header("Location: ../view/member.php?error1= Guest User Name is required");
	    exit();
		}
		
		if(empty($gname)) {
			header("Location: ../view/member.php?error1=Guest Full Name is required");
	    exit();
		}
		if(empty($gpass)) {
			header("Location: ../view/member.php?error1=Password is required");
	    exit();
		}
	} 
	else 
	{
   
	
 
// Attempt delete query execution
$sql2 = "INSERT into guest (guname, gname, gpassword) VALUES('$guname', '$gname', '$gpass')";
if(mysqli_query($link, $sql2))
{
	header("Location: ../view/member.php?error1=Guest Profile Added..!");

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


// if(!isset($_POST['Logout']))
// {
// if ($_SESSION['muname'] !=NULL)
// {
//    header("Location: ../view/member.php");
// }
// }

 ?>

