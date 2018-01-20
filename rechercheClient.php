<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" /> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <title>Rechercher</title>
        <link href="bootstrap-3.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap-3.3.6/dist/css/bootstrap-theme.min.css" rel="stylesheet">
    </head>
    <body>

       <?php  
        include("db_config.php");
            if (!isset($_POST['rech'])) {
                include("client.php");
            } 
            else {
                $rech = trim($_POST['rech']);

                    if (empty($rech)) {
                        include("client.php");
                        exit();
                    }
                    else{
                        include("headClient.php");
                        include("menuClient.php"); ?> 
                        
                            <div class = "col-lg-10">
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
       
                            $SQL="SELECT produits.prodid,produits.nom,produits.description,produits.qte,produits.prix,produits.catid,produits.fournid FROM produits INNER JOIN categories WHERE  categories.nom = '".$rech."' AND categories.catid=produits.catid";
                            $st = $db->prepare($SQL);
                            $st->execute();
                            $res3 = $db -> query($SQL);
                            $count = $st->rowCount();
        
                            if ($count == 0 ){
        
                            $SQL1="SELECT produits.prodid,produits.nom,produits.description,produits.qte,produits.prix,produits.catid,produits.fournid FROM produits INNER JOIN users WHERE  users.nom = '".$rech."' AND users.userid=produits.fournid";
        
                            $st1 = $db->prepare($SQL1);
                            $st1->execute();
                            $res = $db -> query($SQL1);
                            $count1 = $st1->rowCount();
    
                                if ($count1 != 0 ){
            
                                    while($row1 = $res->fetch()){
                        ?>
                                        <tr>
                                            <td><?php echo $row1['prodid'] ?></td>
                                            <td><?php echo $row1['nom'] ?></td>
                                            <td><?php echo $row1['description'] ?></td>
                                            <td><?php echo $row1['qte'] ?></td>
                                            <td><?php echo $row1['prix'] ?></td>
                                            <td><?php echo $row1['catid'] ?></td>
                                            <td><?php echo $row1['fournid'] ?></td>
                                            <td><a class="btn btn-warning" href="panier_form.php?prodid=<?php echo $row1['prodid'] ?>">Acheter</a>
                                        </tr>

                            <?php      }
        
                                   }
        
                                   else{
            
                                       $SQL2="SELECT produits.prodid,produits.nom,produits.description,produits.qte,produits.prix,produits.catid,produits.fournid FROM produits WHERE produits.prodid = '".$rech."' OR produits.nom = '".$rech."' OR produits.description = '".$rech."'";
            
                                       $st2 = $db->prepare($SQL2);
                                       $st2->execute();
                                       $res1 = $db -> query($SQL2);                                                                      $count2 = $st2->rowCount();
    
                                        if ($count2 != 0 ){
            
                                            while($row2 = $res1 ->fetch()){
                            ?>
                                                <tr>
                                                    <td><?php echo $row2['prodid'] ?></td>
                                                    <td><?php echo $row2['nom'] ?></td>
                                                    <td><?php echo $row2['description'] ?></td>
                                                    <td><?php echo $row2['qte'] ?></td>
                                                    <td><?php echo $row2['prix'] ?></td>
                                                    <td><?php echo $row2['catid'] ?></td>
                                                    <td><?php echo $row2['fournid'] ?></td>
                                                    <td><a class="btn btn-warning" href="panier_form.php?prodid=<?php echo $row2['prodid'] ?>">Acheter</a>
                                                    </tr>

                            <?php               }   
                                            }
    
                                            else echo "Il n'y a pas de produit dans cette catégorie ou fournisseur ";
                                    }
                                }
        
                                else {
        
                                        while($row = $res3 -> fetch()){
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
                                        }
                                    }
                                    catch(Exception $e){
                                        echo 'Echec de la connexion à la base de données';
                                        exit();
                                    }
                                }
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