<?php
include ("../control/loginpro.php");


if(isset($_SESSION['alogin'])){
header("location: ../view/logout.php");
}
else
{
    if(isset($_SESSION['ologin']))
    {
    header("location: ../view/logout.php");
    }
    else
    {
        if(isset($_SESSION['mlogin']))
        {
        header("location: ../view/logout.php");
        }
        else
        {
            if(isset($_SESSION['glogin']))
            {
            header("location: ../view/logout.php");
            }
        }
    }
}

?>
<html>
    <head>
        <title> CSWAD-login </title>
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
        <a href="../view/login.php"  class="active">Login</a>
        <a href="../view/registration.php">Registration</a>
        
    
    </div>
    <br>
    <br>
    <br>
    <br>


          <form action="" method="post" enctype="multipart/form-data">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name" value="<?php if(isset($_COOKIE["uname"])) { echo $_COOKIE["uname"]; } ?>"><br>

     	<label>User Name</label>
     	<input type="password" name="password" placeholder="Password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"><br>

         
         <p align="center"><input type="checkbox" name="remember" /> Remember me</p>

     	<button type="submit" name="alogin"> Admin </button>
        <button type="submit" name="ologin"> Organizer </button>
        <button type="submit" name="mlogin"> Member </button>
        <button type="submit" name="glogin"> Guest </button>
     </form>

     




    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


    <div class="footer" id="footer">
        <p align="center"> <i> Copyright 2022 by CSWAD. All Rights Reserved.</i><p>
    </div>

            
    </body>


</html>