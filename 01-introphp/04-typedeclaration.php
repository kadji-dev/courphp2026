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