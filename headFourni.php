<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Head Fourni</title>
    <link href="bootstrap-3.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.6/dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.6/dist/css/bootstrap.css" rel="stylesheet">
</head>

<body>
     <?php
        session_start();
     ?>
    
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <ul class="nav navbar-nav">
            <li><a href="fournisseur.php">Accueil</a></li>  
            <li class="divider"></li>
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="produitFourni.php.php">Produit<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="ajouter_produit_form.php">Ajout</a></li>  
                    <li><a href="modif_supp.php">Modifier/Supprimer</a></li>
                </ul>
            </li>
            <li class="divider"></li>
            <li> <a href="commande_statut.php">Les commandes</a></li>
          </ul>
                <form class="navbar-form navbar-right inline-form" action= "rechercheFourni.php" method ="post">
                    <div class="form-group">
                        <input type="search" class="input-sm form-control" placeholder="Recherche" name="rech">
                        <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open"></span>Chercher</button>
                        <button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-user"></span><br>Fournisseur <?php echo $_SESSION['userid'] ?></button>
                        <a href="deconnexion.php"class="btn btn-primary" >Deconnexion</a>
                    </div>
                </form>
            </div>
        </nav>
        <script src="bootstrap-3.3.6/dist/js/jquery-1.12.2.min.js"></script>
        
        <script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
    </body>
</html>