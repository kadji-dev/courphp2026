<?php

include 'database.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>



<?php
// $statut = 404;

// $message = match($statut) {
//     200 => 'OK',
//     201 =>  'Créé',
//     400 => 'Requête Incorrecte',
//     404 => 'Non Trouvé',
//     500 => 'Erreur Serveur',
// };

// echo $message; // 'OK'
$jour = 'Samedi';

$type = match($jour) {
    'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi' => 'Jour de semaine',
    'Samedi', 'Dimanche' => 'Week-end',
};

echo $type;  // 'Week-end'
echo '<br>';



function getInfoStatut(int $code): array {
    return match($code) {
        200, 201, 204 => [
            'type' => 'succes',
            'icone' => ''
        ],
        301, 302, 307 => [
            'type' => 'redirection',
            'icone' => '→'
        ],
        400, 401, 403, 404 => [
            'type' => 'erreur_client',
            'icone' => ''
        ],
        500, 502, 503 => [
            'type' => 'erreur_serveur',
            'icone' => ''
        ],
        default => [
            'type' => 'inconnu',
            'icone' => '?'
        ],
    };
}

print_r(getInfoStatut(404));
// ['type' => 'erreur_client', 'icone' => '']

echo '<br>';
echo '<br>';


function saluer(string $nom) {
    return "Bonjour, $nom !";
}

saluer("Alice"); // Bonjour, Alice !
saluer("Bob");   // Bonjour, Bob !
echo(saluer("Charlie")); // Bonjour, Charlie !


echo '<br>';
echo '<br>';


function creerUtilisateur(string $nom, string $email, int $age) {
    echo "Création de l'utilisateur : $nom ($email), Âge : $age";
}

creerUtilisateur("Jean", "jean@example.com", 25);

echo '<br>';
echo '<br>';
echo '<br>';


function creerProduit(
    string $nom,
    float $prix,
    int $stock = 0,
    bool $vedette = false
) {
    echo "Création du produit : $nom, Prix : $prix €, Stock : $stock, Vedette : " . ($vedette ? 'Oui' : 'Non');
}

// Passer directement aux paramètres souhaités par leur nom :
creerProduit(
    nom: "Ordinateur Portable",
    prix: 999.99,
    vedette: true // $stock utilise sa valeur par défaut
);


$pile = [1, 2, 3];

array_push($pile, 4, 5);  // [1,2,3,4,5] - ajouter en fin
array_pop($pile);          // retourne 5, pile devient [1,2,3,4]

array_unshift($pile, 0);   // [0,1,2,3,4] - ajouter en début
array_shift($pile);        // retourne 0, pile devient [1,2,3,4]

unset($pile[1]);           // Supprimer par clé

echo '<br>';
echo '<br>';
echo '<br>';
$nom = "Alice";
$html = <<<HTML
<div class="container">
    <h1>"Bienvenue, $nom"</h1>
</div>
HTML;


echo '<br>';
echo '<br>';
echo '<br>';

$brut = <<<'TEXTE'
Pas $d_interpolation ici
TEXTE;

echo '<br>';
echo '<br>';
echo '<br>';
$str = "Bonjour, le Monde !";

strlen($str);              // Longueur
strtoupper($str);          // BONJOUR, LE MONDE !
strtolower($str);          // bonjour, le monde !
ucfirst($str);             // Bonjour, le monde !
ucwords("bonjour monde"); // Bonjour Monde

trim("  bonjour  ");      // "bonjour" - supprimer les espaces
ltrim("  bonjour");       // "bonjour" - supprimer à gauche
rtrim("bonjour  ");       // "bonjour" - supprimer à droite

echo    '<br>';
echo    '<br>';


$message = '';
$nom = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom     = $_POST['nom'] ?? '';
    $message = "Bonjour, $nom !";
}
?>

<form method="POST" action="">
    <input type="text" name="nom" value="<?= htmlspecialchars($nom) ?>">
    <button type="submit">Envoyer</button>
</form>

<?php
// if($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $nom = $_POST['nom'] ?? '';
//     echo "Bonjour, $nom !";
// }
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';



$erreurs  = [];
$succes   = false;
$donnees  = ['nom' => '', 'email' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $donnees = [
        'nom'     => trim($_POST['nom']     ?? ''),
        'email'   => trim($_POST['email']   ?? ''),
        'message' => trim($_POST['message'] ?? ''),
    ];

    if (empty($donnees['nom'])) {
        $erreurs['nom'] = 'Le nom est requis';
    }

    if (!filter_var($donnees['email'], FILTER_VALIDATE_EMAIL)) {
        $erreurs['email'] = 'Une adresse email valide est requise';
    }

    if (empty($erreurs)) {
        // Sauvegarder en BDD, envoyer un email, etc.
        $succes = true;
    }
}
?>

<?php if ($succes): ?>
    <p class="success">Merci pour votre message !</p>
<?php else: ?>
    <form method="POST">
        <input name="nom" value="<?= htmlspecialchars($donnees['nom']) ?>">
        <?php if (isset($erreurs['nom'])): ?>
            <span class="error"><?= $erreurs['nom'] ?></span>
        <?php endif; ?>

        <input name="email" value="<?= htmlspecialchars($donnees['email']) ?>">
        <textarea name="message"><?= htmlspecialchars($donnees['message']) ?></textarea>
        <button type="submit">Envoyer</button>
    </form>
<?php endif; ?>