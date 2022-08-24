<?php
// including the database connection file
include_once("../connection/db_conn.php");

if(isset($_POST['update']))
{	
	$id = $GET['id'];
	
	$user_name = $_GET['user_name'];
	$mobile = $_GET['mobile'];
	$address = $_GET['address'];	
	
	// checking empty fields
	if(empty($user_name) || empty($mobile)  || empty($dob) || empty($gender) || empty($blood) || empty($email) || empty($password)  || empty($address)) {
				
		if(empty($user_name)) {
			echo "<font color='red'>User Name is empty.</font><br/>";
		}
		
		if(empty($dob)) {
			echo "<font color='red'>Mobile numbe is empty.</font><br/>";
		}
		if(empty($gender)) {
			echo "<font color='red'>Mobile numbe is empty.</font><br/>";
		}
		if(empty($blood)) {
			echo "<font color='red'>Mobile numbe is empty.</font><br/>";
		}
		if(empty($email)) {
			echo "<font color='red'>Email numbe is empty.</font><br/>";
		}
		if(empty($mobile)) {
			echo "<font color='red'>Mobile numbe is empty.</font><br/>";
		}
		
		if(empty($address)) {
			echo "<font color='red'>Addres is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET user_name='$user_name', mobile='$mbile', address='$address' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: ./view/logout.php");
	}
}
?>



<?php
     $connection=mysqli_connect("localhost","root","");
     $db=mysqli_select_db($connection,'final');


     if(isset($_POST['update']))
     {

		

     $name = $_POST['name'];


     $query = "UPDATE 'users' SET mobile='$_post[mobile]', address='$_post[address]', blood='$_post[blood]', dob='$_post[dob]', email='$_post[email]', user_name='$_post[user_name]', photo='$_post[photo]', password='$_post[password]' WHERE name='$_POST[name]' ";
     $result = mysqli_query($connection,$query);

     if($result)
     {
          echo '<script type="text/javascript"> alert("Data Updated") </script>';
          header("Location: ../view/logout.php");

     }
     else
     {
          echo '<script type="text/javascript"> alert("Data are not Updated") </script>';
          header("Location: ../view/logout.php");
     }

     
     }
	

?>

<h1>.</h1>



     <form  method="post" action="">
     	<h2>Profile Data Customization</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="uname" value=<?php echo $row['user_name']; ?>><br>

          <label>Full  Name</label>
     	<input type="text" name="fname" value=<?php echo $row['name']; ?>><br>

          <label>Gender</label>
     	<input type="text" name="gender" value=<?php echo $row['gender']; ?>><br>

          <label>Blood Group</label>
     	<input type="text" name="bgroup" value=<?php echo $row['blood']; ?>><br>

          <label>Email</label>
     	<input type="text" name="email" value=<?php echo $row['email']; ?>><br>

          <label>Mobile Number</label>
     	<input type="text" name="mobile" value=<?php echo $row['mobile']; ?>><br>

          <label>Address</label>
     	<input type="text" name="address" value=<?php echo $row['address']; ?>><br>

          <label>ID</label>
     	<input type="text" name="id" value=<?php echo $row['id']; ?>><br>

     	<button type="submit" name="uppdate" value="Uppdate"> Update Data</button>
          <button type="hidden" name="delete" value="Delete"> Delete Profile</button>

     </form>

	 <?php


	//include dbConfig file  
	require_once '../connection/db_conn.php'; 

	//check if form submitted
	if(isset($_POST["imageupdate"])){ 
		
		$error = false;
		$status = "";

		//check if file is not empty
		if(!empty($_FILES["photo"]["name"])) { 

			//file info 
	        $file_name = basename($_FILES["photo"]["name"]); 
	        $file_type = pathinfo($file_name, PATHINFO_EXTENSION);

	        //make an array of allowed file extension
	        $allowed_file_types = array('jpg','jpeg','png','gif');


	        //check if upload file is an image
	        if( in_array($file_type, $allowed_file_types) ){ 

            	$tmp_image = $_FILES['photo']['tmp_name']; 
            	$img_content = addslashes(file_get_contents($tmp_image)); 

            	//Now run insert query
            	$query = $db->query("UPDATE users SET photo='$img_content' WHERE name='$_SESSION[name]'"); 

             
             	//check if successfully inserted
            	if($query){ 
                	$status = "Image has been successfully uploaded."; 
	            }else{ 
	            	$error = true;
	                $status = "Something went wrong when uploading image!!!"; 
	            }  
	        }else{ 
	        	$error = true;
	            $status = 'Only support jpg, jpeg, png, gif format'; 
	        } 

		}

	}
?>


<div id="display-image">
	<?php
          include('../connection/db_conn.php');
          $name = $_SESSION['name'];

		$query = "SELECT photo FROM users WHERE name='$name' ";
		$result = $conn->query($query);

		while ($data = mysqli_fetch_assoc($result)) {
		?>
			<img src="../image/<?php echo $data['photo']; ?>" align="center" height="auto" width="30%">

		<?php
		}
		?>
	</div>




