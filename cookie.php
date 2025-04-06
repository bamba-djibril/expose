<?php 

    $message="";

    if(isset($_POST["conn"])){
        $nom="root";
        $mp="IDA_2025#";
        $user=$_POST["user"]; 
        $mdp=$_POST["pass"];
        if ((empty($user)) || empty($mdp)){
            $message=" nom utilisateur ou mot de passe ne doit pas etre vide ";
        }elseif(($nom !== $user) && ($mdp !==$mdp)){
            $message="nom utilisateur et mot de passe incorrects";
        }elseif( $nom!==$user){
            $message=" nom utilisateur incorrect";
        }elseif($mdp !==$mp){
            $message=" mot de passe incorrect";
        }else{
            setcookie("user",$user, time()+3600);
            header("Location: welcomcookie.php");
        }
    }

?>
<!doctype html>
<html>
    <head> 
        <title> connexion</title>
        <meta charset="utf-8"> 
        <style type="text/css">
            .alert{
                background:rgba(255,0,0,0.3);
                color:red;
                padding:5px;
                margin-bottom:10px;
            }
        </style>
        </head>
        <body>
            <?php if (isset($message) && $message!=="") { ?>
            <div class="alert"><?=$message?></div>
            <?php } ?>
            <form method="post">
                nom utilisateur: <input type="text" name="user">
                mot de passe: <input type="password" name="pass">
                <button name="conn" type="submit"> connexion </button>
            </form>
            
        </body> 
    </html>