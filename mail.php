<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $objet = htmlspecialchars($_POST['objet']);
    $message = htmlspecialchars($_POST['message']);

    // Adresse e-mail où tu veux recevoir les messages
    $destinataire = "ireliensengimana@email.com"; // ← remplace par ton adresse e-mail

    // Sujet de l'e-mail
    $sujet = "Nouveau message de contact: $objet";

    // Corps du message
    $contenu = "Nom : $nom\n";
    $contenu .= "Email : $email\n";
    $contenu .= "Objet : $objet\n";
    $contenu .= "Message :\n$message";

    // En-têtes de l'e-mail
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Envoi de l'e-mail
    if (mail($destinataire, $sujet, $contenu, $headers)) {
        echo "<h3 style='color:green;text-align:center;'>Votre message a été envoyé avec succès !</h3>";
    } else {
        echo "<h3 style='color:red;text-align:center;'>Échec de l'envoi. Veuillez réessayer plus tard.</h3>";
    }
} else {
    header("Location: contacts.html");
    exit();
}
?>

