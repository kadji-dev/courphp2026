<?php
declare(strict_types=1);
echo '<h1>La déclaration de types</h1>';

echo "<a href='index.php'>Retour à la page d'accueil</a>";


function saluer(string $nom): void {
    echo "Bonjour, $nom !";
}

echo "<br>";
saluer("Alice"); // Fonctionne
//saluer(123);     // TypeError !


// function additionner(int $a, int $b): int {
//     return $a + $b;
// }

// function trouverUtilisateur(int $id): ?User { // ? permet null
//     return $id > 0 ? new User() : null;
// }

// function journaliser(string $msg): void { // Pas de retour
//     echo $msg;
// }

function traiterID(int|string $id): void {
    echo "Traitement : $id";
}



traiterID(42);        // Fonctionne
echo "<br>";
traiterID("ABC123");  // Fonctionne aussi



function chercher(?int $id): ?int {
    // $id peut être int ou null
    // Retourne string ou null
    return null; // Simulé pour l'exemple
}
$resultat = chercher(null); // OK
echo $resultat; // Affiche rien (null)

// Syntaxe union PHP 8.0+ (équivalent)
function chercher2(int|null $id): int|null {
    // Identique ci-dessus
    return null;
}


function deboguer(mixed $valeur): void {
    var_dump($valeur);
}
echo deboguer('true'); // Affiche string(4) "true"



class Produit {
    public string $nom;
    public float $prix;
    public ?string $description = null;
    private int $stock = 0;
}


// function somme(int ...$nombres): int {
//     return array_sum($nombres);
// }

// echo somme(1, 2, 3).("<br>"); // 6
// echo somme(1, 2, 3, 4, 5).("<br>"); // 15




function calculerRemise(
    float $prix,
    float $pourcentageRemise = 10.0,
    float $remiseMax = 50.0
): float {
    $remise = $prix * ($pourcentageRemise / 100);

    // Plafonner la remise
    if ($remise > $remiseMax) {
        $remise = $remiseMax;
    }

    return $prix - $remise;
}

// Utilisation de la fonction
$original = 100.00;
$final = calculerRemise($original, pourcentageRemise: 15.0);

echo "Prix original : $original €\n";
echo "Après remise : $final €\n";



// function test() {
//     $varLocale = "Je suis locale !";
//     echo $varLocale; // Fonctionne
// }
// test();
//  // Erreur ! Non définie en dehors de la fonction

// $compteur = 0;


$compteur = 0;

function incrementer() {
    global $compteur; // Référencer la variable globale
    $compteur++;
 
}
   echo $compteur; // 0
incrementer();
echo $compteur; // 1


$saluer = function(string | int $nom): string {
    return "Bonjour, $nom !";
};

echo $saluer(2); // Bonjour, 2 !



$nombres = [1, 2, 3, 4, 5];

// Doubler chaque nombre
$doubles = array_map(function($n) {
    return $n * 2;
}, $nombres);

echo "<br>";

print_r($doubles); // [2, 4, 6, 8, 10]
echo "<br>";
// Filtrer les nombres pairs
$pairs = array_filter($nombres, function($n) {
    return $n % 2 === 0;
});
echo "<br>";

print_r($pairs); // [2, 4]

echo "<br>";

$multiplicateur = 3;

$multiplier = function(int $n) use ($multiplicateur): int {
    return $n * $multiplicateur;
};

echo $multiplier(5); // 15

echo "<br>";
echo "<br>";
echo "<br>";



$total = 0;

$ajouter = function(int $montant) use (&$total): void {
    $total += $montant; // Modifie la variable originale
};

$ajouter(10);
$ajouter(20);
echo $total; // 30

echo "<br>";

$facteur = 3;

// La fonction fléchée capture $facteur automatiquement
$multiplier = fn($n) => $n * $facteur;

$nombres = [1, 2, 3];
$resultat = array_map(fn($n) => $n * $facteur, $nombres);
// [3, 6, 9]



$utilisateur = [
    'nom'    => 'Jean Dupont',
    'email'  => 'jean@example.com',
    'age'    => 30,
    'actif'  => true,
];

echo $utilisateur['nom'];   // Jean Dupont
echo $utilisateur['email']; // jean@example.com

// Ajouter/mettre à jour
$utilisateur['telephone'] = '06 12 34 56 78';
$utilisateur['age'] = 31; // Mise à jour
echo "<br>";
print_r($utilisateur);


$a = ['x' => 1, 'y' => 2];
$b = ['y' => 3, 'z' => 4];

array_merge($a, $b);        // ['x'=>1, 'y'=>3, 'z'=>4]
var_dump(array_merge($a, $b)); // Affiche les clés et valeurs fusionnées
// array_merge_recursive($a, $b);  // Conserve les deux valeurs

// $cles   = ['a', 'b', 'c'];
// $valeurs = [1, 2, 3];
// array_combine($cles, $valeurs); // ['a'=>1, 'b'=>2, 'c'=>3]

echo "<br>";echo "<br>";

$arr = [1, 2, 3, 4, 5];

array_slice($arr, 2);      // [3, 4, 5] - à partir de l'index 2
array_slice($arr, 1, 2);   // [2, 3] - 2 éléments à partir de l'index 1

array_keys($arr);          // [0, 1, 2, 3, 4]
array_values($arr);        // Réindexer le tableau

var_dump(array_slice($arr, 2)); // Affiche les clés
echo "<br>";
// echo print_r(array_keys($arr)); // Affiche les clés de manière lisible
echo "<br>";
var_dump(array_slice($arr, 1, 2)); // Affiche les valeurs
echo "<br>";
var_dump(array_keys($arr)); // true
echo "<br>";
var_dump(array_values($arr)); // true



$commandes = [
    ['id' => 1, 'total' => 150, 'statut' => 'completee'],
    ['id' => 2, 'total' => 75,  'statut' => 'en_attente'],
    ['id' => 3, 'total' => 200, 'statut' => 'completee'],
    ['id' => 4, 'total' => 50,  'statut' => 'annulee'],
    ['id' => 5, 'total' => 300, 'statut' => 'completee'],
];
echo "<br>";
echo "<br>";
echo "<br>";
// Pipeline : Filter -> Map -> Reduce
$revenuCompletes = array_reduce(
    array_map(
        fn($c) => $c['total'],
        array_filter(
            $commandes,
            fn($c) => $c['statut'] === 'completee'
        )
    ),
    fn($somme, $total) => $somme + $total,
    0
);

echo "Revenu des commandes complètes : $revenuCompletes €";
// Revenu des commandes complètes : 650 €


echo "<br>";
echo "<br>";

$nom = 'Monde';
$salutation = "Bonjour, $nom"; // Affiche : Bonjour, Monde

// Accolades pour les expressions complexes
$salutation = "Bonjour, {$utilisateur['nom']}";
echo $salutation; // Affiche : Bonjour, Jean Dupont

// Heredoc - pour les longues chaînes
$html = <<<HTML
<div class="container">
    <h1>Bienvenue, $nom</h1>
</div>
HTML;

echo $html;
// // Nowdoc - comme les guillemets simples
$brut = <<<'TEXTE'
Pas $d_interpolation ici
TEXTE;
echo $brut; // Affiche : Pas $d_interpolation ici


echo "<br>";
echo "<br>";


$str = "Bonjour, le Monde !";

strlen($str);              // Longueur
strtoupper($str);          // BONJOUR, LE MONDE !
strtolower($str);          // bonjour, le monde !
ucfirst($str);             // Bonjour, le monde !
ucwords("bonjour monde"); // Bonjour Monde

echo strlen($str); // Affiche : 21
echo "<br>";
echo strtoupper($str); // Affiche : BONJOUR, LE MONDE ! 
echo "<br>";
echo strtolower($str); // Affiche : bonjour, le monde !
echo ucfirst($str); // Affiche : Bonjour, le monde !
echo "<br>";
echo ucwords("bonjour monde"); // Affiche : Bonjour Monde

trim("  bonjour  ");      // "bonjour" - supprimer les espaces
ltrim("  bonjour");       // "bonjour" - supprimer à gauche
rtrim("bonjour  ");       // "bonjour" - supprimer à droite




<form action="traitement.php" method="POST">
  <input type="text" name="nom" required />
  <input type="email" name="email" required />
  <textarea name="message"></textarea>
  <button type="submit">Envoyer</button>
</form>