<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Messages</title>
    <!-- Ajoutez vos styles CSS ici -->
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
    $sql = "SELECT * FROM messagess ORDER BY created_at DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Afficher les messages dans un tableau
        echo "<table>";
        echo "<tr><th>Name</th><th>Email</th><th>Subject</th><th>Message</th><th>Date</th><th>Admin Reply</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['user_name']}</td>";
            echo "<td>{$row['user_email']}</td>";
            echo "<td>{$row['subject']}</td>";
            echo "<td>{$row['message']}</td>";
            echo "<td>{$row['created_at']}</td>";
            echo "<td>{$row['admin_reply']}</td>";
            echo "<td>";
            // Formulaire pour répondre au message
            echo "<form action='reply_process.php' method='POST'>";
            echo "<input type='hidden' name='message_id' value='{$row['message_id']}'>";
            echo "<textarea name='admin_reply' placeholder='Admin Reply...'></textarea><br>";
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
