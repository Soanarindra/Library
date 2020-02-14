<?php
	session_start();
	require '../include/function.php';
	require '../include/connect.php';
	$ctgrList=getCtgrList();
	$user=$_SESSION['actifUser'];
?>
<!DOCTYPE html>
<html>
<head>
	<?php include '../include/head.php'; ?>
	<title>Ajouter un livre</title>
</head>
<body class="b">
	<?php include 'header.php'; ?>
	<div class="ajj">
		<div class="shadow-lg p-3 mb-5 bg-white rounded" id="formulaire">
			<form id="ajouterlivre" action="treatment.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="action" value="ajout">
				<div class="form-group col-md-6">
					<div class="form-row">   
						<input type="text" class="form-control" id="titredulivre" placeholder="Titre du livre" name="BookTitle" required>
					</div>
				</div>
				<div class="form-group col-md-6">
					<div class="form-row">   
						<input type="text" class="form-control" id="auteurdulivre" placeholder="Nom de l'auteur" name="Autor" required>
					</div>
				</div>
				<div class="form-group mb-3" id="categorielivre">
					<select class="custom-select" name="Categorie" required>
						<option selected>Catégories</option>
<?php
						for($i=0;$i<count($ctgrList);$i++)
						{
?>
							<option value="<?php echo $ctgrList[$i]; ?>"><?php echo $ctgrList[$i]; ?></option>
<?php
						}
?>
					</select>
				</div>
				<div class="zonetext">
					<textarea class="form-control" id="resumedulivre" placeholder="Résumé du livre" name="Resume"></textarea required>
				</div>
				<div class="input-group mb-3" id="uploadfile">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="book" required>
						<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
					</div>
				</div>
				<button id="ajouter" class="btn btn-success">Ajouter</button>
			</form>
		</div>
	</div>
	<?php include '../include/ending.php'; ?>
</body>
</html>