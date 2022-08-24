<?php 
session_start();

if (isset($_SESSION['gid']) && isset($_SESSION['guname'])) {

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
        <a href="../control/outpro.php"  class="active"><?php echo $_SESSION['gname']; ?>, Logout</a>
    </div>

     <h2>Hello, <?php echo $_SESSION['gname']; ?></h2>

     


     <?php
include('../connection/db_conn.php');

     $guname = $_SESSION['guname'];


$query = "SELECT * FROM guest WHERE guname='$guname' ";
$result = $conn->query($query);
?>



<form>

<table border="0" cellspacing="0" cellpadding="15" align="center">
<?php
 if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)) { ?>

 <tr>
    <th>Username</th>
    
    <td> : </td>
    <td><?php echo $row['guname']; ?> </td>
 </tr>
 <tr>
    <th>Full Name</th>
    
    <td> : </td>
    <td><?php echo $row['gname']; ?> </td>
 </tr>

 


</table>
 </form>



 <h1>.</h1>

    <!-- <a href="../view/medit.php"> Edit Profile </a> -->
    

    


     <?php
}
} else {
  echo "0 results";
}
?>
 <!-- <h1>.</h1> -->








 <form action="" method="post" enctype="multipart/form-data">
     	<h2>Add Event</h2>
     	<?php if (isset($_GET['error1'])) { ?>
     		<p class="error"><?php echo $_GET['error1']; ?></p>
     	<?php } ?>
     	<label>Event Title</label>
     	<input type="text" name="etitle" placeholder="Event Title" ><br>

        <label>Event Details</label>
     	<input type="text" name="edetails" placeholder="Event Details" ><br>
         

     	<button type="submit" name="adde"> ADD Event </button>

     </form>



     <?php

$link = mysqli_connect("localhost", "root", "", "final");

if(isset($_POST['adde']))
{	

    $etitle = $_POST['etitle'];
	$edetails = $_POST['edetails'];
	


   if(empty($etitle) || empty($edetails)) 
	{
				
		if(empty($etitle)) {
			header("Location: ../view/guest.php?error1= Event Title is required");
	    exit();
		}
		
		if(empty($edetails)) {
			header("Location: ../view/guest.php?error1=Event Details is required");
	    exit();
		}
	} 
	else 
	{
   
	
 
$sql2 = "INSERT into event (etitle, edetails) VALUES('$etitle', '$edetails')";
if(mysqli_query($link, $sql2))
{
	header("Location: ../view/guest.php?error1=Event Added..!");

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

<h1>All Events</h1>
<form  id="tableform">




<table id="table1s" border="1" align="center">
            


            <?php
include('../connection/db_conn.php');


$query3 = "SELECT * FROM event ";
$result1 = $conn->query($query3);
?>



<tr width="70%">
                
                <th width="7%">Event ID</th>
                <th width="20%">Event Title</th>
                <th width="65%">Event Details</th>
                
</tr>



<?php
 if (mysqli_num_rows($result1) > 0) {
 while($row3 = mysqli_fetch_assoc($result1)) { ?>



            <tr width="70%">
            <td  width="7%">
                <?php echo $row3['eid'];?>
                
            <td  width="20%">   
                <?php echo $row3['etitle'];?></td>
           
            <td width="65%">

            <?php echo $row3['edetails'];?></td>
             
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

