<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Enregistement</title>
    </head>

    <body>
        
       <?php  
            include("db_config.php");

            if (!isset($_POST['nom'])|| !isset($_POST['prenom'])|| !isset($_POST['societe'])|| !isset($_POST['email'])|| !isset($_POST['login'])|| !isset($_POST['mdp'])|| !isset($_POST['type'])){
                include("enregistrement_form.php");
            } 
            else { 
            
                $nom = trim($_POST['nom']);
                $prenom= trim($_POST['prenom']);
                $societe= trim($_POST['societe']);
                $email = trim($_POST['email']);
                $login = trim($_POST['login']);
                $mdp = md5($_POST['mdp']);
                $type = trim($_POST['type']);
            
                if (empty($nom)|| empty($prenom)|| empty($societe)|| empty($email)|| empty($login)|| empty($mdp)|| empty($type)){
                    echo "<p>Erreur dans les données\n";
                    include("enregistrement_form.php"); 
                    exit(); 
                }
                else{
        
                    try {
            
                        $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);

                        $SQL="SELECT userid FROM users WHERE login=?";
        
                        $st = $db->prepare($SQL);
                        $res = $st->execute([$login]);
                        $row = $st->fetch();

                        if($row){
                            echo "<p>Le login existe\n";
                            exit();  
                        } else {
       
                            $SQL1="INSERT INTO users (nom,prenom,societe,email,login,mdp,type) VALUES('$nom','$prenom','$societe','$email','$login','$mdp','$type')";
                            $st1=$db->prepare($SQL1);
                            $res1=$st1->execute(array($nom,$prenom,$societe,$email,$login,$mdp,$type));

                            if (!$res1){
                                echo "Vous n'avez pas pu vous enregisterez\n";
                                include("index.php");}
                            
                            else{ echo "L'enregistrement a été effectué\n";
                                        include("index.php");}
                        }
                        $db=null;
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