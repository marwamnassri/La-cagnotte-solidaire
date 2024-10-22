<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Paiement</title>
     
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #cfdacf;
        }

        h2 {
            text-align: center;
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
        input[type="email"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
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

        .card-images {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-images img {
            width: 150px;
            height: auto;
        }
    </style>
</head>
<body>
    <h2>Formulaire de Paiement</h2>
    <form action="traitement.php" method="post" onsubmit="return validateCardNumber()">
        <div>
            <label for="nom">Name :</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div>
            <label for="prenom">FirstName :</label>
            <input type="text" id="prenom" name="prenom" required>
        </div>
        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="montant">Amount of your participation in dinar :</label>
            <input type="number" id="montant" name="montant" required>
        </div>
        <div>
            <label for="mode_paiement">Payment method:</label>
            <div class="card-images">
                <input type="radio" id="visa" name="mode_paiement" value="Visa" required>
                <label for="visa"><img src="https://i.ibb.co/RhbvPLs/kon.png" alt="Visa"></label>
                
                <input type="radio" id="paypal" name="mode_paiement" value="PayPal" required>
                <label for="paypal"><img src="https://i.ibb.co/g9n1ygW/master.png" alt="PayPal"></label>
    
                <input type="radio" id="mastercard" name="mode_paiement" value="Mastercard" required>
                <label for="mastercard"><img src="https://i.ibb.co/qB1Hwdm/paypal.jpg" alt="Mastercard"></label>
            </div>
        </div>
        <div>
            <label for="num_carte">Card number:</label>
            <input type="text" id="num_carte" name="num_carte" maxlength="8" pattern="\d{8}" required>
        </div>
        <div>
            <input type="submit" value="Validate">
        </div>
    </form>

    <script>
        function validateCardNumber() {
            var cardNumber = document.getElementById('num_carte').value;
            if (cardNumber.length !== 8) {
                alert("The card number must be exactly 8 digits.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
