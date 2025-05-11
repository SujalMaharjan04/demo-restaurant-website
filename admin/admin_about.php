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
                <h1>About</h1>
                <table border = "1" cellspacing = "0" cellpadding = "10">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Info</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        

                    </tbody>
                </table>
            </div>

            <div class="editAbout">
                <form method = "post">
                    <div class="editAbout-text">
                        <label for = "add">Add a New About:</label>
                        <input type = "text" name = "add" id = "add">
                    </div>
                    <div class="editAbout-img">
                        <label for = "addImg">Add a New Image:</label>
                        <input type = "file" name = "addImg" id = "addImg">
                    </div>
                    <div class="editAbout-button">
                        <button type = "submit">Add</button>
                        <button type = "reset">Reset</button>
                    </div>
                </form>
            </div>
    </div>
</body>
</html>
