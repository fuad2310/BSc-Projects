<?php 

session_start(); 
include "../connection/db_conn.php";

if(isset($_POST['alogin']))
{
if (isset($_POST['uname']) && isset($_POST['password'])) 
{

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: ../view/login.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: ../view/login.php?error=Password is required");
	    exit();
	}else{

		
		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";
		
		
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
				
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];

				if(!empty($_POST["remember"])) {
					setcookie ("uname",$_POST["uname"],time()+ 36000);
					setcookie ("password",$_POST["password"],time()+ 36000);
					echo "Cookies Set Successfuly";
				} else {
					setcookie("uname","");
					setcookie("password","");
					echo "Cookies Not Set";
				}

				

            	header("Location: ../view/logout.php");
				
				


		        exit();
            }else{
				header("Location: ../view/login.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: ../view/login.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: ../view/login.php");
	exit();
}
}









if(isset($_POST['ologin']))
{
if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$ouname = validate($_POST['uname']);
	$opass = validate($_POST['password']);

	if (empty($ouname)) {
		header("Location: ../view/login.php?error=User Name is required");
	    exit();
	}else if(empty($opass)){
        header("Location: ../view/login.php?error=Password is required");
	    exit();
	}else{

		
		$sql = "SELECT * FROM organizer WHERE ouname='$ouname' AND opass='$opass'";
		
		
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['ouname'] === $ouname && $row['opass'] === $opass) {
				
            	$_SESSION['ouname'] = $row['ouname'];
            	$_SESSION['oname'] = $row['oname'];
            	$_SESSION['oid'] = $row['oid'];

				

            	header("Location: ../view/organizer.php");
				
				


		        exit();
            }else{
				header("Location: ../view/login.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: ../view/login.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: ../view/login.php");
	exit();
}
}

if(isset($_POST['mlogin']))
{
if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: ../view/login.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: ../view/login.php?error=Password is required");
	    exit();
	}else{

		
		$sql = "SELECT * FROM member WHERE muname='$uname' AND mpassword='$pass'";
		
		
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['muname'] === $uname && $row['mpassword'] === $pass) {
				
            	$_SESSION['muname'] = $row['muname'];
            	$_SESSION['mname'] = $row['mname'];
            	$_SESSION['mid'] = $row['mid'];

				

            	header("Location: ../view/member.php");
				
				


		        exit();
            }else{
				header("Location: ../view/login.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: ../view/login.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: ../view/login.php");
	exit();
}
}

if(isset($_POST['glogin']))
{
if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: ../view/login.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: ../view/login.php?error=Password is required");
	    exit();
	}else{

		
		$sql = "SELECT * FROM guest WHERE guname='$uname' AND gpassword='$pass'";
		
		
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['guname'] === $uname && $row['gpassword'] === $pass) {
				
            	$_SESSION['guname'] = $row['guname'];
            	$_SESSION['gname'] = $row['gname'];
            	$_SESSION['gid'] = $row['gid'];

				

            	header("Location: ../view/guest.php");
				
				


		        exit();
            }else{
				header("Location: ../view/login.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: ../view/login.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: ../view/login.php");
	exit();
}
}

?>