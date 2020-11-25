<?php 
	include('functions/templates.php');
	include 'config/db.php';
	
	if(!isset($_SESSION['username'])){
		header('Location:login.php');
		exit;
	}
?>

<?php 

	//if post submit then submit the form data into the recipe table 

	$errorMessage=null;


?>




<style type="text/css">
  <?php include 'css/styles.css'; ?>
</style>

<?=head_template('Recipes Here')?>


<body>
	<?=navbar_template()?>

</body>
