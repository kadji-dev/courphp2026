<?php
echo "Hello, Worldddsfweedd!";
 


// phpinfo();


?>
<!DOCTYPE html>
<html>
<head>
    <title>Ma première page PHP</title>
</head>
<body>
    <h1><?php echo "Bienvenue sur ma page PHP !"; ?></h1>
    <p>Nous sommes en l'an : <?php echo date("Y-M-D"); ?></p>
    <p>Heure actuelle : <?= date("H:i:s") ?></p>
<!-- Équivalent à : <?php echo date("H:i:s"); ?> -->


<a href="index.php">Retour à la page d'accueil</a><br>
<a href="01-code.php">Aller à la page de code</a><br>
<a href="02-variable.php">Aller à la page des variables</a><br>
<a href="03-datatype.php">Aller à la page des types de données</a><br>
<a href="04-typedeclaration.php">Aller à la page de déclaration de types</a> <br>
<a href="traitement.php">Aller à la page de traitement</a><br>
<a href="forms-sers-input.php">Aller à la page des formulaires</a><br>




<form action="traitement.php" method="POST">
  <input type="text" name="nom"  />
  <input type="email" name="email"  />
  <textarea name="message"></textarea>
  <button type="submit" name="soumettre">Envoyer</button>
</form>


</body>
</html>
