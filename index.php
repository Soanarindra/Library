<?php
	session_start();
	require 'include/function.php';
	require 'include/connect.php';
	isConnected();
	$user=$_SESSION['actifUser'];
	$index=true;
	$ctgrList=getCtgrList();
	$book=getBook();
	if(isset($_GET['search']) && isset($_SESSION['searchResult']))
	{
		$book=$_SESSION['searchResult'];
	}
	if(isset($_GET['autor']))
	{
		$book=getBookWritenBy($_GET['autor']);
	}
	if(isset($_GET['favoris']))
	{
		$book=getFavoriteBook($user);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'include/head.php'; ?>
	<title>myLibrary</title>
</head>
<body>
	<?php include 'pages/header.php'; ?>
	<div>
		<div class="fluid-container">
			<div class="row">
				<div class="col-md-10 offset-md-1 bookList">
					<table class="table">
						<thead>
							<tr>
								<th>Titre</th>
								<th>Auteur</th>
								 <th>Categorie</th>
								<th>Résumé</th>
							</tr>
						</thead>
						<tbody>
<?php
							for($i=0;$i<count($book);$i++)
							{
?>
								<tr>
									<td><a href="pages/details.php?allow=true&see=<?php echo $book[$i]['BookId']; ?>"><?php echo $book[$i]['BookTitle']; ?></a></td>
									<td><a href="?autor=<?php echo $book[$i]['Autor']; ?>"><?php echo $book[$i]['Autor']; ?></a></td>
									<td><strong><?php echo $book[$i]['Categorie']; ?></strong></td>
									<td class="w-50"><?php echo $book[$i]['Resume']; ?></td>
								</tr>
								<!-- la troisième forme normale -->
<?php
							}
?>
						</tbody>
					</table>
				</div>
			</div>
		</div> 
	</div>
	<?php include 'include/ending.php'; ?>
</body>
</html>
<?php
	if(isset($_GET['autor']))
	{
		unset($_GET['autor']);
	}
?>