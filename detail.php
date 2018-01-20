<!DOCTYPE html>
<html>
 <head>
     <meta charset="utf-8" /> 
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="viewport" content="width=device-width, initial-scale=1">

<title>Détail du produit</title>
    <link href="bootstrap-3.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.6/dist/css/bootstrap-theme.min.css" rel="stylesheet">
</head>
    
    <body>
        <?php include("panier_affich.php");?>
        <?php include("db_config.php");?>
        
        <div class = "col-lg-2"> 
            <div class = "row" >
                <aside class = "col-lg-2">
                     <section class = "table-responsive">
                         <table class = "table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                             <th>Prodid</th>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>qte</th>
                                <th>prix</th>
                                <th>catid</th>
                               <th>fournid</th>
                            </tr>
                        </thead>
                            <tbody>
                                Le produit :
                                    <?php 
                                        if (!isset($_GET['prodid'])) {
                                            echo "<p>Erreur1</p>\n";
                                        }
                                        else{
                                            $_SESSION['prodid'] = $_GET['prodid'];
                                            try {
  
                                                $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
    
                                                $prodid  = $_SESSION['prodid'];
    
                                                $SQL="SELECT * FROM produits WHERE prodid='".$prodid."'";
                                                $res=$db->prepare($SQL);
                                                $res->execute();

                                                while($row=$res->fetch()){
                                    ?>
                                                    <tr>
                                                        <td><?php echo $row['prodid'] ?></td>
                                                        <td><?php echo $row['nom'] ?></td>
                                                        <td><?php echo $row['description'] ?></td>
                                                        <td><?php echo $row['qte'] ?></td>
                                                        <td><?php echo $row['prix'] ?></td>
                                                        <td><?php echo $row['catid'] ?></td>
                                                        <td><?php echo $row['fournid'] ?> </td>
                                                    </tr>
      
                                    <?php
                                                }
                                            }
                                            catch(Exception $e) {
                                                echo 'Echec de la connexion à la base de données';
                                                exit();
                                            }
                                        }
                                    ?>
                            </tbody>
                         </table>
                    </section>
                </aside>
            </div>
        </div>
        <script src="bootstrap-3.3.6/dist/js/jquery-1.12.2.min.js"></script>
        <script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
    </body>
</html>