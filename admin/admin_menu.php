<?php 
    include('admin_index.php');
    include('../users/assets/php/db.php');
    

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if ($_POST['form-type'] === "editMenu") { //Checking whether the form submit is for editMenu or Delete button
            $itemName = $_POST['add']; //Assigning name of the item for menu
            $itemPrice = $_POST['price'];//Assigning price
            $uploadDir = 'assets/css/images'; //Directory where the image should be stored
            $imageName = basename($_FILES['addImg']['name']); //Storing the basename of the image given to addImg. Here name is attribute and addImg is value
            $targetFile = $uploadDir . '/' . uniqid() . '_' . $imageName; //Assigning unique id to the image name for preventing name collision
            $imageType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION)); //Taking the extension of the image

            //Validation
            $allowedTypes = ['jpg', 'jpeg', 'png'];
            if (!in_array($imageType, $allowedTypes)) {
                die("Only JPG, JPEG & PNG files are allowed.");
            }

            if (move_uploaded_file($_FILES['addImg']['tmp_name'], $targetFile)) { //Moving the image stored in temp location  to targetFile
                $query = $link->prepare("INSERT INTO menu (item_name, price, image_path) VALUES (?, ?, ?)");
                $query->bind_param("sis", $itemName, $itemPrice, $targetFile);
                $query->execute();
                echo "<script>alert('Menu item added successfully')</script>";
            }
            else {
                echo "<script>alert('Menu Item upload failed;)</script>";
            }
        }
        else if ($_POST['form-type'] === "action"){ 
            $id = intval($_POST['menu_id']); //Converting the id into int if not in int
            $queryDelete = "DELETE FROM menu WHERE id = $id"; //Deletion query
            if (mysqli_query($link, $queryDelete)) {
                echo "<script>alert('Menu item deleted successfully');</script>";
            } else {
                echo "<script>alert('Failed to delete menu item');</script>";
            }
        
        }
    }

    $queryResult = "SELECT * FROM menu";
    $result = mysqli_query($link, $queryResult);
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
                        
                        <!-- Php for filling the table with data -->
                        <?php while ($row = mysqli_fetch_assoc($result) ) {?>
                            <tr>
                                <td><?=htmlspecialchars($row['item_name']) ?></td>
                                <td><?=htmlspecialchars($row['price'] ?: '-') ?></td>
                                <td><?=htmlspecialchars($row['image_path'] ?: '-')?></td>
                                <td>
                                    <form method = "post" enctype = "multipart/form-data">
                                        <input type = "hidden" name = "form-type" value = "action">
                                        <input type = "hidden" name = "menu_id" value = "<?= $row['id'] ?>">
                                        <button id = "editBtn" name = "edit">Edit</button>
                                        <button id = "deleteBtn" name = "Delete" onclick = "return confirm('Do you really wanna delete this record')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>
            <div class="editMenu">
                <form method = "post" enctype = "multipart/form-data">
                    <input type = "hidden" name = "form-type" value = "editMenu">
                    <div class="edit-text">
                        <label for = "add">Add a New Menu:</label>
                        <input type = "text" name = "add" id = "add">
                    </div>
                    <div class="edit-price">
                        <label for = "price">Add a price:</label>
                        <input type = "text" name = "price" id = "price">
                    </div>
                    <div class="edit-img">
                        <label for = "addImg">Add a New Image:</label>
                        <input type = "file" name = "addImg" id = "addImg">
                    </div>
                    <div class="edit-button">
                        <button type = "submit" id = "submit">Add</button>
                        <button type = "reset" id = "reset">Reset</button>
                    </div>
                </form>
            </div>
    </div>
</body>
</html>