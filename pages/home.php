<?php
	session_start();
	include '../include/connect.php';
	include '../include/function.php';
	isConnected_home();
	$feedBack=null;
	if(isset($_SESSION['feedBack']))
	{
		$feedBack=$_SESSION['feedBack'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<?php include '../include/head.php'; ?>
	<title>Log-in</title>
</head>
<body class="b">
	<nav class="navbar navbar-dark bg-dark">
		<form method="post" action="treatment.php">
			<input type="hidden" name="action" value="logIn">
			<div class="form-row align-items-center">
				<div class="col-auto" id="soratra" style="margin-right: 540px;">
					<label for="inlineFormInput" style="font-family: MT script blod;font-style: italic;font-size: 200%;color: rgb(255,255,255);">myLibrary</label>
				</div>
				<div class="col-auto">
					<label class="sr-only" for="inlineFormInput">Name</label>
					<input type="email" class="form-control mb-2" id="inlineFormInput" placeholder="E-mail" name="email" required <?php if(isset($_GET['logInFailed'])) { ?> style="border-color: red; background-color: #ef89d8;" <?php } ?> >
				</div>
				<div class="col-auto">
					<label class="sr-only" for="inlineFormInput">Password</label>
					<input type="password" class="form-control mb-2" id="exampleInputPassword1" placeholder="Password" name="password" required <?php if(isset($_GET['logInFailed'])) { ?> style="border-color: red; background-color: #ef89d8;" <?php } ?> >
				</div>
				<div class="col-auto">
					<!-- <div class="form-check mb-2">
						<input class="form-check-input" type="checkbox" id="autoSizingCheck">
						<label class="form-check-label" for="autoSizingCheck" style="color: rgb(255,255,255);">
							Remember me
						</label>
					</div> -->
				</div>
				<div class="col-auto">
					<button type="submit" class="btn btn-outline-primary mb-2">Log In</button>
				</div>
			</div>
		</form>
	</nav>

	<div class="main">
		<div class="signInForm" style="width: 1800px; border-color: rgb(67,45,255);">
			<form style="margin-left: 400px;margin-top: 50px;" method="post" action="treatment.php">
				<input type="hidden" name="action" value="signIn">
				<div class="form-row">
					<div class="form-group col-md-2" style="margin-left: 16px;">
						<label for="inputFirstName4">Prénom</label>
						<input type="text" class="form-control" id="inputFirstName4" placeholder="Prenom" name="prenom" required <?php if($feedBack!=null && !isset($_GET['username_used'])) { ?>value="<?php echo $feedBack['prenom']; ?>"<?php } ?> >
						<label class="input <?php if($feedBack!=null && isset($_GET['username_used'])) { echo 'error'; } ?>">Nom d'utilisateur deja pris </label>
					</div>
					<div class="form-group col-md-3" style="margin-right: ">
						<label for="inputLastName4">Nom</label>
						<input type="text" class="form-control" id="inputLastName4" placeholder="Nom" name="nom" required <?php if($feedBack!=null && !isset($_GET['username_used'])) { ?>value="<?php echo $feedBack['nom']; ?>"<?php } ?> >
					</div>
				</div>
				<div class="form-group col-md-4">
					<label for="inputEmail4">Email</label>
					<input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" required <?php if($feedBack!=null && !isset($_GET['email_used'])) { ?>value="<?php echo $feedBack['email']; ?>"<?php } ?> >
					<label class="input <?php if($feedBack!=null && isset($_GET['email_used'])) { echo 'error'; } ?>">Email deja utiliser</label>
				</div>
				<div class="form-group col-md-4">
					<label for="inputPassword4">Mot de passe</label>
					<input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password" required>
					<!-- <small id="passwordHelpInline" class="text-muted">Must be 8-20 characters long</small> -->
					<label class="input <?php if($feedBack!=null && isset($_GET['password_length'])) { echo 'error'; } ?>">Mot de passe trop court</label>
				</div>
				<div class="form-group col-md-4">
					<label for="inputConfirmPassword4">Confirmer Mot de passe</label>
					<input type="password" class="form-control" id="inputPassword4" placeholder="Confirm Password" name="passwordConfirm" required>
					<label class="input <?php if($feedBack!=null && isset($_GET['password_no_match'])) { echo 'error'; } ?>">Mot de passe different</label>
				</div>
				<button style="margin-left: 16px" type="submit" class="btn btn-primary">Sign in</button>
			</form>
		</div>
	</div>
	<?php include '../include/ending.php'; ?>
</body>
</html>
<?php
	if(isset($_SESSION['feedBack']))
	{
		unset($_SESSION['feedBack']);
	}
?>