<!DOCTYPE html>
<html>
<head>
 <title>Cards</title>
 <link rel="stylesheet" href="">
</head>

<style type="text/css">
*{
 margin: 0px;
 padding: 0px;
}
body{
 font-family: arial;
}
.main{
 margin: 2%;
 display: flex;
 justify-content: center;
}

.card {
    width: calc(25% - 20px); /* 25% pour 4 cartes par ligne, soustrayez la marge pour éviter les débordements */
    display: inline-block;
    box-shadow: 2px 2px 20px black;
    border-radius: 5px;
    margin: 10px; /* Augmentez ou diminuez selon l'espace désiré entre les cartes */
    box-sizing: border-box; /* Inclure les marges et les bordures dans la largeur déclarée */
}

.image img {
    width: 100%;
    height: 200px; /* Définissez la hauteur fixe souhaitée pour les images */
    object-fit: cover; /* Assurez-vous que les images ne se déforment pas */
    border-top-right-radius: 5px;
    border-top-left-radius: 5px;
}

.title {
    text-align: center;
    padding: 10px;
}

.des {
    padding: 3px;
    text-align: center;
    padding-top: 10px;
    border-bottom-right-radius: 5px;
    border-bottom-left-radius: 5px;
}

h1 {
    font-size: 20px;
}

button {
  margin-top: 10px;
  background-color: white;
  border: 1px solid black;
  border-radius: 5px;
  padding: 10px;
  width: 100%; /* Ajustez la largeur du bouton pour qu'il corresponde à la largeur de la carte */
  box-sizing: border-box; /* Inclure les marges et les bordures dans la largeur déclarée */
}

button:hover {
  background-color: black;
  color: white;
  transition: .5s;
  cursor: pointer;
}
section {
  width: 100%;
  display: inline-block;
  background: #333;
  height: 50vh;
  text-align: center;
  font-size: 90px;
  font-weight: 700;
  text-decoration: underline;
}

.footer-distributed{
  background: #666;
  box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
  box-sizing: border-box;
  width: 100%;
  text-align: left;
  font: bold 16px sans-serif;
  padding: 55px 50px;
}

.footer-distributed .footer-left,
.footer-distributed .footer-center,
.footer-distributed .footer-right{
  display: inline-block;
  vertical-align: top;
}

/* Footer left */

.footer-distributed .footer-left{
  width: 40%;
}

/* The company logo */

.footer-distributed h3{
  color:  #ffffff;
  font: normal 36px 'Open Sans', cursive;
  margin: 0;
}

.footer-distributed h3 span{
  color:  lightseagreen;
}

/* Footer links */

.footer-distributed .footer-links{
  color:  #ffffff;
  margin: 20px 0 12px;
  padding: 0;
}

.footer-distributed .footer-links a{
  display:inline-block;
  line-height: 1.8;
  font-weight:400;
  text-decoration: none;
  color:  inherit;
}

.footer-distributed .footer-company-name{
  color:  #222;
  font-size: 14px;
  font-weight: normal;
  margin: 0;
}

/* Footer Center */

.footer-distributed .footer-center{
  width: 35%;
}

.footer-distributed .footer-center i{
  background-color:  #33383b;
  color: #ffffff;
  font-size: 25px;
  width: 38px;
  height: 38px;
  border-radius: 50%;
  text-align: center;
  line-height: 42px;
  margin: 10px 15px;
  vertical-align: middle;
}

.footer-distributed .footer-center i.fa-envelope{
  font-size: 17px;
  line-height: 38px;
}

.footer-distributed .footer-center p{
  display: inline-block;
  color: #ffffff;
  font-weight:400;
  vertical-align: middle;
  margin:0;
}

.footer-distributed .footer-center p span{
  display:block;
  font-weight: normal;
  font-size:14px;
  line-height:2;
}

.footer-distributed .footer-center p a{
  color:  lightseagreen;
  text-decoration: none;;
}

.footer-distributed .footer-links a:before {
  content: "|";
  font-weight:300;
  font-size: 20px;
  left: 0;
  color: #fff;
  display: inline-block;
  padding-right: 5px;
}

.footer-distributed .footer-links .link-1:before {
  content: none;
}

/* Footer Right */

.footer-distributed .footer-right{
  width: 20%;
}

.footer-distributed .footer-company-about{
  line-height: 20px;
  color:  #92999f;
  font-size: 13px;
  font-weight: normal;
  margin: 0;
}

.footer-distributed .footer-company-about span{
  display: block;
  color:  #ffffff;
  font-size: 14px;
  font-weight: bold;
  margin-bottom: 20px;
}

.footer-distributed .footer-icons{
  margin-top: 25px;
}

.footer-distributed .footer-icons a{
  display: inline-block;
  width: 35px;
  height: 35px;
  cursor: pointer;
  background-color:  #33383b;
  border-radius: 2px;

  font-size: 20px;
  color: #ffffff;
  text-align: center;
  line-height: 35px;

  margin-right: 3px;
  margin-bottom: 5px;
}

/* If you don't want the footer to be responsive, remove these media queries */

@media (max-width: 880px) {

  .footer-distributed{
    font: bold 14px sans-serif;
  }

  .footer-distributed .footer-left,
  .footer-distributed .footer-center,
  .footer-distributed .footer-right{
    display: block;
    width: 100%;
    margin-bottom: 40px;
    text-align: center;
  }

  .footer-distributed .footer-center i{
    margin-left: 0;
  }

}
</style>
<body>

<div class="cover">
<div class="information">
<h3></h3>
</div>
</div>

<div class="main">
 <!--cards -->
 <div class="card">
  <div class="image">
     <img  src="https://i.ibb.co/1M1k4c2/m.jpg" >
  </div>
  <div class="title">
   <h1>Aidez-moi à payer mon loyer</h1>
  </div>
  <div class="des">
   <a href="page1.php">Read More... </a>
  </div>
 </div>
 <!--cards -->
 <div class="card">
  <div class="image">
     <img src="https://i.ibb.co/bLd4ht9/l.jpg" >
  </div>
  <div class="title">
   <h1>Pour imprimer un Jeu de carte éducatif</h1>
  </div>
  <div class="des">
   <a href="page2.php">Read More...</a>
  </div>
 </div>
 <!--cards -->
 <div class="card">
  <div class="image">
     <img src="https://i.ibb.co/v1CDhZ3/ec.jpg" >
  </div>
  <div class="title">
   <h1>العودة المدرسية المتضامنة </h1>
  </div>
  <div class="des">
</br>
   <a href="page3.php">Read More...</a>

  </div>
 </div>
</br>
</br>
 <!--cards -->
 <div class="card">
  <div class="image">
     <img src="https://i.ibb.co/ZLXN251/gaza.jpg" >
  </div>
  <div class="title">
   <h1>GAZA STUDENTS "50 PEOPLE" 150 DT للطلبة كل شهر</h1>
  </div>
  <div class="des">
  <a href="page4.php">Read More...</a>

</div>
 </div>
 
 
</div>


<footer class="footer-distributed">

      <div class="footer-left">

        <h3>Charity<span>logo</span></h3>

        <p class="footer-links">
          
          
          <a id="home" href="index.php">Home</a>
               
                
                <a href="#categories">contact</a>           
                
        </p>

        <p class="footer-company-name">Company Name © 2024</p>
      </div>

      <div class="footer-center">

        <div>
          <i class="fa fa-map-marker"></i>
          <p><span></span> Gafsa, Tunisia</p>
        </div>

        <div>
          <i class="fa fa-phone"></i>
          <p></p>
        </div>

        <div>
          <i class="fa fa-envelope"></i>
          <p><a href="mailto:support@company.com">Charity@company.com</a></p>
        </div>

      </div>

      <div class="footer-right">

        <p class="footer-company-about">
          <span>About the company</span>
          Charity is a non-profit organization dedicated to improving the lives of those in need. Through our various initiatives and programs, we strive to provide essential support and resources to vulnerable communities around the world. Our mission is to create positive and lasting change by fostering compassion, generosity, and hope
        </p>

        <div class="footer-icons">

          

        </div>

      </div>

    </footer>

</body>
</html>
