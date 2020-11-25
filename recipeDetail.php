<?php 
include 'config/db.php';
include 'functions/templates.php';

if(!isset($_SESSION['username'])){
	header('Location:login.php');
	exit;
}


// Check if the recipe id exists, for example recipeDetail.php?recipeID=1 will get the recipe with the id of 1

$errorMessage="";
if (isset($_GET['recipeID'])) 
{	
	
		$ID =isset($_GET['recipeID']) ? $_GET['recipeID'] : NULL;


		if ($ID==NULL) {
			//SHOW ERROR
			$errorMessage="You have entered Null Id for the recipe Id. Please refresh the page and try again later.";
		}
		else
		{	
			$sqlQuery="SELECT * FROM cookingwithruby.recipes where ID='$ID'"; 
			$sqlResult = mysqli_query($dbConnection,$sqlQuery);		

			$sqlRowCount =  mysqli_num_rows($sqlResult);

			if($sqlRowCount< 0) 
			{
				$errorMessage= "No record found for the provided Recipe ID.";				
			}	
			else{ 
				$result =mysqli_fetch_assoc($sqlResult);						
				$recipeName = $result['RecipeName'];
				$recipeInstruction= $result['Instructions'];
				$duration = $result['TimeDuration'];
				$serving = $result['Serving'];
				$category = $result['Category'];
				$createdDate = $result['CreatedDate'];
			}		
		}	
}
else{
	$errorMessage= "this is no get";
}
?>

<style type="text/css">
  <?php include 'css/styles.css'; ?>
</style>

<?=head_template('Recipes Here')?>


<body>
<?=navbar_template()?>


<?php if($errorMessage!=null){ ?>
	
		<div class="alert alert-danger">
			<p><?=$errorMessage?> </p>			
		</div>

<?php } else{ ?>	
	

	<div class="container">
		<div class="alert alert-info"> 
			<h4 class="text-center">Reciepe Detail for <?= $recipeName?></h4>
		</div>		

		<div class="row">
			<ul>
				<li>Recipe Name: <?= $recipeName?></li>
				<li>Instructions: <?= $recipeInstruction?></li>
				<li>Time duration :<?= $duration?></li>
				<li>Serving for : <?= $serving?></li>	
				<li>category : <?= $category?></li>
				<li>Date Created : <?= $createdDate?></li>
				

			</ul>		
		</div>

	</div>

<?php } ?>


</body>



