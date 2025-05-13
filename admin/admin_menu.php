<?php 
    session_start();    
    include('admin_index.php');
    include('../users/assets/php/db.php');
    include('admin_logout.php');
    

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if ($_POST['form-type'] === "editMenu") { //Checking whether the form submit is for editMenu or Delete button
            $itemName = $_POST['add']; //Assigning name of the item for menu
            $itemPrice = $_POST['price'];//Assigning price
            $uploadDir = 'assets/css/menu-images'; //Directory where the image should be stored
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
        else if ($_POST['form-type'] === "delete"){ 
            $id = intval($_POST['menu_id']); //Converting the id into int if not in int
            $getImage = "SELECT image_path FROM menu WHERE id = '$id'";
            $resultImage = mysqli_query($link, $getImage);

            if ($resultImage && mysqli_num_rows($resultImage) > 0) { //Checking if the id exists
                $row = mysqli_fetch_assoc($resultImage);
                $imagePath = $row['image_path'];

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $queryDelete = "DELETE FROM menu WHERE id = $id"; //Deletion query
            if (mysqli_query($link, $queryDelete)) {
                echo "<script>alert('Menu item deleted successfully');</script>";
            } else {
                echo "<script>alert('Failed to delete menu item');</script>";
            }
        
        }
        else if ($_POST['form-type'] === "editMenuItem") {
            $editId = intval($_POST['edit_id']);
            $newName = $_POST['edit_name'];
            $newPrice = $_POST['edit_price'];
            $updateImg = "";

            if (!empty($_FILES['edit_img']['name'])) {
                $uploadDir = 'assets/css/menu-images'; 
                $imageName = basename($_FILES['edit_img']['name']); 
                $targetFile = $uploadDir . '/' . uniqid() . '_' . $imageName; 
                $imageType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION)); 

                //Validation
                $allowedTypes = ['jpg', 'jpeg', 'png'];
                if (!in_array($imageType, $allowedTypes)) {
                    die("Only JPG, JPEG & PNG files are allowed.");
                }

                if (move_uploaded_file($_FILES['edit_img']['tmp_name'], $targetFile)) { 
                    $oldImg = mysqli_query($link, "SELECT image_path FROM menu WHERE id = '$editId'");
                    if ($oldImg && mysqli_num_rows($oldImg) > 0) {
                        $old = mysqli_fetch_assoc($oldImg);
                        if (file_exists($old['image_path'])) {
                            unlink($old['image_path']);
                        }
                    }
                    $updateImg = ", image_path = '$targetFile'";
                }
                else {
                    echo "<script>alert('Menu edit upload failed;)</script>";
                }
            }
            $updateQuery = "UPDATE menu SET item_name = '$newName', price = '$newPrice' $updateImg WHERE id = '$editId'";
                if (mysqli_query($link, $updateQuery)) {
                    echo "<script>alert('Menu item updated successfully');</script>";
                } else {
                    echo "<script>alert('Failed to update menu item');</script>";
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
                <form method = "post">
                    <button type = "submit" name = "logout" value = "logout">Log Out</button>
                </form>
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
                                        <input type = "hidden" name = "menu_id" value = "<?= $row['id'] ?>">
                                        <button type = "button" id = "editBtn" name = "form-type" value = "edit" onclick = "openEditMenu('<?= $row['id'] ?>', '<?= htmlspecialchars($row['item_name']) ?>', '<?= $row['price'] ?>')" data-id = "<?= $row['id']?>" >Edit</button>
                                        <button id = "deleteBtn" name = "form-type" value = "delete" onclick = "return confirm('Do you really wanna delete this record')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>
            <div class="content">
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

            <!-- Modal Form -->
        <div class="edit-container" id = "modal">
            <div class="edit-content">
                <span id = "edit-closebtn">&times;</span>
                <h2>Edit Menu Items</h2>
                <form class = "edit-form" method = "post" enctype = "multipart/form-data">
                    <input type="hidden" name="form-type" value="editMenuItem">
                    <input type="hidden" name="edit_id" id="edit_id">

                    <label for="edit_name">Item Name:</label>
                    <input type="text" name="edit_name" id="edit_name" required>

                    <label for="edit_price">Price:</label>
                    <input type="text" name="edit_price" id="edit_price" required>

                    <label for="edit_img">Change Image (optional):</label>
                    <input type="file" name="edit_img" id="edit_img">

                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
    <script src = "assets/js/admin_script.js"></script>
</body>
</html>