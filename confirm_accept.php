<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accepted Cagnottes</title>
    <style>
        /* Vos styles CSS ici */
    </style>
</head>
<body>

<h1>Accepted Cagnottes</h1>

<div class="container">
    <ul class="cagnotte-list">
        <?php
        $conn = new mysqli("localhost", "root", "", "tutorial");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $accepted_cagnottes_sql = "SELECT * FROM cagnotte WHERE status = 'accepted'";
        $accepted_cagnottes_result = $conn->query($accepted_cagnottes_sql);

        if ($accepted_cagnottes_result->num_rows > 0) {
            while ($row = $accepted_cagnottes_result->fetch_assoc()) {
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
            echo "<li>No accepted cagnottes available.</li>";
        }

        $conn->close();
        ?>
    </ul>
</div>

</body>
</html>
