
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="" 
    integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <link rel="preconnect" href="">
    <link href="" rel="stylesheet">
    
    
    <link rel="stylesheet" href="css/index.css">
    <title>the charity</title>


    
</head>
<div class="contact" id="contact">
    <h1>CONTACT ME</h1>
    <br>
    <div class="contactcontanner">
        
        <div class="contanner">
            <div class="heading">
                <div class="icon"><i class="far fa-map"></i></div>
                <div class="info">
                    <p>Address : </p>
                    <p id="contactinfo">gafsa 2100</p>
                </div>
            </div>
            
            <div class="heading">
                <div class="icon"><i class="fas fa-phone-alt"></i></div>
                <div class="info">
                    <p>Phone : </p>
                    <p id="contactinfo">+777777</p>
                </div>
            </div>
            
            <div class="heading">
                <div class="icon"><i class="far fa-envelope"></i></div>
                <div class="info">
                    <p>Email : </p>
                    <p id="contactinfo">Charity@company.com</p>
                </div>
            </div>
        </div>
        
        <div class="messageform">
            <div class="form">
                <form action="envoi_message.php" method="POST">
                    
                    <style>
                        ::placeholder {color: rgba(255, 255, 255, 0.7);}
                    </style>

<input type="text" name="name" placeholder="NAME" required>
            <input type="email" name="email" placeholder="YOUR EMAIL" required>
            <input type="email" name="admin_email" placeholder="ADMIN EMAIL" required>
            <input type="text" name="subject" placeholder="SUBJECT" required>
            <textarea type="message" name="message" id="inputbox"  cols="30" rows="5" placeholder="MESSAGE" required></textarea>
            <button type="submit">SEND MESSAGE</button>
                </form>
            </div>
        </div>

    </div>          
</div>
