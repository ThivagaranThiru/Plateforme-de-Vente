<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8"/>
        <title>Supprimer un produit</title>
    </head>

    <body>
        <?php
            include("headFourni.php"); 
            include("menuFourni.php"); 
            include("db_config.php");
        
            if (!isset($_GET['prodid']) || !isset($_SESSION['userid'])) {
                echo "<p>Erreur</p>\n";
            }
        
            else{
                try{
                    $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
           
                    $prodid  = $_GET['prodid'];
                    $fournid= $_SESSION['userid'];
            
                    $SQL = "DELETE FROM produits WHERE prodid='".$prodid."' AND fournid='".$fournid."'";

                    $st = $db->prepare($SQL);
                    $res = $st->execute(array('prodid'=>"$prodid", 'fournid'=>"$fournid"));
    
                    if (!$res){
                        echo 'Erreur de suppresion ou vous n etez pas autorisée.';}
                    else {
                        echo 'La suppression a été effectué.';
                    }
                }
                catch(Exception $e) {
                    echo 'Echec de la connexion à la base de données';
                    exit();
                }
            }
        ?>
    </body>
    <?php include("footer.php"); ?>
</html>
