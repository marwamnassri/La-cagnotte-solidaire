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
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            text-align: center;
            color: #333;
            margin: 20px 0;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 20px;
            width: 300px;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .card p {
            margin: 10px 0;
            color: #666;
        }

        .card button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .card button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h1>Cagnotte List</h1>

<div class="card-container">
    <?php
    $conn = new mysqli("localhost", "root", "", "tutorial");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $cagnotte_sql = "SELECT * FROM cagnotte";
    $cagnotte_result = $conn->query($cagnotte_sql);

    if ($cagnotte_result->num_rows > 0) {
        while ($row = $cagnotte_result->fetch_assoc()) {
            echo "<div class='card'>";
            echo "<h2>{$row['title']}</h2>";
            echo "<p><strong>Beneficiary:</strong> {$row['beneficiary']}</p>";
            echo "<p><strong>Objective:</strong> {$row['objective']}</p>";
            echo "<p><strong>Association Type:</strong> {$row['association_type']}</p>";
            echo "<p><strong>Status:</strong> {$row['status']}</p>";
            echo "<p><strong>Created At:</strong> {$row['created_at']}</p>";
            echo "<form action='cagnotte_response.php' method='GET'>";
            echo "<input type='hidden' name='cagnotte_id' value='{$row['cagnotte_id']}'>";
            echo "<button type='submit'>View Response</button>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        echo "<p>No cagnotte data available.</p>";
    }

    $conn->close();
    ?>
</div>

</body>
</html>
