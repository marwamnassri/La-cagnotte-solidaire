<?php
session_start();

include("php/config.php"); // Assurez-vous d'inclure la configuration de votre connexion à la base de données

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $result = mysqli_query($con, "SELECT * FROM users WHERE Email='$email'") or die("Select Error");
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($password, $row['Password'])) {
        $_SESSION['valid'] = $row['Email'];
        $_SESSION['username'] = $row['Username'];
        $_SESSION['age'] = $row['Age'];
        $_SESSION['id'] = $row['Id'];

        header("Location: index.php");
        exit();
    } else {
        // Vérifie si l'e-mail existe dans la base de données
        $email_check = mysqli_query($con, "SELECT * FROM users WHERE Email='$email'");
        if(mysqli_num_rows($email_check) == 0) {
            $errorMessage = "This email address is not registered.";
        } else {
            $errorMessage = "Wrong username or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index1.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="box form-box">
            <?php if (isset($errorMessage)) : ?>
                <div class='message'>
                    <p><?php echo $errorMessage; ?></p>
                </div>
                <br>
            <?php endif; ?>

            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>

                <div class="links">
                    Don't have an account? <a href="sign_up.php">Sign Up Now</a>
            </br>
                    <a href="reset_password.php">forget password?</a>


                </div>
            </form>
        </div>
    </div>
</body>

</html>
