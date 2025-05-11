<?php include('admin_index.php'); ?>
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

            <div class="table-content">
                <h1>Menu</h1>
                <table border = "1" cellspacing = "0" cellpadding = "10">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        

                    </tbody>
                </table>
            </div>
            <div class="editMenu">
                <form method = "post">
                    <div class="editMenu-text">
                        <label for = "add">Add a New Menu:</label>
                        <input type = "text" name = "add" id = "add">
                    </div>
                    <div class="editMenu-img">
                        <label for = "addImg">Add a New Image:</label>
                        <input type = "file" name = "addImg" id = "addImg">
                    </div>
                    <div class="editMenu-button">
                        <button type = "submit">Add</button>
                        <button type = "reset">Reset</button>
                    </div>
                </form>
            </div>
    </div>
</body>
</html>