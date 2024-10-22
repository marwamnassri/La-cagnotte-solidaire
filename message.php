<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        td form {
            display: flex;
            flex-direction: column;
        }

        textarea {
            margin-bottom: 5px;
            resize: none;
        }

        button {
            padding: 5px 10px;
            background-color: #008CBA;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #005F6B;
        }
    </style>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        /* Vos styles CSS ici */
    </style>
</head>
<body>
    <h1>Admin Panel - Messages</h1>

    <?php
    // Connexion à la base de données
    $conn = new mysqli("localhost", "root", "", "tutorial");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Récupérer les messages de la base de données
    $sql = "SELECT * FROM messages";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Afficher les messages dans un tableau
        echo "<table>";
        echo "<tr><th>Name</th><th>Email</th><th>Subject</th><th>Message</th><th>Date</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['subject']}</td>";
            echo "<td>{$row['message']}</td>";
            echo "<td>{$row['created_at']}</td>";
            echo "<td>";
            // Formulaire pour répondre au message
            echo "<form action='reply_process.php' method='POST' target='_blank'>";
            echo "<input type='hidden' name='message_id' value='{$row['id']}'>";
            echo "<textarea name='reply' placeholder='Reply...'></textarea><br>";
            echo "<button type='submit'>Send</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No messages found.";
    }

    $conn->close();
    ?>
</body>
</html>

</body>
</html>
