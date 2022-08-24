<html>
    <head>
        <title> CSWAD </title>
        <link rel="stylesheet" href="../style/style.css">
    </head>

    <body bgcolor="#f97921">


    <h1 class="headh1"> CSWAD </h1>
    <p> <i> Chilmari Student Welfare Association-Dhaka </i> </p>
    

    <br>
<form action="" method="POST">
          <input type="text" name="id" placeholder="id"/><br/>
          <input type="text" name="name" placeholder="name"/><br/>
          <input type="text" name="user_name" placeholder="user_name"/><br/>
          <input type="text" name="gender" placeholder="gender"/><br/>
          <input type="text" name="mobile" placeholder="mobile"/><br/>
          <input type="text" name="address" placeholder="address"/><br/>
          <input type="text" name="email" placeholder="email"/><br/>
          <input type="text" name="blood" placeholder="blood"/><br/>
          <input type="text" name="dob" placeholder="dob"/><br/>
          <input type="text" name="password" placeholder="password"/><br/>
          <input type="text" name="photo" placeholder="photo"/><br/>

          <input type="submit" name="update" value="UPDATE DATA"/>
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
     $connection=mysqli_connect("localhost","root","");
     $db=mysqli_select_db($connection,'final');


     if(isset($_POST['update']))
     {
          

     $id = $_POST['id'];


     $query = "UPDATE 'users' SET name='$_post[name]', mobile='$_post[mobile]', address='$_post[address]', blood='$_post[blood]', dob='$_post[dob]', email='$_post[email]', user_name='$_post[user_name]', photo='$_post[photo]', password='$_post[password]' WHERE id='$_POST[id]'";
     $result = mysqli_query($connection,$query);

     if($result)
     {
          echo '<script type="text/javascript"> alert("Data Updated") </script>';

     }
     else
     {
          echo '<script type="text/javascript"> alert("Data are not Updated") </script>';
     }

     
     }

?>

if (empty($user_name)) 
		{
			header("Location: ../view/edit.php?error=User Name is required");
			exit();
		}
		else if(empty($password))
		{
			header("Location: ../view/edit.php?error=Password is required");
			exit();
		}
		else if(empty($dob))
		{
			header("Location: ../view/edit.php?error=Password is required");
			exit();
		}
		else if(empty($gender))
		{
			header("Location: ../view/edit.php?error=Password is required");
			exit();
		}
		else if(empty($blood))
		{
			header("Location: ../view/edit.php?error=Password is required");
			exit();
		}
		else if(empty($email))
		{
			header("Location: ../view/edit.php?error=Password is required");
			exit();
		}
		else if(empty($mobile))
		{
			header("Location: ../view/edit.php?error=Password is required");
			exit();
		}
		else if(empty($address))
		{
			header("Location: ../view/edit.php?error=Password is required");
			exit();
		}
		else
		{
          }