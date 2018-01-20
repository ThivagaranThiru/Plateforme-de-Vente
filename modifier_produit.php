<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Modifer un produit</title>
    </head>

    <body>
           <?php
                include("headFourni.php"); 
                include("menuFourni.php"); 
                include("db_config.php");
        
                if (!isset($_SESSION["prodid"])|| !isset($_SESSION['userid'])) {
                    echo "ERREUR, VEUILLEZ RESSAYEZ";
                }
                else {
                        try {
                            $fournid= $_SESSION['userid'];
                            $prodid = $_SESSION["prodid"];
         
                            $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);

                            $SQL = "SELECT * FROM produits WHERE prodid='$prodid' AND fournid='$fournid'";
                            $st = $db->prepare($SQL);
                            $st->execute(array('prodid'=>"$prodid", 'fournid'=>"$fournid"));

                            if ($st->rowCount() ==0) {
                                echo "<p>Erreur dans l'ID Produit ou vous etes pas autoriser</p>\n";
                            }  
         
                            else if (!isset($_SESSION['prodid']) || !isset($_POST['nom']) || !isset($_POST['description']) || !isset($_POST['qte']) || !isset($_POST['prix']) || !isset($_POST['catid']) || !isset($_SESSION['userid'])){
                                    include("modifier_produit_form.php");
                            } 
                            else {
                                    $prodid = trim($_SESSION['prodid']);   
                                    $nom = trim($_POST['nom']);
                                    $description= trim($_POST['description']);
                                    $qte= trim($_POST['qte']);            
                                    $prix= trim($_POST['prix']);
                                    $catid= trim($_POST['catid']);
                                    $fournid= $_SESSION['userid']; 
        
                                    if(empty($prodid)|| empty($nom)|| empty($description)|| empty($qte)|| empty($prix)|| empty($catid)) {
                                        echo "<p>Erreur dans les données\n";
                                        exit();
                                    }            
                                    else{
                                   
                                        $SQL = "UPDATE produits SET nom='$nom',description = '$description', qte='$qte',prix='$prix',catid='$catid' WHERE prodid='$prodid' AND fournid='$fournid'";
                       
                                        $st = $db->prepare($SQL);
                                        $res = $st->execute(array($prodid,$nom,$description,$qte,$prix,$catid,$fournid));

                                        if (!$res)
                                            echo "Erreur de modification pu vous etes pas autorissée\n";
                                        else echo "La modification a été effectué\n";                       
                                    }
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

    