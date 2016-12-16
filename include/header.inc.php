<?php 
	include 'include/connexion.inc.php';
	include 'class/class.gsb.inc.php';
	include 'class/class.fonction.inc.php';
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
    	<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="Pratt - Free Bootstrap 3 Theme">
	    <meta name="author" content="Alvarez.is - BlackTie.co">
	    <link rel="shortcut icon" href="ico/favicon.png">

	    <title>PPE GSB</title>

	    <!-- Bootstrap core CSS -->
	    <link href="css/bootstrap.css" rel="stylesheet">

	    <!-- Custom styles for this template -->
	    <link href="css/main.css" rel="stylesheet">
	    
	    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
	    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
	    
	    <script src="js/jquery.min.js"></script>
	    <script src="js/smoothscroll.js"></script>
    

	</head>

	<body data-spy="scroll" data-offset="0" data-target="#navigation">
	 	<!-- Fixed navbar -->
		<div id="navigation" class="navbar navbar-default navbar-fixed-top">
		      <div class="container">
		        <div class="navbar-header">
		          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		          <a class="navbar-brand" href="index.php"><img src="./img/gsb.png" name="logo" /></a>
		        </div>
		        <div class="navbar-collapse collapse">
		          	<ul class="nav navbar-nav">
			            <li><a href="contact.php">Contact</a></li>
			        </ul>    
			        <ul class ="nav navbar-nav navbar-right">	
			            <?php
			            	if (!isset($_SESSION['matricule'])) 
			            	{
			           	?>	

		     
		            	<li><a href="connexion.php">Connexion</a></li>
			        	<?php 
			        		}
			        	else 
			        		{
			        	?>	
			        		<li><a href="utilisateur.php">Profil</a>
			        		<li><a href="remboursement.php">Remboursement</a></li>
		        			<li><a href="deconnexion.php">Deconnexion</a></li>
			        	<?php 
			        		} 
			        	?>
		          	</ul>
		        </div><!--/.nav-collapse -->
		      </div>
		    </div>

<?php if(isset($_SESSION['msg'])) { ?>
	<div id='leMessage' class='alert alert-dismissable alert-info'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		<p><?php echo $_SESSION['msg']; ?></p>
	</div>
<?php
	unset($_SESSION['msg']); 
}
?>