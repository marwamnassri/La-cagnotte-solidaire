<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reçu de Don</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #cfdacf;
        }
        .receipt {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #000;
            background: #f9f9f9;
        }
        .header, .footer {
            text-align: center;
        }
        .details {
            margin-top: 20px;
        }
        .details p {
            margin: 5px 0;
        }
        .items, .totals {
            width: 100%;
            margin-top: 20px;
        }
        .items th, .items td, .totals th, .totals td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
        .items th, .totals th {
            background: #e0e0e0;
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
    <div class="receipt">
        <div class="header">
            <h1>The Charity</h1>
            <p>Tunisie, Gfasa</p>
            <p>Téléphone: +216 29571947</p>
        </div>
        <div class="details">
            <p>Mail: <strong>thecharitycompany@gmail.com</strong></p>
            <p>Reçu #: <strong>123456</strong></p>
        </div>
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
<div class="footer">
            <p>Merci pour votre don !</p>
  
    <a href="generate_receipt.php" download="receipt.pdf">Télécharger le reçu</a>
</div>
        </div>
    </div>
</body>
</html>
