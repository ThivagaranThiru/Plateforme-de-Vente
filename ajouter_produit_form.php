<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ajouter un produit</title>
        <link href="bootstrap-3.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap-3.3.6/dist/css/bootstrap-theme.min.css" rel="stylesheet">
</head>
    
    <body>
        
        <?php include("headFourni.php"); ?>
        <?php include("menuFourni.php"); ?>
        <?php include("db_config.php"); ?>
        
        
        <form action="ajouter_produit.php" method="post" name="ajoutform" class="col-lg-8">
            <legend>Ajouter un nouveau produit</legend>
            Nom: <input type="text" name="nom" class="form-control"/>
            Description: <textarea type="text" name="description" class="form-control"></textarea>
            Quantité: <input type="number" name="qte" class="form-control" />
            Prix: <input type="number" name="prix" class="form-control"/>
            Catid: 
            <select name="catid" class="form-control">
                <option>Selectionnez</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
            </select>
            <input type="submit" value="Ajouter" class="btn btn-primary">
        </form>
        
        <div class = "col-lg-2"> 
            <div class = "row" >
                <aside class = "col-lg-12">
                    Les Différents catégorie :
                    <section class = "table-responsive">
                        <table class = "table table-bordered table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>catid</th>
                                    <th>nom</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php      
                                    try {
    
                                        $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
    
                                        $SQL="SELECT * FROM categories";
                                        $res=$db->query($SQL);

                                        while($row=$res->fetch()){ ?>
       
                                            <tr>
                                                <td><?php echo $row['catid'] ?></td>
                                                <td><?php echo $row['nom'] ?></td>
                                            </tr>
                                    <?php }
                                    } 

                                    catch(Exception $e){
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