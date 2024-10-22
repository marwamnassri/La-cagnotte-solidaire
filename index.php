


<?php
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['valid'])) {
    // Si l'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
    header("Location: login.php");
    exit();
}

// Si l'utilisateur est connecté, récupérez les informations de l'utilisateur
$username = $_SESSION['username'];
$age = $_SESSION['age'];
$email = $_SESSION['valid'];

// Définissez des cookies avec les informations de l'utilisateur
setcookie("username", $username, time() + (30 * 24 * 60 * 60));  // Expire dans 30 jours
setcookie("age", $age, time() + (30 * 24 * 60 * 60));
setcookie("email", $email, time() + (30 * 24 * 60 * 60));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" 
    integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    
    <link rel="stylesheet" href="css/index.css">
    <title>the charity</title>


    
</head>

<body>
<div class="nevbar" id="nevbar">
        <div class="logo">
            <a href="/index.php" id="logo"><h1><span></span> CHARITY</h1></a>
        </div>

        <div class="menu" id="menu">
            <ul>
                <li><a id="home" href="index.php">Home</a></li>
                <li><a href="#service">Service</a></li>
                <li><a href=http://localhost/pfe0/contact.php>Contact</a></li>
                <li><a href="recu.php">Receipt</a></li>   
                <li><a href="list.php">List</a></li>           
                <li><a href="#categories">categories</a></li>             
                <li><a href="edit.php"  >change Profile</a></li>



       <!-- Accédez aux valeurs des cookies lors de futures visites -->

<?php
$savedUsername = isset($_COOKIE["username"]) ? $_COOKIE["username"] : "";

$savedAge = isset($_COOKIE["age"]) ? $_COOKIE["age"] : "";
$savedEmail = isset($_COOKIE["email"]) ? $_COOKIE["email"] : "";


// Affichez les informations récupérées
if ($savedUsername && $savedEmail) {
    echo "<div style='color: green;'>";
    
    echo "<p style='color: green;'>Nom: " . $savedUsername . "</p>";

    echo "<p style='color: green;'>Email: " . $savedEmail . "</p>";
    echo "</div>";
}

?>
 <div class="right-links">
            
            <a href="login.php"> <button class="btn">Log Out</button> </a>
        </div>








            </ul>
           
        </div>
        


        

        <div class="menuicon">
            <i id="menuicon" onclick="togglemenu()" class="fas fa-chevron-circle-down"> <span>MENU</span></i>
        </div>
    </div>
    

    <div class="cover">

<div class="information">
    <h1>-</h1>
    <h3>Raising Hope</h3>
    <h2>"To spread happiness among communities, we host events and activities that unite and uplift everyone."</h2>
    <h1> <span>FUTURE</span> </h1>
    <h3> <span>The  Foundation Charity</span> </h3>
    <h1>-</h1>
    
    <a href="dons.php" ><button>DONATE</button></a>
</div>


<div class="about">
       
        <div class="aboutcontent">
            <h5>_</h5>
            <h1>Why Donate?</h1>
            <p>This pandemic has forced over 6 Million* children to drop off from school. Your contribution can help them reshape their lives by providing for their education.</p>
            <p>We help them get access to learning materials, internist connectivity, laptops, and smartphones to keep the learning alive!</p>
            <a href="create.php" target="black">Create a money pot</a>
            <br>
            <br>
            <h5>_</h5>

        </div>
    </div>

    <!-- ----------------------------------  Service -------------------------------------- -->
    <div class="service" id="service">

        <h5>SERVICES</h5>
        <h1>Our Latest Services</h1>

        <div class="details">

            <div class="info">

                <div class="logo"><i class="fas fa-book-reader"></i></div>
                <p id="head">What we do  </p>
    
                 <a href="head.php">Read more..</a>


            </div>

            <div class="info" data-aos="fade-up">

                <div class="logo"><i class="fas fa-book-open"></i></div>
                <p id="head">How we do it</p>
                <a href="head.php">Read more..</a>
               
            </div>

            <div class="info" data-aos="fade-up">

                <div class="logo"><i class="fas fa-book"></i></div>
                <p id="head">Make a difference</p>
                <a href="head.php">Read more..</a>

                

            </div>

            <div class="info" data-aos="fade-up">

                <div class="logo"><i class="fas fa-chart-line"></i></div>
                <p id="head">Lives benefitted so far</p>
                <a href="head.php">Read more..</a>

            </div>

        </div>

    </div>






    <!-- ---------------------------------- Categories Section ---------------------------------- -->
<div class="categories" id="categories">

<h5>CATEGORIES</h5>
<h1>Explore Our Categories</h1>

<div class="category-list">
    <!-- Santé Category -->
    <a href="sante.php" class="category">
        <i class="fas fa-heartbeat"></i>
        <h3>Health</h3>
        <p>Discover our projects related to health.</p>
    </a>

    <!-- Éducation Category -->
    <a href="education.php" class="category">
        <i class="fas fa-graduation-cap"></i>
        <h3>Education</h3>
        <p>Explore our educational initiatives.</p>
    </a>

    <!-- Événement Category -->
    <a href="evenement.php" class="category">
        <i class="fas fa-calendar-alt"></i>
        <h3>Event</h3>
        <p>Participate in our community events.</p>
    </a>

    <!-- Mariage Category -->
    <a href="mariage.php" class="category">
        <i class="fas fa-ring"></i>
        <h3>Marriage</h3>
        <p>Support projects related to marriage.</p>
    </a>

    <!-- Environnement Category -->
    <a href="environnement.php" class="category">
        <i class="fas fa-leaf"></i>
        <h3>Environment</h3>
        <p>Act to protect our environment.</p>
    </a>
</div>
</div>



    <footer>
        <p>&copy 2024 Made with ❤️ By </p>
    </footer>
    <!-- scripts  -->
    <script>
        // drop down menu script
        var menu = document.getElementById("menu");
        menu.style.maxHeight = "0px";
        function togglemenu() {
            if (menu.style.maxHeight == "0px") {
                menu.style.maxHeight = "390px";
            }
            else {
                menu.style.maxHeight = "0px";
            }
        }
    </script>




</body>
</html>





