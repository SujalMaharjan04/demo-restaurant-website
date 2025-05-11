<?php 

    session_start();
    include('admin_index.php'); 
    
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel = "stylesheet" href = "assets/css/admin_style.css">
</head>
<body>
    <div class="main">
            <div class="main-top">
                <h1>Dashboard</h1>
                <button onclick = "logout()">Log Out</button>
            </div>

            <div class="main-content">
                <div class="card">Reservation</div>
                <div class="card">Menu</div>

            </div>
    </div>
</body>
</html>