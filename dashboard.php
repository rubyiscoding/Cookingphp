<?php 
	include('functions/templates.php');
	include 'config/db.php';
	if(!isset($_SESSION['username']))
	{
		header('Location:login.php');
		exit;
	}
?>


<?php 
	$errorMessage=null;
	$isUserProfileCreated = false;
	$username =$loggedInUser;
	$active = true;
	//get user profile 

	$sql ="SELECT * FROM cookingithruby.users 
			LEFT JOIN cookingithruby.profile 
				ON cookingithruby.users.Id=cookingithruby.profile.UserId 
			WHERE cookingithruby.users.Username ='$username'
				AND cookingithruby.users.IsUserActive= '$active'";

				$sql="select * from cookingwithruby.users left join cookingwithruby.profile on users.Id = profile.UserId where users.IsUserActive= 1 and users.Username='$username'";

	$queryResult = mysqli_query($dbConnection,$sql);
	
	//$sqlRowCount =  mysqli_num_rows($queryResult);

	if($queryResult==null) // no profile -- create profile
	{
		$errorMessage="Cannot retrieve user profile data.You sniffing into my data?";
	}
	else
	{

		//shw profile data 
		$isUserProfileCreated=true;
		$resultRow = mysqli_fetch_assoc($queryResult);


		
		$bio=($resultRow['Bio']!=null)?$queryResult['bio']:null;
		$education=($resultRow['Education']!=null)?$queryResult['Education']:null;
		$address=($resultRow['Address']!=null)?$queryResult['Address']:null;
		$job= !empty($resultRow['Job'])?$queryResult['Job']:null;
		$fullname = !empty($resultRow['Firstname'])?$resultRow['Firstname'] ." " .$resultRow['Lastname']  :"no shit";

	}
	//$errorMessage=$loggedInUser;
	//get user recipe 



?>


<style type="text/css">
  <?php include 'css/styles.css'; ?>
</style>

<?=head_template('Recipes Here')?>


<body>
	<?=navbar_template()?>

	<div class="container">
		<p>Welcome to your dashboard</p>

		<?php if($isUserProfileCreated==false){?>
			<a href="createProfile.php" class="btn btn-primary">Create Profile</a>
		<?php } else {?>
		<!--profile begin-->
			<div class="row">				
				<table class="table table-stripped table-responsive">
					<tbody>
						<tr>
							<td><b>You are</b></td>
							<td><?php echo $fullname ?></td>
							<td><button type="button" class="btn btn-primary"><i class="fa fa-edit"></i>Update</button></td>
						</tr>
						<tr>
							<td><b>About you</b></td>
							<td><?php echo $bio ?></td>
							<?php if(!isset($bio)){ ?>
								<td><button type="button" class="btn btn-Success">Add</button></td>
							<?php }else {?>
								<td><button type="button" class="btn btn-danger">Delete</button></td>
							<?php }?>
						</tr>
						<tr>
							<td><b>ADDERSS</b></td>
							<td><?php echo $address ?></td>
							<?php if(!isset($address)){ ?>
								<td><button type="button" class="btn btn-Success">Add</button></td>
							<?php }else {?>
								<td><button type="button" class="btn btn-danger">Delete</button></td>
							<?php }?>							
						</tr>
						<tr>
							<td><b>EDUCATION</b></td>
							<td><?php echo $education ?></td>
								<?php if(!isset($education)){ ?>
								<td><button type="button" class="btn btn-Success">Add</button></td>
							<?php }else {?>
								<td><button type="button" class="btn btn-danger">Delete</button></td>
							<?php }?>							
						</tr>
						<tr>
							<td><b>JOB</b></td>
							<td><?php echo $job ?></td>
							<?php if(!isset($job)){ ?>
								<td><button type="button" class="btn btn-Success">Add</button></td>
							<?php }else {?>
								<td><button type="button" class="btn btn-danger">Delete</button></td>
							<?php }?>							
						</tr>
					</tbody>
				</table>			
				
			</div>
		<!--profile end-->
		<?php }?>

		<?php echo $errorMessage ?>
		

	</div>

</body>


<style type="text/css">
	table tr:nth-child(2n+1){
		background-color: #f2f2f2;
	}

.table th, .table td {
    padding: 1rem;
    text-align: left;
</style>