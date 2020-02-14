<div class="position-sticky-top	">
	<nav class="navbar navbar-dark bg-dark" style="background-color: #E3F2FD;">
		<ul class="nav nav-pills">
			<li class="nav-item">
				<div class="nom">
					<a class="nav-link active" href="<?php if(!isset($index)) { echo "../"; } ?>index.php">myLibrary</a>
				</div>
			</li>>
			<li class="nav-item">
				<div>
					<a class="nav-link" href="<?php if(!isset($index)) { echo "../index.php"; } ?>?favoris">Favoris</a>
				</div>''
			</li>
			<li class="nav-item">
				<div>
					<a class="nav-link" href="<?php if(isset($index)){ echo "pages/"; } ?>ajout.php">Ajouter</a>
				</div>
			</li>
			<li class="nav-item">
				<div>
					<a class="nav-link" href="<?php if(isset($index)) { echo "pages/"; } ?>treatment.php?action=logOut" onclick="return(confirm('Voulez vous vraiment vous deconnecter?'))"><i class="fa fa-sign-out"></i>  Log Out</a>
				</div>
			</li>
			<li class="nav-item">				
				<div>
					<a class="nav-link" href="<?php if(!isset($index)) { echo "../"; } ?>index.php"><i class="fa fa-user"></i>  <?php echo $user['Nom']." ".$user['Prenom']; ?></a>
				</div>
			</li>
		</ul>
		<div class="rech-barre">
			<form class="form-inline my-2 my-lg-0" method="post" action="<?php if(isset($index)) { echo 'pages/'; } ?>treatment.php">
				<input type="hidden" name="action" value="search">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyWord">
				<div class="rech-bouton">
					<button class="btn btn-outline-primary " type="submit">Search</button>
				</div>
			</form>
		</div>
	</nav>
</div>