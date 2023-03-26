<?php
session_start();
require_once('connexion.php');


if (isset($_POST['btnEnvoyer'])) {

  $utilisateur = $_POST['Utilisateur'];
  $mdp = $_POST['Mdp'];

  $request = $db->prepare('select * from utilisateurs where Utilisateur = :Utilisateur limit 1');
  $result = $request->execute(['Utilisateur' => $utilisateur]);
  $user = $request->fetch(PDO::FETCH_ASSOC);


  if ($user !== false &&  $mdp === $user['Mdp']) {

    unset($user['Mdp']);
    $_SESSION['user'] = $user;
    header('location: page_securisee.php');
    exit;
  }


  echo '<div style="font-weight: bold; font-size : 40px ;color: #FF0000"> Vos accès ne sont pas corrects</div>';
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width, initial-scale=1.0">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <title>Index</title>
</head>
<style>
  body {
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    opacity: 1;
    color: #16df8b;
    width: 1000px;
    margin: 0 auto;
    margin-top: 50vh;
    /* poussé de la moitié de hauteur de viewport */
    transform: translateY(-50%);
    /* tiré de la moitié de sa propre hauteur */
  }

  a {
    color: red;
    font-size: 20px;
  }

  h1 {
    margin-top: 50vh;
    /* poussé de la moitié de hauteur de viewport */
    transform: translateY(-50%);
    /* tiré de la moitié de sa propre hauteur */
    font-size: 80px;
  }
</style>

<body background="Image/informaticien.jpg">

  <h1>Bienvenue sur Opticontact</h1>

  <br>

  <div class="container">
    <form action="" method="POST" style="width : 350px;height: 220px;border:2px solid #000;margin: 0 auto;padding:10px;">

      <div class="form-group mb-2" style="margin-bottom: 10px;">
        <label for="Utilisateur"> Utilisateur :</label>
        <input class="form-control form-control mb-2" type="text" id="Utilisateur" name="Utilisateur">
      </div>

      <div class="form-group mb-2" style="margin-bottom: 10px;">
        <label for="Mdp"> Mot de passe :</label>
        <input class="form-control form-control mb-2" type="password" id="Mdp" name="Mdp">
      </div>
      <br>
      <div class="form-group mb-2">
        <input type="submit" class="btn btn-primary" name="btnEnvoyer" value="Envoyer">
      </div>
      <br>
      <a href="inscription.php" class="btn btn-info">INSCRIPTION</a>
    </form>
  </div>

</body>

</html>