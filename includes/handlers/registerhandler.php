<?php 
	include 'config/db.php';	
?>

<?php		
	$errorMessage=null;

	if (isset($_POST["submit"])) 
	{		
			
			//get form data from post and save under variable 
			$firstName = $_POST['firstName'];
			$lastName = $_REQUEST['lastName'];
			$email = $_REQUEST['email'];
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];
			//$userImage="";//$_POST['userimage'];

  		
			//for images 
			

			//$file = $_FILES['userimage'];
			//print_r($file);
			

			//$errorMessage ="i am post";
			
			//for images


			// //check if email is already registered
			 $selectUserQuery="SELECT * FROM cookingwithruby.users WHERE EMAIL ='$email'"; //CREATE SQL QUERY 
			 $selectUserQueryResult = MYSQLI_QUERY($dbConnection,$selectUserQuery); //EXECUTE SQL QUERY
			 $selecUserRowCount =  MYSQLI_NUM_ROWS($selectUserQueryResult); // GET ROWS

			IF ($selecUserRowCount>0) //RECORD EXISTS
			 {
			 	$errorMessage="EMAIL IS ALREADY REGISTERED.";		
			 }
			 ELSE//EMAIL IS NOT REGISTERED
			 {
			 	//CHECK IF THE USER NAME ALREADY EXISTS 
			 	$selectUserQuery="SELECT * FROM cookingwithruby.users WHERE USERNAME ='$firstName'"; //CREATE SQL QUERY 
			 	$selectUserQueryResult = MYSQLI_QUERY($dbConnection,$selectUserQuery); //EXECUTE SQL QUERY
			 	$selecUserRowCount =  MYSQLI_NUM_ROWS($selectUserQueryResult); // GET ROWS

			 	IF ($selecUserRowCount>0) //USER NAME ALREADY TAKEN
			 	{
			 		$errorMessage="USER NAME IS ALREADY TAKEN. PLEASE TRY USING DIFFERENT USERNAME.";
			 	}
			 	ELSE
			 	{
			 		//WE CAN PROCEED FROM HERE 
			 		//INSERT INTO THE TABLE 
					//SEE IF THE RECORD IS INSERTED OR NOT
					//IF INSERTED -- SAVE USER INFO IN SESSION VARIABLE 
					//THEN GO TO DASHBOARD PAGE
					$isUserActive=TRUE;
					$createdDate=DATE('Y-M-D H:I:S');


					$sqlInsertQuery ="INSERT INTO cookingwithruby.users (Firstname, Lastname, Email,Username, Password,IsUserActive,CreatedDate)
										VALUES('$firstName','$lastName','$email','$username','$password','$isUserActive','$createdDate')"; //CREATE QUERY
					$sqlInsertQueryResult =mysqli_query($dbConnection,$sqlInsertQuery); //EXECUTE QUERY
			 		$insertEffectedRow = mysqli_affected_rows($dbConnection); //GET NO OF ROWS EFFECTED

			 		IF($insertEffectedRow>0)  //ROW INSERTED
			 		{
			 			$selectUserQuery = "SELECT * FROM cookingwithruby.users WHERE USERNAME ='$username'";
						$selectUserQueryResult=MYSQLI_QUERY($dbConnection,$selectUserQuery); 					
			 			$userResult =MYSQLI_FETCH_ASSOC($selectUserQueryResult);	
			 			//SAVE SESSION 
			 			session_start();
			 			$_SESSION['username'] =$userResult["Username"];
						$_SESSION['id'] = $userResult['Id'];

			 			//REDIRECT TO DASHBOARD
			 			HEADER('LOCATION:index.php');
			 		}
					ELSE //ROW NOT INSERTTED
			 		{
						$errorMessage="USER REGISTRATION FAILED." .mysqli_error($dbConnection);
					}

			 	}//END ELSE USERNAME NOT EXISTS

			 }//END ELSE EMAIL NOT REGISTERED		

	}//end if post submit 

	
?>