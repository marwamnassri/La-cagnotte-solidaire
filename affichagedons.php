<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Dons</title>
    <style>
        /* Vos styles CSS ici */
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
            border: 1px solid #ccc;
            padding: 10px;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<h1>Liste des Dons</h1>

<!-- Affichage des dons sous forme de tableau -->
<table>
    <thead>
        <tr>
            <th>Montant</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Numéro de carte</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Connexion à la base de données
        $conn = new mysqli("localhost", "root", "", "tutorial");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Requête SQL pour récupérer les dons
        $donation_sql = "SELECT * FROM formulaire_paiement";
        $donation_result = $conn->query($donation_sql);

        if ($donation_result->num_rows > 0) {
            while ($row = $donation_result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['montant']}</td>";
                echo "<td>{$row['nom']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['num_carte']}</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Aucun don disponible.</td></tr>";
        }

        $conn->close();
        ?>
    </tbody>
</table>

</body>
</html>
