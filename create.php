<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Cagnotte</title>
    
    <style>
       
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #cfdacf;
        }

        h1 {
            text-align: center;
            color: black;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input[type="text"],
        select,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        select {
            appearance: none;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h1>Create a Cagnotte</h1>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
    <label for="title">Title :</label>
    <input type="text" name="title" required><br>

    <label for="beneficiary">Beneficiary :</label>
    <input type="text" name="beneficiary" required><br>

    <label for="objective">Objective (Donation Goal) :</label>
    <input type="text" name="objective" required><br>

    <label for="association_type">Association Type :</label>
    <select name="association_type" required>
        <option value="health">Health</option>
        <option value="education">Education</option>
        <option value="event">Event</option>
    </select><br>

    <label for="image">Image :</label>
    <input type="file" name="image" accept="image/*" required><br>

    <input type="submit" value="Create Cagnotte">
</form>

<?php
$conn = new mysqli("localhost", "root", "", "tutorial");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $title = $_POST["title"];
    $beneficiary = $_POST["beneficiary"];
    $objective = $_POST["objective"];
    $associationType = $_POST["association_type"];

    
    $image = $_FILES["image"];
    $user_id = 16; // Replace this with the actual user_id

    // Insert data into the cagnotte table
    $sql = "INSERT INTO cagnotte (user_id, title, beneficiary, objective, association_type) 
            VALUES ('$user_id', '$title', '$beneficiary', '$objective', '$associationType')";

    if ($conn->query($sql) === TRUE) {
        echo "Cagnotte information has been successfully stored in the database.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

</body>
</html>
