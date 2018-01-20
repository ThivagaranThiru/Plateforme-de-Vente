<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" /> 
    <title>Ajouter un produit</title>
  </head>
    
<body>     
    <?php 
       
           
       include("headFourni.php");
       include("menuFourni.php");
       include("db_config.php");
        
        if (!isset($_POST['nom']) || !isset($_POST['description']) || !isset($_POST['qte']) || !isset($_POST['prix']) || !isset($_POST['catid']) || !isset($_SESSION['userid'])) {
            include("ajouter_produit_form.php");
        }
    
        else { 
            $nom = trim($_POST['nom']);
            $description= trim($_POST['description']);
            $qte= trim($_POST['qte']);
            $prix= trim($_POST['prix']);
            $catid= trim($_POST['catid']);
            $fournid= trim($_SESSION['userid']); 
      
            if (empty($nom)|| empty($description)|| empty($qte)|| empty($prix)|| empty($catid)){
                echo "<p>Vous n'avez pas remplit tous les champs. Veuillez ressayer.\n";
                exit();  
            }
            else {
                try {

                    $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
        
                    $SQL="SELECT * FROM users INNER JOIN categories WHERE userid = '".$fournid."' AND catid ='".$catid."'";
    
                    $st = $db->prepare($SQL);
                    $st->execute();
                    $count = $st->rowCount();
                    $data = $st->fetch();
        
                    if ($count == 1 && $data['type'] == 'fournisseur'){
       
                        $SQL="INSERT INTO produits (nom,description,qte,prix,catid,fournid) VALUES('$nom','$description','$qte','$prix','$catid','$fournid')";
                        $st=$db->prepare($SQL);
                        $res=$st->execute(array($nom,$description,$qte,$prix,$catid,$fournid));

        
                        if (!$res){
                            echo "Erreur d’ajout\n";
                        }
                        else{ echo "L'ajout a été effectué\n";
                        }
        
                    $db=null;
                        
                    } else echo 'vous avez mal choisi la catégorie';
                }
 
                catch(Exception $e){
                    echo 'Echec de la connexion à la base de données';
                    exit();
                }
            }
        }
    ?>   
    
    </body>
    <?php include("footer.php") ?>
</html>