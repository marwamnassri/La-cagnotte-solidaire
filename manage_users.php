<?php


$conn = new mysqli("localhost", "root", "", "tutorial");

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Gérer l'action de suppression d'un utilisateur
if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $userId = $_GET['id'];

    if ($action === 'delete') {
        // Supprimer l'utilisateur de la base de données
        $sql = "DELETE FROM users WHERE Id = $userId";
        if ($conn->query($sql) === TRUE) {
            echo "Utilisateur supprimé avec succès.";
        } else {
            echo "Erreur lors de la suppression de l'utilisateur : " . $conn->error;
        }
    } elseif ($action === 'accept') {
        // Mettre à jour le statut de l'utilisateur comme accepté
        $sql = "UPDATE users SET status = 'accepted' WHERE Id = $userId";
        if ($conn->query($sql) === TRUE) {
            echo "Statut de l'utilisateur mis à jour avec succès.";
        } else {
            echo "Erreur lors de la mise à jour du statut de l'utilisateur : " . $conn->error;
        }
    }
}

// Récupérer tous les utilisateurs
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les Utilisateurs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #cfdacf;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
</style>
</head>
<body>
<div class="container">
    <h1 class="my-4">Manage users</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom d'utilisateur</th>
                <th>Email</th>
                <th>Âge</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($user = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $user['Id']; ?></td>
                        <td><?php echo $user['Username']; ?></td>
                        <td><?php echo $user['Email']; ?></td>
                        <td><?php echo $user['Age']; ?></td>
                        
                       
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='6'>Aucun utilisateur trouvé</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
