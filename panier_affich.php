<!DOCTYPE html>
<html>
 <head>
     <meta charset="utf-8" /> 
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Panier</title>
    <link href="bootstrap-3.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.6/dist/css/bootstrap-theme.min.css" rel="stylesheet">
</head>
    
    <body>
        <?php include("headClient.php");?>
        <?php include("menuClient.php");?>
        <?php include("db_config.php");?>
        
          <div class="containr">  
            <div class="col-lg-6">
                <div class = "row" >
                    <aside class = "col-lg-12">
                        <section class = "table-responsive">
                            <table class = "table table-bordered table-striped table-condensed">
                                <legend>Panier</legend>
                                    <thead>
                                        <tr>
                                            <th>Pid</th>
                                            <th>Prodid</th>
                                            <th>userid</th>
                                            <th>qte</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php      
                                            try {
    
                                                $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
    
                                                $clientid= trim($_SESSION['userid']);
    
                                                $SQL="SELECT * FROM panier WHERE userid = '".$clientid."' AND (panier.pid NOT IN (SELECT commandes.pid FROM commandes)) ORDER BY pid ASC";
    
                                                $res=$db->query($SQL);

   
                                                while($row=$res->fetch()){
                                        ?>
                                                    <tr>
                                                        <td><?php echo $row['pid'] ?></td>
                                                        <td><?php echo $row['prodid'] ?></td>
                                                        <td><?php echo $row['userid'] ?></td>
                                                        <td><?php echo $row['qte'] ?></td>
                                                        <td><a class="btn btn-success" href="panier_affich.php?prodid=<?php echo $row['prodid'] ?>">Detail</a> </td>
                                                    </tr>
                        
                                        <?php  }
                                            }
    
                                            catch(Exception $e) {
                                                echo 'Echec de la connexion à la base de données';
                                                exit();
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </section>
                    </aside>
                      <form action="commande_ajout.php" method="post" name="ajoutform" class="col-lg-6">
                      <input type="submit" name="valider" value="Valider" class="btn btn-primary"></form>
                </div>
            </div> 
        </div>
        
        <div class = "col-lg-4"> 
            <div class = "row" >
               <aside class = "col-lg-12">
                   <Legend>Detail</Legend>
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
                                    <?php 
                                        if (!isset($_GET['prodid'])) {
                                            echo "<p>Cliquer sur Détail pour voir le produit commander dans le panier</p>\n";
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
        <script src="bootstrap-3.3.6/dist/js/bootstrap.js"></script>
        <script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
   </body>
    <?php include("footer.php"); ?>
</html>