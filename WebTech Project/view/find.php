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
        <a href="../view/index.php">Home</a>
        <a href="../view/memshow.php">Member</a>
        <a href="../view/event.php">Event</a>
        <a href="../view/find.php" class="active">Find</a>
        <a href="../view/blog.php">Blog</a>
        <a href="#contact">Contact</a>
        <a href="../view/login.php">Login</a>
        <a href="../view/registration.php">Registration</a>
        
        </a>
    </div>


          <h1> Find By Name </h1>
          <form  id="tableform" method="POST" action="../view/find.php">
          <?php if (isset($_GET['error2'])) { ?>
     		<p class="error"><?php echo $_GET['error2']; ?></p>
     	<?php } ?>
<table id="table1s" border="1" align="center">


            <tr>
                <label> Enter The Name You Want To Search </label>
                <input type="text" name="oname">
                <button type="submit" name="search_name"> Search Name </button> <br><br><br>
            <tr width="100%">
                
                <th width="11.1%">Full Name</th>
                <th width="11.1%">Gender</th>
                <th width="11.1%">Date Of Birth</th>
                <th width="11.1%">Email</th>
                <th width="11.1%">Mobile</th>
                <th width="11.1%">Blood Group</th>
            </tr>


            <?php
include('../connection/db_conn.php');


if(isset($_POST['search_name']))
{
$oname = $_POST['oname'];


        if(empty($oname)){
            header("Location: ../view/find.php?error2=Name is required");
            exit();
        }
        else
        {
$querys = "SELECT * FROM organizer WHERE oname LIKE '$oname' ";
$results = $conn->query($querys);
?>


<?php
 if (mysqli_num_rows($results) > 0) {
 while($rows = mysqli_fetch_assoc($results)) { 
?>


            <tr width="100%">
                
                <td width="11.1%"><?php echo $rows['oname'];?></td>
                <td width="11.1%"><?php echo $rows['ogender'];?></td>
                <td width="11.1%"><?php echo $rows['odob'];?></td>
                <td width="11.1%"><?php echo $rows['oemail'];?></td>
                <td width="11.1%"><?php echo $rows['omobile'];?></td>
                <td width="11.1%"><?php echo $rows['oblood'];?></td>
            </tr>

            <?php
}
} else {
  echo "0 results";
}
        }
    }

?>


        </table>
 



</form>




<h1> Find By Blood Group </h1>
          <form  id="tableform" method="POST" action="../view/find.php">
          <?php if (isset($_GET['error3'])) { ?>
     		<p class="error"><?php echo $_GET['error3']; ?></p>
     	<?php } ?>
<table id="table1s" border="1" align="center">


            <tr>
                <label> Choose The Blood Group You Want... </label>
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
                <button type="submit" name="search_blood"> Search Blood </button> <br><br><br>
            <tr width="100%">
                
                <th width="11.1%">Full Name</th>
                <th width="11.1%">Gender</th>
                <th width="11.1%">Date Of Birth</th>
                <th width="11.1%">Email</th>
                <th width="11.1%">Mobile</th>
                <th width="11.1%">Blood Group</th>
            </tr>


            <?php
include('../connection/db_conn.php');


if(isset($_POST['search_blood']))
{
$blood = $_POST['blood'];


        if(empty($blood)){
            header("Location: ../view/find.php?error3=Blood Group is required");
            exit();
        }
        else
        {
$queryb = "SELECT * FROM users WHERE blood='$blood' ";
$resultb = $conn->query($queryb);
?>


<?php
 if (mysqli_num_rows($resultb) > 0) {
 while($rowb = mysqli_fetch_assoc($resultb)) { ?>


            <tr width="100%">
                
                <td width="11.1%"><?php echo $rowb['name'];?></td>
                <td width="11.1%"><?php echo $rowb['gender'];?></td>
                <td width="11.1%"><?php echo $rowb['dob'];?></td>
                <td width="11.1%"><?php echo $rowb['email'];?></td>
                <td width="11.1%"><?php echo $rowb['mobile'];?></td>
                <td width="11.1%"><?php echo $rowb['blood'];?></td>
            </tr>

            <?php
}
} else {
  echo "0 results";
}
        }
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