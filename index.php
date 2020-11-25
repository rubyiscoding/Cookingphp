<?php 
	include('functions/templates.php');

	if(!isset($_SESSION['username'])){
	header('Location:login.php');
	exit;
}

?>

<style type="text/css">
  <?php include 'css/styles.css';?>
</style>

<?=head_template('Ruby is cooking')?>



<body>
<?=navbar_template()?>


<div class="yellowColor">
  <h2>Home</h2>
  <p class="blueColor">Welcome to the home page!</p>
  <p class="greenColor"> This is a welcome page.</p>
</div>

</body>
