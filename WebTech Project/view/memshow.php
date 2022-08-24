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
        <a href="../view/memshow.php" class="active">Member</a>
        <a href="../view/event.php">Event</a>
        <a href="../view/find.php">Find</a>
        <a href="../view/blog.php" >Blog</a>
        <a href="#contact">Contact</a>
        <a href="../view/login.php">Login</a>
        <a href="../view/registration.php">Registration</a>
        
        </a>
    </div>








<h1>All Members</h1>
<form  id="tableform">




<table id="table1s" border="1" align="center">
            


<?php
include('../connection/db_conn.php');


$query1 = "SELECT * FROM member ";
$result1 = $conn->query($query1);
?>


<?php
 if (mysqli_num_rows($result1) > 0) {
 while($row1 = mysqli_fetch_assoc($result1)) 
 { ?>

<tr width="100%">
                
                <th width="11.1%">Full Name</th>
                <th width="11.1%">Gender</th>
                <th width="11.1%">Date Of Birth</th>
                <th width="11.1%">Email</th>
                <th width="11.1%">Mobile</th>
                <th width="11.1%">Blood Group</th>
            </tr>

            
<tr width="100%">
                
                <td width="11.1%"><?php echo $row1['mname'];?></td>
                <td width="11.1%"><?php echo $row1['mgender'];?></td>
                <td width="11.1%"><?php echo $row1['mdob'];?></td>
                <td width="11.1%"><?php echo $row1['memail'];?></td>
                <td width="11.1%"><?php echo $row1['mmobile'];?></td>
                <td width="11.1%"><?php echo $row1['mblood'];?></td>
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
