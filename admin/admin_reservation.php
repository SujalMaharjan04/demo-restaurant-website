<?php 
    session_start();
    include('admin_index.php'); 

    require('../users/assets/php/db.php');
    include('admin_logout.php');

    $query = 'SELECT name, phone_number, email, num_of_people, dateTime, message FROM reservation';

    $result = mysqli_query($link, $query);


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

            
            <div class="table-content">
                <h1>Reservations</h1>
                <table border = "1" cellspacing = "0" cellpadding = "10">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Email Address</th>
                            <th>No. of People</th>
                            <th>Date / Time</th>
                            <th>Message / Special Request</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <!--Php for filling the table in the html with data from the database -->
                        <?php 
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['name']) ?></td>
                                    <td><?= htmlspecialchars($row['phone_number']) ?></td>
                                    <td><?= htmlspecialchars($row['email']) ?: '-' ?></td>
                                    <td><?= htmlspecialchars($row['num_of_people']) ?></td>
                                    <td><?= htmlspecialchars($row['dateTime']) ?></td>
                                    <td><?= htmlspecialchars($row['message']) ?: '-' ?></td>
                                    
                                </tr>
                            <?php }
                        ?>

                    </tbody>
                </table>
            </div>
    </div>
</body>
</html>