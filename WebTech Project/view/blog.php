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
        <a href="../view/blog.php" class="active">Blog</a>
        <a href="#contact">Contact</a>
        <a href="../view/login.php">Login</a>
        <a href="../view/registration.php">Registration</a>
        
        </a>
    </div>








<h1>All Blog</h1>
<form  id="tableform">




<table id="table1s" border="1" align="center">
            


            <?php
include('../connection/db_conn.php');


$query1 = "SELECT * FROM blog ";
$result1 = $conn->query($query1);
?>


<?php
 if (mysqli_num_rows($result1) > 0) {
 while($row1 = mysqli_fetch_assoc($result1)) { ?>


            <tr width="100%">
            <td  width="25%"><?php echo $row1['bid'];?><?php echo $row1['btitle'];?></td>
           
            <td width="75%">

            <?php echo $row1['bdetails'];?></td>
             
            </tr>

            <?php
}
} else {
  echo "0 results";
}
?>


        </table>

</form>

<br><br><br>

<div class="footer" id="footer">
    <p align="center"> <i> Copyright 2022 by CSWAD. All Rights Reserved.</i><p>
</div>


</body>


</html>
