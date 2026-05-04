<?php
echo '<h1>Le traitement du formulaire</h1>';
echo "<a href='index.php'>Retour à la page d'accueil</a>";


// if(isset($_POST['soumettre'])){
//     echo "Le formulaire a été soumis !";

//     $nom = $_POST['nom'] ;
//     $email = $_POST['email'] ;
//     $message = $_POST['message'] ;


//     echo "<br>Nom : $nom";
//     echo "<br>Email : $email";
//     echo "<br>Message : $message";

// }else{
//     echo "Le formulaire n'a pas été soumis !";
// }


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
