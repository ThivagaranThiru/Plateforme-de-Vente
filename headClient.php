<!DOCTYPE html>
<html>
 <head>
     <meta charset="utf-8" /> 
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="viewport" content="width=device-width, initial-scale=1">

<title>Head Client</title>
    <link href="bootstrap-3.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.6/dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.6/dist/css/bootstrap.css" rel="stylesheet">
</head>
    
    <body>
        <?php session_start(); ?>
            
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li><a href="client.php">Accueil</a></li>  
                        <li><a href="produitClient.php">Produit</a></li>
                        <li><a href="mescommandes.php">Mes commandes</a></li>
                    </ul>
                 <form class="navbar-form navbar-right inline-form" action= "rechercheClient.php" method ="post">
                    <div class="form-group">
                        <input type="search" class="input-sm form-control" placeholder="Recherche" name="rech">
                        <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open"></span> Chercher</button>
                        <a href="panier_affich.php" class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-shopping-cart"></span><br>Panier</a>  
                        <button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-user"></span><br>Client <?php echo $_SESSION['userid'] ?></button>
                        <a href="deconnexion.php"class="btn btn-primary" >Deconnexion</a>
                    </div>
                </form>
            </div>
        </nav>
        <script src="bootstrap-3.3.6/dist/js/jquery-1.12.2.min.js"></script>
        <script src="bootstrap-3.3.6/dist/js/bootstrap.js"></script>
        <script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
    </body>
</html>