<?php 
	include('functions/templates.php');
	include 'config/db.php';
	if(!isset($_SESSION['username'])){
		header('Location:login.php');
		exit;
	}
	

	//lets create a sql query 
	$sqlQuery = "SELECT * FROM cookingwithruby.recipes ORDER BY id";
	$queryResult = mysqli_query($dbConnection,$sqlQuery);
	
?>


<style type="text/css">
  <?php include 'css/styles.css';?>
</style>

<?=head_template('Recipes Here')?>


<body>
<?=navbar_template()?>

<div id="recipeList" class="jumbotron"> 
	<p class="alert alert-info">Recipes List</p>
	<ul>
		<?php if($queryResult!=null){ foreach ($queryResult as $recipe): ?>	
			<li> <?=$recipe['ID']?>.<a href="recipeDetail.php?recipeID=<?=$recipe['ID']?>"> <?=$recipe['RecipeName']?></a></li>
		<?php endforeach;  }?>
	</ul>
</div>



<?php if($queryResult!=null){ ?>
<p class="text-center">
	<a href="createRecipe.php">Create Receipe
		<i class="fas fa-add fa-xs" style="color:green;"></i>
	</a>
</p>
<table class="table table-stripped table-hover table-condensed">
	<thead>
		<tr style="background-color: gray;">
			<td>ID</td>
			<td>Recipe Name</td>
			<td>Instructions</td>
			<td>Duration</td>
			<td>Category</td>
			<td>Servings</td>
			<td>Created Date</td>
			<td></td>	
		</tr>			
	</thead>
	<tbody>
		<?php  foreach ($queryResult as $recipe): ?>
		<tr>
	        <td><?=$recipe['ID']?></td>
	        <td><?=$recipe['RecipeName']?></td>
	        <td><?=$recipe['Instructions']?></td>
	        <td><?=$recipe['TimeDuration']?></td>
	        <td><?=$recipe['Category']?></td>
	        <td><?=$recipe['Serving']?></td>
	        <td><?=$recipe['CreatedDate']?></td>
	        <td class="actions">
	            <a href="updateRecipe.php?id=<?=$recipe['ID']?>" class="edit">
	            	<i class="fas fa-pen fa-xs" style="color:green;"></i>
	            </a>
	            <a href="deleteRecipe.php?id=<?=$recipe['ID']?>" class="trash">
	            	<i class="fas fa-trash fa-xs" style="color:red;"></i>
	            </a>
	        </td>
        </tr>
            <?php endforeach; ?>
	</tbody>
</table>
<?php } else{?>
	<!--if user is admin they can see this link else jst show no record found-->
	<p class="text-center">
		<a href="createRecipe.php">Create Receipe
			<i class="fas fa-add fa-xs" style="color:green;"></i>
		</a>
	</p>
<?php }?>




<div class="yellowColor">
	<p class="blueColor">Welcome to Recipe page!</p> 
	<p class= "greenColor"> you can view recipes here</p>

</div>
<div class="greyColor">
	<h1> Fruits name</h1>
	<ul>
		<li>Apple</li>
		<li>orange</li>
		<li>banana</li>
		<li>grapes</li>
	</ul>
</div>
</body>

