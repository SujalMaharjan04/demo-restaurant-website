<?php 

    session_start();
    //To prevent access to admin page without logging in
    if (!isset($_SESSION['username'])) {
        header("Location: ../users/index.php");
        exit;
    }
    include('admin_index.php'); 

    include('admin_logout.php');

    require('../users/assets/php/db.php');

    $query = "SELECT COUNT(*) AS total FROM reservation";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $total = $row['total'];
    
        
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
                <form method = "post">
                    <button type = "submit" name = "logout" value = "logout">Log Out</button>
                </form>
            </div>

            <div class="main-content">
                <div class="card">Reservation : <?= $total ?></div>
                <div class="card">Menu</div>

            </div>
    </div>

   
</body>
</html>