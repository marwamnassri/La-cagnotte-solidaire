<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Admin Panel</title>
    <link rel="stylesheet" href="dashord.css"> 
    <style>
        /* Styles spécifiques pour les statistiques */
        .statistics {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        
        .card {
            width: calc(25% - 20px); /* 25% moins l'espace entre les cartes */
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        
        .card h3 {
            margin-top: 0;
            font-size: 24px;
            color: #333;
        }
        
        .card p {
            margin: 0;
            font-size: 18px;
            color: #666;
        }

        /* Styliser le cercle multicolore */
        .traffic-source {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: conic-gradient(#ff0000 0%, #ff0000 33.3%, #00ff00 33.3%, #00ff00 66.6%, #0000ff 66.6%, #0000ff 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 24px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .traffic-source:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Styles pour l'histogramme */
        .sales-stats {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }
        
        .sales-category {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .sales-category span {
            width: 150px;
            font-weight: bold;
        }
        
        .sales-bar {
            height: 20px;
            background-color:gainsboro;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome</h1>
        <a href="Logout.php">Logout</a> 
    </header>
    
    <nav>
        <ul>
            <li><a href="manage_users.php">Manage Users</a></li>
            <li><a href="affichagedons.php">Manage Donation</a></li>
            <li><a href="message.php">Manage Message</a></li>
            <li><a href="cagnotte_list.php">Cagnotte List</a></li>
        </ul>
    </nav>
    <main>
        <h2 style="text-align: center;">Statistiques</h2>
        <div class="statistics">
            <div class="card">
                <h3>Total users</h3>
                <p>100</p>
            </div>
            <div class="card">
                <h3>Donations received</h3>
                <p>$5000</p>
            </div>
            <div class="card">
                <h3>Unread messages</h3>
                <p>5</p>
            </div>
            <div class="card">
                <h3>Cagnottes </h3>
                <p>3</p>
            </div>

        </div>

        <!-- Histogramme des ventes -->
        <div class="sales-stats">
            <div class="sales-category">
                <span>Donation:</span>
                <div class="sales-bar" style="width: 70%;"></div>
            </div>
            <div class="sales-category">
                <span>Cagnottes:</span>
                <div class="sales-bar" style="width: 50%;"></div>
            </div>
            <div class="sales-category">
                <span>Shares:</span>
                <div class="sales-bar" style="width: 40%;"></div>
            </div>
        </div>
    </main>
   
</body>
</html>
