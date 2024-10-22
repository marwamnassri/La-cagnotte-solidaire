<?php
session_start();

include("php/config.php"); // Assurez-vous d'inclure votre fichier de configuration de base de données

if (isset($_POST['submit'])) {
    // Vérifiez si l'adresse e-mail est valide
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_message'] = "Veuillez entrer une adresse e-mail valide.";
    } else {
        $email = mysqli_real_escape_string($con, $_POST['email']);

        // Sélectionnez l'utilisateur avec l'adresse e-mail fournie
        $result = mysqli_query($con, "SELECT * FROM users WHERE Email='$email'");
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $password = $row['Password'];

            // Envoyez le mot de passe par e-mail à l'utilisateur
            $to = $email;
            $subject = "Récupération de mot de passe";
            $message = "Votre mot de passe est : $password";
            $headers = "From: marwamnassri51@gmail.com" . "\r\n" .
                       "Reply-To: marwamnassri51@gmail.com" . "\r\n" .
                       "X-Mailer: PHP/" . phpversion();

            if (mail($to, $subject, $message, $headers)) {
                $_SESSION['success_message'] = "Votre mot de passe a été envoyé à votre adresse e-mail.";
            } else {
                $_SESSION['error_message'] = "Une erreur s'est produite lors de l'envoi du mot de passe par e-mail. Veuillez réessayer.";
            }
        } else {
            $_SESSION['error_message'] = "Adresse e-mail non trouvée dans notre base de données.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récupération de mot de passe</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="box">
            <h2>Récupération de mot de passe</h2>
            <?php if (isset($_SESSION['success_message'])) : ?>
                <div class="success-message"><?php echo $_SESSION['success_message']; ?></div>
                <?php unset($_SESSION['success_message']); ?>
            <?php endif; ?>
            <?php if (isset($_SESSION['error_message'])) : ?>
                <div class="error-message"><?php echo $_SESSION['error_message']; ?></div>
                <?php unset($_SESSION['error_message']); ?>
            <?php endif; ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Entrez votre adresse e-mail :</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <input type="submit" name="submit" value="Envoyer">
            </form>
        </div>
    </div>
</body>
</html>
