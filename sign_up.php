<?php 
session_start();
include("php/config.php");

if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Verify the uniqueness of the email
    $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");

    if(mysqli_num_rows($verify_query) != 0) {
        echo "<div class='message'>
                  <p>This email is already in use. Please try another one.</p>
              </div> <br>";
        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
    } else {
        // Use password_hash to securely hash passwords
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($con, "INSERT INTO users(Username,Email,Age,Password) VALUES('$username','$email','$age','$hashed_password')") or die("Error Occurred");

        echo "<div class='message'>
                  <p>Registration successful!</p>
              </div> <br>";
        echo "<a href='login.php'><button class='btn'>Login Now</button>";
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
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php if (!isset($_POST['submit'])) : ?>
                <header>Sign Up</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="age">Age</label>
                        <input type="number" name="age" id="age" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>

                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Register" required>
                    </div>

                    <div class="links">
                        Already a member? <a href="login.php">Sign In</a>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
