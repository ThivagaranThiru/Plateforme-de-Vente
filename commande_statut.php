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
        <?php include("headFourni.php"); ?>
        <?php include("menuFourni.php");?>
        <?php include("db_config.php"); ?>
        
        <div class = "col-lg-7"> 
            <form action="commande_modiff.php" method="post" name="commandeaffich">
                <legend>Les commandes </legend>
                    Cmdid: <input type="number" name="cmdid" class="form-control"/>
                    Statut: 
                            <select name="statut" class="form-control">
                                <option>Selectionnez</option>
                                <option>acceptee</option>
                                <option>refusee</option>
                            </select>
                <input type="submit" name="modifier" value="Modifier" class="btn btn-primary">
            </form>
            <br>
            <Legend>Detail</Legend>
                <h3> Panier :</h3>
                    <section class = "table-responsive">
                        <table class = "table table-bordered table-striped table-condensed">
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
                                    if (!isset($_GET['pid'])) {
                                        echo "<p>Cliquer sur Détail pour voir le détail de votre commande</p>\n";
                                    }
                                    else{
                                    $_SESSION['pid'] = $_GET['pid'];
                                        try {
  
                                            $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
    
                                            $pid  = $_SESSION['pid'];
                                            
                                            $SQL="SELECT * FROM panier WHERE pid='".$pid."'";
                                            $res=$db->prepare($SQL);
                                            $res->execute();

                                            while($row=$res->fetch()){ ?>
                                                <tr>
                                                    <td><?php echo $row['pid'] ?></td>
                                                    <td><?php echo $row['prodid'] ?></td>
                                                    <td><?php echo $row['userid'] ?></td>
                                                    <td><?php echo $row['qte'] ?></td>
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
            
                <h3> Produit :</h3>
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
                                        echo "<p>Cliquer sur Détail pour voir le détail de votre commande</p>\n";
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
                </div>
        
                <div class = "col-lg-3"> 
                    <div class = "row" >
                        <aside class = "col-lg-12">
                            <section class = "table-responsive">
                                <table class = "table table-bordered table-striped table-condensed">
                                    <thead>
                                            <tr>
                                                <th>Cmdid</th>
                                                <th>Pid</th>
                                                <th>Fournid</th>
                                                <th>statut</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                    Le produit :
                            <?php      
                                try {
    
                                    $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
    
                                    $userid= $_SESSION['userid'];
    
                                    $SQL="SELECT commandes.cmdid,commandes.pid,commandes.fournid,commandes.statut,panier.prodid FROM commandes INNER JOIN panier WHERE panier.pid = commandes.pid ORDER BY commandes.cmdid ASC ";
                                    $res=$db->prepare($SQL);
                                    $res->execute();

                                    while($row=$res->fetch()){
                            ?>
                                        <tr>
                                            <td><?php echo $row['cmdid'] ?></td>
                                            <td> <?php echo $row['pid'] ?></td>
                                            <td><?php echo $row['fournid'] ?></td>
                                            <td><?php echo $row['statut'] ?></td>
                                            <td><a class="btn btn-success" href="commande_statut.php?pid=<?php echo $row['pid']?> &            prodid=<?php echo $row['prodid']?>">Detail</a> </td>
                                        </tr>
                            <?php
                                    }
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
        </div>
    </div>
        <script src="bootstrap-3.3.6/dist/js/jquery-1.12.2.min.js"></script>
        <script src="bootstrap-3.3.6/dist/js/bootstrap.js"></script>
        <script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
    </body>
<?php include("footer.php"); ?>
</html>