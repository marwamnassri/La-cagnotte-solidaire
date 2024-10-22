<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejected Cagnottes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #cfdacf;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .cagnotte-list {
            list-style: none;
            padding: 0;
        }

        .cagnotte-item {
            background-color: #f9f9f9;
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .cagnotte-item p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Rejected Cagnottes</h1>
    <ul class="cagnotte-list">
        <!-- PHP code to fetch and display rejected cagnottes -->
        <?php
        // Connect to the database
        $conn = new mysqli("localhost", "root", "", "tutorial");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch rejected cagnottes data
        $rejected_cagnottes_sql = "SELECT * FROM cagnotte WHERE status = 'rejected'";
        $rejected_cagnottes_result = $conn->query($rejected_cagnottes_sql);

        if ($rejected_cagnottes_result->num_rows > 0) {
            while ($row = $rejected_cagnottes_result->fetch_assoc()) {
                echo "<li class='cagnotte-item'>";
                echo "<p>Title: {$row['title']}</p>";
                echo "<p>Beneficiary: {$row['beneficiary']}</p>";
                echo "<p>Objective: {$row['objective']}</p>";
                echo "<p>Association Type: {$row['association_type']}</p>";
                echo "<p>Status: {$row['status']}</p>";
                echo "<p>Created At: {$row['created_at']}</p>";
                echo "</li>";
            }
        } else {
            echo "<li>No rejected cagnottes available.</li>";
        }

        $conn->close();
        ?>
    </ul>
</div>

</body>
</html>
