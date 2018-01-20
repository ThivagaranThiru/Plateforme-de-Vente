<!DOCTYPE html>
<html>
 <head>
     <meta charset="utf-8" /> 
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <title>Menu</title>
     <link href="bootstrap-3.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="bootstrap-3.3.6/dist/css/bootstrap-theme.min.css" rel="stylesheet">
</head>
     
    <body>
        <?php include("headClient.php");?>
        <?php include("menuClient.php");?>
        <?php include("db_config.php");?>
        
        <div class = "container">
            <div class="row">
                <section class = "table-responsive">
                    <table class = "table table-bordered table-striped table-condensed">
                        <legend>Recherche</legend>
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
                                 try {
                                        $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
                            
                                        if (isset($_GET['catid'])) {
    
                                            $catid = $_GET['catid'];
    
                                            $SQL="SELECT * FROM produits WHERE catid='".$catid."' ORDER BY prodid ASC";
                                            $res=$db->query($SQL);

   
                                            while($row=$res->fetch()){
                            ?>
                                                <tr>
                                                    <td><?php echo $row['prodid'] ?></td>
                                                    <td><?php echo $row['nom'] ?></td>
                                                    <td><?php echo $row['description'] ?></td>
                                                    <td><?php echo $row['qte'] ?></td>
                                                    <td><?php echo $row['prix'] ?></td>
                                                    <td><?php echo $row['catid'] ?></td>
                                                    <td><?php echo $row['fournid'] ?></td>
                                                    <td><a class="btn btn-warning" href="panier_form.php?prodid=<?php echo $row['prodid'] ?>">Acheter</a> </td>
                                                </tr>
                        
                            <?php           }
                                        } else if (isset($_GET['userid'])) {
                                                $fournid= $_GET['userid'];
    
                                                $SQL="SELECT * FROM produits WHERE fournid='".$fournid."' ORDER BY prodid ASC";
                                                $res=$db->query($SQL);

   
                                                while($row=$res->fetch()) {
                            ?>
                                                    <tr>
                                                        <td><?php echo $row['prodid'] ?></td>
                                                        <td><?php echo $row['nom'] ?></td>
                                                        <td><?php echo $row['description'] ?></td>
                                                        <td><?php echo $row['qte'] ?></td>
                                                        <td><?php echo $row['prix'] ?></td>
                                                        <td><?php echo $row['catid'] ?></td>
                                                        <td><?php echo $row['fournid'] ?></td>
                                                        <td><a class="btn btn-warning" href="panier_form.php?prodid=<?php echo $row['prodid'] ?>">Acheter</a> </td>
                                                    </tr>
                        
                            <?php                  }
    
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
            </div>
        </div>  
        <script src="bootstrap-3.3.6/dist/js/jquery-1.12.2.min.js"></script>
        <script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
    </body>
    <?php include("footer.php"); ?>
</html>