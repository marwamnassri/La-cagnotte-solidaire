<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cagnotte Response</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        .container h1 {
            margin-bottom: 20px;
            color: #333;
        }

        .container p {
            margin: 10px 0;
            color: #666;
        }

        .container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 10px;
        }

        .container button:hover {
            background-color: #45a049;
        }

        .container .delete-button {
            background-color: #f44336;
        }

        .container .delete-button:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>

<?php
if (isset($_GET['cagnotte_id'])) {
    $cagnotte_id = $_GET['cagnotte_id'];
    $conn = new mysqli("localhost", "root", "", "tutorial");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $cagnotte_sql = "SELECT * FROM cagnotte WHERE cagnotte_id = $cagnotte_id";
    $cagnotte_result = $conn->query($cagnotte_sql);

    if ($cagnotte_result->num_rows > 0) {
        $row = $cagnotte_result->fetch_assoc();
        echo "<div class='container'>";
        echo "<h1>Respond to Cagnotte</h1>";
        echo "<p><strong>Title:</strong> {$row['title']}</p>";
        echo "<p><strong>Beneficiary:</strong> {$row['beneficiary']}</p>";
        echo "<p><strong>Objective:</strong> {$row['objective']}</p>";
        echo "<p><strong>Association Type:</strong> {$row['association_type']}</p>";
        echo "<p><strong>Status:</strong> {$row['status']}</p>";
        echo "<form action='cagnotte_handle_response.php' method='POST'>";
        echo "<input type='hidden' name='cagnotte_id' value='{$row['cagnotte_id']}'>";
        
        echo "</form>";
        echo "</div>";
    } else {
        echo "<p>No cagnotte data found.</p>";
    }

    $conn->close();
} else {
    echo "<p>Invalid request.</p>";
}
?>

</body>
</html>
