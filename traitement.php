<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $montant = $_POST["montant"];
    $mode_paiement = $_POST["mode_paiement"];
    $num_carte = $_POST["num_carte"];

    // Connexion à la base de données
    $conn = new mysqli("localhost", "root", "", "tutorial");

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }

    // Préparer la requête SQL d'insertion
    $sql = "INSERT INTO formulaire_paiement (nom, prenom, email, montant, mode_paiement, num_carte)
            VALUES ('$nom', '$prenom', '$email', '$montant', '$mode_paiement', '$num_carte')";

    // Exécuter la requête SQL
    if ($conn->query($sql) === TRUE) {
        echo "Enregistrement réussi.";
    } else {
        echo "Erreur lors de l'enregistrement : " . $conn->error;
    }

    // Fermer la connexion à la base de données
    $conn->close();
}
?>
