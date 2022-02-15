<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once 'php/control.php';


$dbname = 'weather_db';
$host = 'localhost';
$user = 'root';
$port = '8889';
$pass = 'root';

try{

    $connexion = new PDO ("mysql:hostname=$host; port=$port; dbname=$dbname;",$user, $pass);
    // echo("Connexion reussie");
    $connexion->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->setAttribute(PDO:: ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

}catch(PDOException $e){

    echo $e->getMessage;

}
    

    if(isset($_POST['btnval'])) {
       $password = control($_POST['password']);
       $email = control($_POST['mail']);

       $sql = "SELECT * FROM users where email=:email AND passwords=:passwords";
       $stm = $connexion->prepare($sql);
        
        $stm->execute([ ':email'=>$email, ':passwords' => $password]);
        $user = $stm->fetch(PDO::FETCH_OBJ);
        // die(var_dump($user));
        if($user){
            header('location: php/liste.php');
        }else{
            echo "Utilisateur Inconnu";
        }

    }
 

?> 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/cssmenu.css">
    <title>weather</title>
</head>
<body>
   <div id="modFrm">
		<div class="frmCtn">
			<div class="logofrm"><img src="images/cloudy1.png"></div>
			<div class="separator"></div>
			<div class="frm">
				<div class="avatar"><img src="images/user.png"></div>
				<div class="frmadmin">
					<form method="POST" action="">
						<div class="inputFrm">
							<input type="email" name="mail" id="mail" placeholder="Email" required="required" autocomplete="off">
						</div>
						<div class="inputFrm">
							<input type="password" name="password" id="password" placeholder="Mot de passe" required="required" autocomplete="off">
						</div>
						<div class="inputFrm" style="margin-top:20px;">
							<input type="submit" name="btnval" value="Se connecter">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html> 