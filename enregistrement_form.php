<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8"/> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Enregistement</title>
    <link href="bootstrap-3.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.6/dist/css/bootstrap-theme.min.css" rel="stylesheet">
</head>
    
<body>
    
    <form action="enregistrement.php" method="post" class="col-lg-6" name="loginform">
        <legend>Enregistrment</legend>
            Nom : <input type="text" name="nom" class="form-control"/>
            Prenom : <input type="text" name="prenom" class="form-control"/>
            Societe : <input type="text" name="societe" class="form-control"/>
            email : <input type="email" name="email" class="form-control"/>
            Login : <input type="text" name="login" class="form-control"/>
            Mot de passe : <input type="password" name="mdp" class="form-control"/>
            Type:
            <select name="type" class="form-control">
                <option>Selectionnez</option>
                <option>client</option>
                <option>fournisseur</option>
            </select>
            <input type="submit" value="Enregistrer" class="btn btn-primary">
            <a href="index.php" class="btn btn-link">Connexion</a> 
     </form>
        <script src="bootstrap-3.3.6/dist/js/jquery-1.12.2.min.js"></script>
        <script src="bootstrap-3.3.6/dist/js/bootstrap.js"></script>
        <script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
</body>
    <?php include("footer.php"); ?>
</html>
    