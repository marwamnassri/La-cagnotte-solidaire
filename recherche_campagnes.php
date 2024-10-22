<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de la Recherche de Campagnes</title>
    <!-- Ajoutez vos styles CSS ici -->
</head>
<body>
    <h1>Résultats de la Recherche de Campagnes</h1>

    <?php
    // Connexion à la base de données
    $conn = new mysqli("localhost", "root", "", "tutorial");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Récupérer les critères de recherche de l'URL
    $cause = isset($_GET['cause']) ? $_GET['cause'] : '';
    $region = isset($_GET['region']) ? $_GET['region'] : '';

    // Construire la requête SQL en fonction des critères de recherche
    $sql = "SELECT * FROM campagnes WHERE 1=1"; // Commencez avec une clause WHERE 1=1 pour faciliter la construction de la requête

    if ($cause != '') {
        $sql .= " AND cause LIKE '%$cause%'";
    }

    if ($region != '') {
        $sql .= " AND region LIKE '%$region%'";
    }

    // Ajoutez d'autres critères de recherche si nécessaire

    // Exécuter la requête SQL
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Afficher les résultats de la recherche
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>{$row['titre']} - {$row['cause']} - {$row['region']}</li>"; // Affichez les détails pertinents de chaque campagne
        }
        echo "</ul>";
    } else {
        echo "Aucune campagne trouvée.";
    }

    $conn->close();
    ?>
</body>
</html>
