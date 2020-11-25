<?php 
	include('functions/templates.php');
	include 'includes/handlers/registerhandler.php';

?>


<style type="text/css">
  <?php include 'css/styles.css';?>
</style>

<?=head_template('Register')?>


<body>
	<?=navbar_template()?>

	<div class="container" style="margin-top:20px;">
		<div class="alert alert-info text-center">
			<p class="text-uppercase">Welcome to registration page</p>
		</div>
		
		<!--<?php if(isset($errorMessage)){ ?>--> 
				<div class="alert alert-danger">
					<p class=""><?php echo $errorMessage?></p>
				</div>						
		<!--<?php } ?>-->
		
		<form id="registerForm" method="POST"  > 
			<div class="row">

				<div class="col-md-6">
					<div class="form-group">
						<label name= "firstName"class="control-label col-md-4">First Name</label>
						<div class="col-md-8">
							<input type="text" name="firstName"class="form-control" placeholder="John" required="required">
						</div>	
					</div>		
					
					<div class="form-group">
						<label name= "lastName"class="control-label col-md-4">Last Name</label>
						<div class="col-md-8">
							<input type="text" name="lastName"class="form-control" placeholder="Doe" required="required">
						</div>			
					</div>
					<div class="form-group">
						<label name= "email"class="control-label col-md-4">Email Address</label>
						<div class="col-md-8">
							<input type="text" name="email"class="form-control" placeholder="john.doe@email.com" required="required">
						</div>			
					</div>
				</div>

				<div class="col-md-6">

					<!--<div class="form-group">
						<label name= "userimages"class="control-label col-md-4">Profile Image</label>
						<div class="col-md-8">
							<input type="file" name="userimage"class="form-control" id="userimage" >
						</div>			
					</div>-->

					<div class="form-group">
						<label name= "username"class="control-label col-md-4">Username</label>
						<div class="col-md-8">
							<input type="text" name="username"class="form-control" placeholder="johndoe12" required="required">
						</div>			
					</div>
					<div class="form-group">
						<label name= "password"class="control-label col-md-4"> Password</label>
						<div class="col-md-8">
							<input type="password" name="password"class="form-control" required="required">
						</div>	
					</div>	
					<div class="form-group">
						<div class="col-md-8">
							<input type="submit" name="submit" value="Submit" class="btn btn-success">
						</div>			
					</div>
						
				</div>	
			</div>
		</form>
		
	</div>

</body>
