
<?php 
	include('functions/templates.php');

	if(!isset($_SESSION['username']))
	{
		header('Location:login.php');
		exit;
	}

?>



<style type="text/css">
	<?php include 'css/styles.css';?>
</style>

<?=head_template('Recipes Here')?>


<body>
	<?=navbar_template()?>

</body>