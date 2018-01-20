<!DOCTYPE html>
<html>
 <head>
     <meta charset="utf-8" /> 
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Commande</title>
    <link href="bootstrap-3.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.6/dist/css/bootstrap-theme.min.css" rel="stylesheet">
 </head>

  <body>
        <?php
            include("headFourni.php");
            include("menuFourni.php");
            include("db_config.php");
        
       
            if (!isset($_POST['cmdid'])|| !isset($_SESSION['userid']) || !isset($_POST['statut'])) {
                include ("commande_statut.php");
            } else {
                    
                    try {
                        $fournid = $_SESSION['userid'];
                        $cmdid = $_POST['cmdid'];
                        $statut= $_POST['statut'];
    
                        $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
    
                        $SQL = "UPDATE commandes SET statut='$statut' WHERE cmdid='".$cmdid."' AND fournid='".$fournid."'";
                        $st = $db->prepare($SQL);
                        $res = $st->execute(array($statut));

                        if($res) {
                            echo'A ete modifié';
                        }else echo 'Vous n êtes pas autoriser';
                    }
                    catch(Exception $e) {
                        echo 'Echec de la connexion à la base de données';
                        exit();
                    }
                }
            ?>
            <script src="bootstrap-3.3.6/dist/js/jquery-1.12.2.min.js"></script>
            <script src="bootstrap-3.3.6/dist/js/bootstrap.js"></script>
            <script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
    </body>
    <?php include("footer.php"); ?>
</html>