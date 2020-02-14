<?php
	session_start();
	if(!isset($_GET['allow']))
	{
		// header('Location:../index.php');
	}
	require '../include/function.php';
	require '../include/connect.php';
	$BookId=$_GET['see'];
	bookExistsById($BookId);
	$book=getBookById($BookId);
	$ctgrList=getCtgrList();
	$user=$_SESSION['actifUser'];
?>
<!DOCTYPE html>
<html>
<head>
	<?php include '../include/head.php'; ?>
	<title>Details du livre</title>
</head>
<body class="b">
	<?php include 'header.php'; ?>
	<div class="ajj">
		<div class="shadow-lg p-3 mb-5 bg-white rounded" id="formulaire">
			<form id="ajouterlivre" action="treatment.php" method="post">
				<input type="hidden" name="action" value="detailsControl">
				<input type="hidden" name="BookId" value="<?php echo $BookId; ?>">
				<div class="form-group col-md-6">
					<div class="form-row">   
						<input type="text" class="form-control" id="titredulivre" name="BookTitle" placeholder="Titre du livre" value="<?php echo $book['BookTitle']; ?>">
					</div>
				</div>
				<div class="form-group col-md-6">
					<div class="form-row">   
						<input type="text" class="form-control" id="auteurdulivre" name="Autor" placeholder="Nom de l'auteur" value="<?php echo $book['Autor']; ?>">
					</div>
				</div>
				<div class="input-group mb-3" id="categorielivre">
					<select class="custom-select" name="Categorie">
<?php
						for($i=0;$i<count($ctgrList);$i++)
						{
?>
							<option value="<?php echo $ctgrList[$i]; ?>" <?php if($ctgrList[$i]==$book['Categorie']) { ?> selected <?php } ?> ><?php echo $ctgrList[$i]; ?></option>
<?php
						}
?>
					</select>
				</div>
				<div class="zonetext mb-2">
					<textarea class="form-control" id="resumedulivre" name="Resume" placeholder="Résumé du livre"><?php echo $book['Resume']; ?></textarea>
				</div>
				<div id="favoris">
					<a href="treatment.php?action=favoris&bookId=<?php echo $book['BookId']; ?>&userId=<?php echo $user['UserId']; ?>" <?php if(isFavorite($book['BookId'],$user['UserId'])) { ?> style="color:red;" <?php } ?> ><i class="fa fa-star" style="margin-left: 20px;"></i> Favoris</a>
				</div>
				<div id="favoris">
					<a href="../ressources/<?php echo $book['Reference']; ?>.pdf"><i class="fa fa-eye" style="margin-left: 20px;"></i> Lire</a>
				</div>
				<div class="groupebtn pt-4">
					<div class="form-row">
						<div class="form-group col-md-3">
							<a id="retour" type="button" class="nav-link" href="../index.php">Retour</a>
						</div>
						<div class="form-group col-md-3">
							<button id="modifier" class="btn btn-primary" name="control" value="edit">Modifier</button>
						</div>
						<div class="form-group col-md-2">
							<button  id="supprimer" class="btn btn-danger" name="control" value="delete" onclick="confirm('Voulez vous vraiment retirer <?php echo $book['BookTitle']; ?> parmis les livres du site ?')">Supprimer</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php include '../include/ending.php'; ?>
</body>
</html>