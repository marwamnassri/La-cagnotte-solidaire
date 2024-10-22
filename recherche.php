<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Campagnes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }
        li:hover {
            background-color: #f5f5f5;
        }
        strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Liste des Campagnes</h1>

    <ul>
        <?php
        // Connexion à la base de données
        $conn = new mysqli("localhost", "root", "", "tutorial");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Récupérer les données des campagnes depuis la base de données
        $sql = "SELECT * FROM campagnes";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Afficher les campagnes sous forme de liste
            while ($row = $result->fetch_assoc()) {
                echo "<li>";
                echo "<strong>Titre :</strong> {$row['titre']}<br>";
                echo "<strong>Cause :</strong> {$row['cause']}<br>";
                echo "<strong>Région :</strong> {$row['region']}<br>";
                echo "<strong>Popularité :</strong> {$row['popularite']}<br>";
                echo "<strong>Description :</strong> {$row['description']}<br>";
                echo "<strong>Date de début :</strong> {$row['date_debut']}<br>";
                echo "<strong>Date de fin :</strong> {$row['date_fin']}<br>";
                echo "<strong>Objectif financier :</strong> {$row['objectif_financier']}<br>";
                echo "<strong>Montant collecté :</strong> {$row['montant_collecte']}<br>";
                echo "</li>";
            }
        } else {
            echo "<li>Aucune campagne trouvée.</li>";
        }

        $conn->close();
        ?>
    </ul>
</body>
</html>
