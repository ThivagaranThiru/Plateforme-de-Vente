<!DOCTYPE html>
<html>
 <head>
     <meta charset="utf-8" /> 
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <title>Connexion</title>
     <link href="bootstrap-3.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="bootstrap-3.3.6/dist/css/bootstrap-theme.min.css" rel="stylesheet">
</head>
    
<body>

    <form method="post" action="authentification.php" name="loginform" class="col-sm-6">
        <legend>Connexion</legend>
            Login : <input type="text" name="login" class="form-control">
            Mot de passe : <input type="password" name="mdp" class="form-control">
            <input class="btn btn-primary" type="submit" value="Se connecter"> 
            <a href="enregistrement.php" class="btn btn-link">S'enregistrer</a>  
    </form>
        
    <script src="bootstrap-3.3.6/dist/js/jquery-1.12.2.min.js"></script>
    <script src="bootstrap-3.3.6/dist/js/bootstrap.js"></script>
    <script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
</body>
    <?php include("footer.php"); ?>
</html>