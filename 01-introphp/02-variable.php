<?php
echo '<h1>Les variables</h1>';






echo $nom = "Jean";       // Chaîne de caractères (String)
$age = 25;           // Entier (Integer)
$prix = 19.99;       // Nombre à virgule (Float)
$estActif = true;    // Booléen (Boolean)

$nom = "Alice";

isset($nom);       // true - la variable existe et n'est pas nulle
echo isset($nom); 
isset($inconnu); 
echo isset($inconnu);   // false - la variable n'existe pas

empty("");         // true - une chaîne vide est considérée comme "vide"
echo empty("");
empty(0);          // true - zéro est considéré comme "vide"
empty("hello");    // false - contient des données

unset($nom);       // Détruit la variable
isset($nom);       // false - n'existe plus
      // Notice : variable indéfinie

 
// Déclaration et utilisation de variables
$nomProduit = "Ordinateur Portable";
$prixProduit = 999.99;
$enStock = true;
$quantite = 5;
 echo "<br>";
echo 'Produit :' .  "$nomProduit";
 echo "<br>";
echo "Prix : $prixProduit €\n";
 echo "<br>";
echo "En Stock : " . ($enStock ? "Oui" : "Non") . "\n";
 echo "<br>";
echo "Disponible : $quantite unités";

 echo "<br>";
  echo "<br>";
   echo "<br>";

$age = 18;

if ($age >= 18) {
    echo "Majeur";
} else {
    echo "Mineur";
}
 echo "<br>";
  echo "<br>";
   echo "<br>";

   $personne = "la personne";
   $age = 18;

   echo "la personne est" .   ($age >=18 ? "majeur" : "mineur");

$nom = $_GET['nom'] ?? "Invité";

echo $nom;




