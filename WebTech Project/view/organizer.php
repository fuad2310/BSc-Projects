<?php 
session_start();

if (isset($_SESSION['oid']) && isset($_SESSION['ouname'])) {

 ?>


<html>
    <head>
        <title> CSWAD </title>
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/orstyle.css">

        
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

     <h2>Welcome! <?php echo $_SESSION['oname']; ?></h2>

     


     <?php
include('../connection/db_conn.php');

     $oname = $_SESSION['oname'];


$query = "SELECT * FROM organizer WHERE oname='$oname' ";
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
    <td><img src="../image/<?php echo $row['ophoto']; ?>" align="right" width = 130 height = 128 title="<?php echo $row['ophoto']; ?>"> </td>
 </tr>
     
 <tr>
    <th>Username</th>
    
    <td> : </td>
    <td><?php echo $row['ouname']; ?> </td>
 </tr>
 <tr>
    <th>Full Name</th>
    
    <td> : </td>
    <td><?php echo $row['oname']; ?> </td>
 </tr>
 <tr>
    <th>Gender</th>
    <td> : </td>
    <td><?php echo $row['ogender']; ?> </td>
 </tr>
 <tr>
    <th>Blood Group</th>
    <td> : </td>
    <td><?php echo $row['oblood']; ?> </td>
 </tr>


 <tr>   
    <th>NID No.</th>
    <td> : </td>
    <td><?php echo $row['NIDNo']; ?> </td>
</tr>  


 <tr>
    <th>Email</th>
    <td> : </td>
    <td><?php echo $row['oemail']; ?> </td>
 </tr>
 <tr>
    <th>Date of Birth</th>
    <td> : </td>
    <td><?php echo $row['odob']; ?> </td>
</tr>
 <tr>   
    <th>Address</th>
    <td> : </td>
    <td><?php echo $row['oaddress']; ?> </td>
</tr>
<tr>   
    <th>Mobile</th>
    <td> : </td>
    <td><?php echo $row['omobile']; ?> </td>
</tr>    



</table>
 </form>



 <h1>.</h1>

    <a href="../view/oredit.php"> Edit Profile </a>
    

    


     <?php
}
} else {
  echo "0 results";
}
?>
 <h1>.</h1>





 <form action="" method="post" enctype="multipart/form-data">
     	<h2>Add Blog</h2>
     	<?php if (isset($_GET['error1'])) { ?>
     		<p class="error"><?php echo $_GET['error1']; ?></p>
     	<?php } ?>
     	<label>Blog Title</label>
     	<input type="text" name="btitle" placeholder="Blog Title" ><br>

        <label>Details</label>
     	<input type="text" name="bdetails" placeholder="Details" ><br>



         

     	<button type="submit" name="addblog"> ADD Blog </button>

     </form>



     <?php

$link = mysqli_connect("localhost", "root", "", "final");

if(isset($_POST['addblog']))
{	

   $btitle = $_POST['btitle'];
	$bdetails = $_POST['bdetails'];



   if(empty($btitle) || empty($bdetails)  ) 
	{
				
		if(empty($btitle)) {
			header("Location: ../view/organizer.php?error1= Title is required");
	    exit();
		}
		
		if(empty($bdetails)) {
			header("Location: ../view/organizer.php?error1=Blog detail is required");
	    exit();
		}
		
	} 
	else 
	{
   
	
 
// Attempt delete query execution
$sql2 = "INSERT into blog (btitle, bdetails) VALUES('$btitle', '$bdetails')";
if(mysqli_query($link, $sql2))
{
	header("Location: ../view/organizer.php?error1=Blog Added Successfully..!");

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
     	<h2>Delete Blog</h2>
     	<?php if (isset($_GET['error2'])) { ?>
     		<p class="error"><?php echo $_GET['error1']; ?></p>
     	<?php } ?>
     	<label>Blog ID</label>
     	<input type="text" name="bid" placeholder="Blog ID" ><br>

        <label>Blog Title</label>
     	<input type="text" name="btitle" placeholder="Blog Title" ><br>

         

     	<button type="submit" name="deleteblog"> Delete Blog </button>

     </form>



     <?php

$link = mysqli_connect("localhost", "root", "", "final");

if(isset($_POST['deleteblog']))
{	

   $bid = $_POST['bid'];
	$btitle = $_POST['btitle'];



   if(empty($bid) || empty($btitle) ) 
	{
				
		if(empty($bid)) {
			header("Location: ../view/organizer.php?error2= Blog ID is required");
	    exit();
		}
		
		if(empty($btitle)) {
			header("Location: ../view/organizer.php?error2=Blog Title is required");
	    exit();
		}
	} 
	else 
	{
   
	
 
// Attempt delete query execution
$sql2 = "DELETE from blog WHERE bid=$bid and btitle=$btitle";
if(mysqli_query($link, $sql2))
{
	header("Location: ../view/organizer.php?error2=Blog Deleted..!");

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












<h1>.</h1>

<h1>All Member Data</h1>
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


$query1 = "SELECT * FROM member ";
$result1 = $conn->query($query1);
?>


<?php
 if (mysqli_num_rows($result1) > 0) {
 while($row1 = mysqli_fetch_assoc($result1)) { ?>


            <tr width="100%">
                <td width="11.1%"><?php echo $row1['muname'];?></td>
                <td width="11.1%"><?php echo $row1['mname'];?></td>
                <td width="11.1%"><?php echo $row1['mgender'];?></td>
                <td width="11.1%"><?php echo $row1['mdob'];?></td>
                <td width="11.1%"><?php echo $row1['memail'];?></td>
                <td width="11.1%"><?php echo $row1['mmobile'];?></td>
                <td width="11.1%"><?php echo $row1['mblood'];?></td>
                <td width="11.1%"><?php echo $row1['maddress'];?></td>
                <td width="11.1%"><?php echo $row1['mpassword'];?></td>
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

<h1>All Guest Data</h1>
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


$query1 = "SELECT * FROM guest ";
$result1 = $conn->query($query1);
?>


<?php
 if (mysqli_num_rows($result1) > 0) {
 while($row1 = mysqli_fetch_assoc($result1)) { ?>


            <tr width="100%">
                <td width="11.1%"><?php echo $row1['guname'];?></td>
                <td width="11.1%"><?php echo $row1['gname'];?></td>
                <td width="11.1%"><?php echo $row1['ggender'];?></td>
                <td width="11.1%"><?php echo $row1['gdob'];?></td>
                <td width="11.1%"><?php echo $row1['gemail'];?></td>
                <td width="11.1%"><?php echo $row1['gmobile'];?></td>
                <td width="11.1%"><?php echo $row1['gblood'];?></td>
                <td width="11.1%"><?php echo $row1['gaddress'];?></td>
                <td width="11.1%"><?php echo $row1['gpassword'];?></td>
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

