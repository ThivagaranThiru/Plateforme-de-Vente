<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Modifier</title>
    <link href="bootstrap-3.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.6/dist/css/bootstrap-theme.min.css" rel="stylesheet">
</head>
    
<body>
    <?php include("headFourni.php"); ?>
    <?php include("menuFourni.php");?>
    <?php include("db_config.php");?>
        
        <div class = "col-lg-10"> 
            <div class = "row" >
                <legend>Modifier un produit</legend>
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
                                    try {
    
                                        $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
    
                                        $userid= $_SESSION['userid'];
    
                                        $SQL="SELECT * FROM produits WHERE fournid = '".$userid."' ORDER BY prodid ASC";
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
                                                <td><?php echo $row['fournid'] ?></td>
                                                <td><a class="btn btn-success" href="modifier_produit_form.php?prodid=<?php echo $row['prodid'] ?>">Modifer</a> </td>
                                                <td><a class="btn btn-danger" href="supprimer_produit.php?prodid=<?php echo $row['prodid'] ?>">Supprimer</a> </td>
                                            </tr>
                                    <?php }
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
          <script src="bootstrap-3.3.6/dist/js/bootstrap.js"></script>
          <script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
</body>
  <?php include("footer.php"); ?>
</html>