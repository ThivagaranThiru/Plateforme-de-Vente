<!DOCTYPE html>
<html>
    <head>
     <meta charset="utf-8" /> 
     <title>Panier</title>
    </head>
    
    <body>
        <?php include("headClient.php"); ?>
        <?php include("menuClient.php"); ?>
        <?php include("db_config.php"); ?>
      
            <?php  

                if (!isset($_SESSION['prodid']) || !isset($_POST['qte']) ||  !isset($_SESSION['userid'])) {
                    include("panier_form.php");
                }      
                else {                 
                    $prodid = trim($_SESSION['prodid']) ;
                    $clientid= trim($_SESSION['userid']); 
                    $qte = trim($_POST['qte']);
            
                    if (empty($prodid) || empty($qte)){   
                        echo "<p>Vous avez pas saisie la quantité, veuillez réesseayer";
                        exit();
                        include("panier_form.php");
    
                    }
                    else {

                        try {

                            $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
    
                            $SQL1= "SELECT * FROM produits WHERE qte >= '".$qte."' AND prodid = '".$prodid."'";
                            $st1=$db->query($SQL1);
                            $row=$st1->fetch();
        
                            if($row){
        
                                $SQL="INSERT INTO panier (prodid,userid,qte) VALUES('$prodid','$clientid','$qte')";
                                $st=$db->prepare($SQL);
                                $res=$st->execute(array($prodid,$clientid,$qte));

        
                                if ($res){
        
                                    $SQL2 = "UPDATE produits SET qte = qte - '$qte' WHERE prodid='".$prodid."'";    
                                    $st2 = $db->prepare($SQL2);
                                    $res2 = $st2->execute(array($qte));
        
                                    if($res2){
                                        
                                        echo 'Votre produit a été ajouter dans votre panier. N oublier pas de valider vos achats dans la section "Panier".'; 
                                    }else echo 'Nous n avons pas pus modifier'; 
          
                                } else {
        
                                        echo'Nous rencontrons un problème, Veuillez nous exuser.';
            
                                }
        
                            } else echo'La quantité est trop élèvé';
        
                            $db=null;
                        }

                        catch(Exception $e) {
                            echo 'Echec de la connexion à la base de données';
                            exit();
                        }
                    }
                }
            ?>      
    </body>
    <?php include("footer.php"); ?>
</html>