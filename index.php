<?php 
require_once 'init.php';
use EntityGenerator\Database\DatabaseRepository;

$databaseRepository = new DatabaseRepository($connection);
$databases = $databaseRepository->getDatabases($connection);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Entity Generator</title>
	<link rel="stylesheet" href="EntityGenerator/assets/css/bootstrap/bootstrap.min.css" />
	<link rel="stylesheet" href="EntityGenerator/assets/css/sumoselect/sumoselect.css" />
	<script src="EntityGenerator/assets/js/jquery2_1_1.js"></script>
	<script src="EntityGenerator/assets/js/bootstrap/bootstrap.min.js"></script>
	<script src="EntityGenerator/assets/js/sumoselect/jquery.sumoselect.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-success">Entity Generator</h1>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-9">
				<?php
					if(isset($_GET['error'])){
						echo '<div class="alert alert-danger">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  	'.$_GET['error'].'
						</div>';
					}

					if(isset($_GET['success'])){
						echo '<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  	<strong>Success!</strong> '.$_GET['success'].'
						</div>';
					}
				?>
			</div>
		</div>
		<form action="generateEntities.php" method="POST">
			<div class="row">
				<div class="col-md-4">
					<label for="database">Select Dabases <span class="text-danger">*</span></label>
					<select name="database" id="database" class="form-control" required="required">
						<?php
						foreach($databases as $database){
						?>
						<option value="<?php echo $database->Database; ?>"> <?php echo $database->Database; ?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="col-md-4 col-md-offset-1">
					<label for="tables">Select Tables <span class="text-danger">*</span> <small class="tableLoading text-info"></small></label>
					<select name="tables" id="tables" class="form-control" multiple="multiple" required="required">
						
					</select>
				</div>
			</div>
			<br /><br />
			<div class="row">
				<div class="col-md-12">
					<input type="submit" value="Generate Entities" class="btn btn-success">
				</div>
			</div>
		</form>
	</div>
	<script>
		$(document).ready(function(){
			$('#database').SumoSelect({
				search: true, 
				searchText: 'Search Database Name'
			});

			$('#tables').SumoSelect({
				search: true, 
				searchText: 'Search Tables Name',
				selectAll: true,
				outputAsCSV : true,
				csvSepChar: ','
			});	
		});
	</script>
	<script src="EntityGenerator/assets/js/getTablesByDatabase.js"></script>
</body>
</html>
