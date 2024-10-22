<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "tutorial");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $message_id = $_POST['message_id'];
    $admin_reply = $_POST['admin_reply'];

    // Enregistrer la réponse de l'administrateur dans la base de données
    $sql = "UPDATE messages SET admin_reply='$admin_reply' WHERE message_id=$message_id";
    if ($conn->query($sql) === TRUE) {
        // Envoi de l'email de réponse à l'utilisateur
        $sql = "SELECT user_email FROM messages WHERE message_id=$message_id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $to = $row['user_email'];
            $subject = "Réponse à votre message";
            $message = "Cher utilisateur,\n\nVotre message a été reçu et traité par l'administrateur. Voici sa réponse :\n\n$admin_reply\n\nCordialement,\nL'équipe de l'administration";
            $headers = "From: votre_email@example.com"; // Remplacez par votre adresse email

            // Envoyer l'email
            if (mail($to, $subject, $message, $headers)) {
                echo "Email de réponse envoyé avec succès à $to.";
            } else {
                echo "Erreur lors de l'envoi de l'email.";
            }
        } else {
            echo "Adresse email de l'utilisateur non trouvée.";
        }
    } else {
        echo "Erreur lors de l'enregistrement de la réponse dans la base de données : " . $conn->error;
    }
} else {
    echo "Erreur : Le formulaire n'a pas été soumis.";
}

$conn->close();
?>

