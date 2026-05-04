<?php


echo '<h1>Les types de données</h1>';

echo "<a href='index.php'>Retour à la page d'accueil</a>";
 $nom = "Jean";       // Chaîne de caractères (String)
$simpleQuote = 'Bonjour';              // Guillemets simples (littéral)
$doubleQuote = "Bonjour, $nom";       // Guillemets doubles (interpolation)
$heredoc = <<<EOT
Chaîne sur
plusieurs lignes
EOT;
echo $heredoc;


$indexe = [1, 2, 3];
$associatif = ["nom" => "Jean", "age" => 30];


$decimal = 42;           // Décimal
$negatif = -17;          // Négatif
$octal = 0755;           // Octal (commence par 0)
$hex = 0xFF;             // Hexadécimal (commence par 0x)
$binaire = 0b1010;       // Binaire (commence par 0b)
$lisible = 1_000_000;    // PHP 7.4+ : séparateur de milliers// Entier (Integer)

echo "Entier décimal : $decimal<br>";
echo "Entier négatif : $negatif<br>";
echo "Entier octal : $octal<br>";
echo "Entier hexadécimal : $hex<br>";
echo "Entier binaire : $binaire<br>";
echo "Entier lisible : $lisible<br>";

$var =[];
echo "<br>" . gettype($var);      // Retourne le type sous forme de chaîne
echo "<br>" . is_string($var);    // Vérification booléenne
echo "<br>" . is_int($var);
echo "<br>" . is_float($var);
echo "<br>" . is_bool($var);
echo "<br>" . is_array($var);
echo "<br>" . is_null($var);

$valeurs = [
    "Bonjour",
    42,
    3.14,
    true,
    [1, 2, 3],
    null
];

foreach ($valeurs as $valeur) {
    echo gettype($valeur) . " : ";
    var_dump($valeur);
    echo "\n";
}


$indexe = [1, 2, 3];
$associatif = ["nom" => "Jean", "age" => 30];
echo "<pre>" ;
 print_r($associatif)  ;
 echo "</pre>" ;



 echo "<br>";
  echo "<br>";
   echo "<br>";


   $texte = <<<EOT
Bonjour,
Je m'appelle Jean.
Bienvenue sur mon site !
EOT;

 echo "<br>";
  echo "<br>";
   echo "<br>";

echo $texte;
$yo=
"Bonjour,
Je m'appelle Jean.
Bienvenue sur mon site !";

echo "$yo";

 echo "<br>";
  echo "<br>";
   echo "<br>";


$decimal = 42;           // Décimal
$negatif = -17;          // Négatif
$octal = 0755;           // Octal (commence par 0)
$hex = 0xFF;             // Hexadécimal (commence par 0x)
$binaire = 0b1010;       // Binaire (commence par 0b)
$lisible = 1_000_000;    // PHP 7.4+ : séparateur de milliers
echo "Entier décimal : $decimal<br>";
echo "Entier négatif : $negatif<br>";
echo "Entier octal : $octal<br>";
echo "Entier hexadécimal : $hex<br>";
echo "Entier binaire : $binaire<br>";
echo "Entier lisible : $lisible<br>";



$indexe = [1, 2, 3];
$associatif = ["nom" => "Jean", "age" => 30];
echo "<pre>" ;
 print_r($associatif ["nom"])  ;
 echo "</pre>" ;


$valeurs = [
    "Bonjour",
    42,
    3.14,
    true,
    [1, 2, 3],
    null
];

foreach ($valeurs as $valeur) {
    echo gettype($valeur) . " : ";
      echo "<br>";
    var_dump($valeur);
      echo "<br>";
    echo "\n";
}

$notes = [
    "Math" => 15,
    "Anglais" => 12,
    "Info" => 18
];

foreach ($notes as $matiere => $note) {
    echo "$matiere : $note\n";
    echo "<br>";
}



$fruits = ["pomme", "banane", "orange"];

foreach ($fruits as $fruit) {
    echo "<br>";
    echo $fruit . "\n";
}