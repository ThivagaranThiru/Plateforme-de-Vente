<!DOCTYPE html>
<html>
 <head>
     <meta charset="utf-8" /> 
     
     <title>Commande</title>
</head>
    
 <body>
    <?php include("headClient.php");?>
    <?php  include("menuClient.php"); ?>
    <?php  include("db_config.php"); ?>
        
        <?php 
        
            if (!isset($_POST["valider"])){
                include("panier_affich.php");
            } 
            else if (!isset($_SESSION['userid'])) {
                echo "<p>Erreur</p>\n";
                }        
                else{
                    
                    try {  
        
                        $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
        
                        $clientid= $_SESSION['userid'];
        
                        $SQL2="INSERT INTO commandes (pid,fournid) SELECT panier.pid,produits.fournid FROM panier INNER JOIN produits WHERE panier.prodid = produits.prodid AND panier.userid = '".$clientid."' AND (panier.pid NOT IN (SELECT commandes.pid FROM commandes))";
        
                        $st2=$db->prepare($SQL2);
                        $res2=$st2->execute();
            
                        if($res2){
                            echo'Merci de votre achat';     
                 
                        }else { 
                            echo'Nous rencontrons un problème';
                        }
            
                    }
                    catch(Exception $e){
                        echo 'Echec de la connexion à la base de données';
                        exit();
                    }
                }
            ?>
    </body>
    <?php include("footer.php"); ?>
</html>