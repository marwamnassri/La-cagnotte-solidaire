<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cagnotte List</title>
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

        .action-buttons {
            text-align: center;
        }

        .accept-button {
            background-color: #4caf50;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .reject-button {
            background-color: #f44336;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
    </style>
</head>
<body>

<h1>Cagnotte List</h1>

<!-- Affichage des cagnottes sous forme de tableau -->
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Beneficiary</th>
            <th>Objective</th>
            <th>Association Type</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $conn = new mysqli("localhost", "root", "", "tutorial");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['valider']) && isset($_POST['id'])) {
                $id = $_POST['id'];
                $stmt = $conn->prepare("UPDATE cagnotte SET status = 'accepted' WHERE cagnotte_id = ?");
                $stmt->bind_param("i", $id);
                if ($stmt->execute()) {
                    echo "<div>Enregistrement validé avec succès.</div>";
                } else {
                    echo "<div>Erreur lors de la validation de l'enregistrement: " . $conn->error . "</div>";
                }
                $stmt->close();
            } elseif (isset($_POST['supprimer']) && isset($_POST['id'])) {
                $id = $_POST['id'];
                $stmt = $conn->prepare("DELETE FROM cagnotte WHERE cagnotte_id = ?");
                $stmt->bind_param("i", $id);
                if ($stmt->execute()) {
                    echo "<div>Enregistrement supprimé avec succès.</div>";
                } else {
                    echo "<div>Erreur lors de la suppression de l'enregistrement: " . $conn->error . "</div>";
                }
                $stmt->close();
            }
        }

        $cagnotte_sql = "SELECT * FROM cagnotte";
        $cagnotte_result = $conn->query($cagnotte_sql);

        if ($cagnotte_result->num_rows > 0) {
            while ($row = $cagnotte_result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['title']}</td>";
                echo "<td>{$row['beneficiary']}</td>";
                echo "<td>{$row['objective']}</td>";
                echo "<td>{$row['association_type']}</td>";
                echo "<td>{$row['status']}</td>";
                echo "<td>{$row['created_at']}</td>";
                echo "<td class='action-buttons'>";
                echo "<form method='post' style='display:inline;'>";
                echo "<input type='hidden' name='id' value='".$row['cagnotte_id']."'>";
                echo "<input type='submit' name='valider' value='Valider' class='accept-button'>";
                echo "</form>";
                echo "<form method='post' style='display:inline;'>";
                echo "<input type='hidden' name='id' value='".$row['cagnotte_id']."'>";
                echo "<input type='submit' name='supprimer' value='Supprimer' class='reject-button'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No cagnotte data available.</td></tr>";
        }

        $conn->close();
        ?>
    </tbody>
</table>

</body>
</html>
