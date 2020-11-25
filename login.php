

<?php 
	include('functions/templates.php');
	include 'includes/handlers/loginhandler.php'
?>

<style type="text/css">
  <?php include 'css/styles.css';?>
</style>

<?=head_template('Login')?>



<body>
<?=navbar_template()?>


	<div class="yellowColor">
	  	<p class="blueColor">Welcome to the login page!</p>
		<!--<p class="greenColor"> You already have an account! </p>-->
	</div>

	<div class="container" style="margin-top: 15px;">
		<div class="alert alert-info text-center">
			<p class="text-Uppercase"> Welcome to login page</p>	
		</div>
		<?php if(isset($errorMessage)){?>
		<div class="alert alert-danger">
			<p><?php echo $errorMessage ?></p>
		</div>
		<?php }?>

		<form id="loginForm" method="post">
			<div class="row jumbotron">				
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="form-group">
						<label name= "username"class="control-label col-md-4">Username</label>
						<div class="col-md-8">
							<input type="text" name="username"class="form-control" placeholder="johndoe12">
						</div>			
					</div>
					<div class="form-group">
						<label name= "password"class="control-label col-md-4"> Password</label>
						<div class="col-md-8">
							<input type="password" name="password"class="form-control" >
						</div>	
					</div>	
					<div class="form-group">
						<div class="col-md-8">
							<input type="submit" name="submit" value="Login" class="btn btn-success">
						</div>			
					</div>
				</div>   
				<div class="col-md-3"></div>   		
			

			</div>
		</form>
	</div>


</body>
