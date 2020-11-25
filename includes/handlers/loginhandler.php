<?php 
	include 'config/db.php';
?>


<?php 

$errorMessage=null;
//check if this is login post 
// post then get the form data from post 
//check if the entered form data matches with db data 
//if data matches --> go to home pahe 
//if data does not match --> show error in same login page

if (isset($_POST['submit'])) // yes this is a POST
{
	$errorMessage= "hi ";
	$username = $_POST["username"];
	$password = $_POST["password"];	
	$active = true;

	$sql ="SELECT * FROM cookingwithruby.users WHERE Username ='$username' AND Password ='$password' AND IsUserActive='$active'";	
	$sqlResult= mysqli_query($dbConnection, $sql);	
	$sqlRowCount =  mysqli_num_rows($sqlResult);

	if ($sqlResult==true && $sqlRowCount>0)
	{
		//alright lets save info under session and redirect to dashboard page 
		$sqlResultRow = mysqli_fetch_assoc($sqlResult);
		//SAVE SESSION 
		session_start();
		$_SESSION['username'] =$sqlResultRow["Username"];
		$_SESSION['id'] = $sqlResultRow['Id'];
		header('Location:index.php');
	}
	else
	{
		$errorMessage="Invalid user credentials.";
	}

}



?>

