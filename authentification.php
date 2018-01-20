<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Authentification</title>
    </head>

    <body>
        
       <?php 
            include("db_config.php");
            session_start();
        
            if (!isset($_POST['login']) || !isset($_POST['mdp'])){
                include("index.php");   
            } 
            else {
                $login = trim($_POST['login']);
                $mdp = trim($_POST['mdp']);
                
                if(empty($login)||empty($mdp)) {
                    echo'vous n avez pas remplis tous les champs';
                    include("index.php");            
                    exit();       
                }
                else{
        
                    try{
                        
                        $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
       
                        $SQL="SELECT * FROM users WHERE login = '".$login."' AND mdp ='".$mdp."'";
    
                        $st = $db->prepare($SQL);
                        $st->execute();
                        $count = $st->rowCount();
                        $data = $st->fetch();
        
                        if ($count == 0 ){?>
                            <div class="alert alert-danger col-lg-12">
                                <strong>ATTENTION!</strong>
                            Ce login ou mot de passe n'existe pas. Veuillez vous enregistrez.
                            </div> 
                            <?php include("index.php");}
                        
                        else {
    
                            $_SESSION['userid'] = $data['userid'];
                            $_SESSION['type'] = $data['type'];
        
                            if($_SESSION['type'] == 'fournisseur'){
                                header("Location: fournisseur.php?id=".$_SESSION['userid']); 
                            }
                            else{  
                                header("Location: client.php?id=".$_SESSION['userid']);
                             }
                         }
                    }
    
                    catch(Exception $e){
                        echo 'Echec de la connexion à la base de données';
                        exit();
                    }
                }
            }
        ?>  
    </body>
</html>