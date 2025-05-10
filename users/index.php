<?php 
    require("assets/php/db.php");

    //Checking for the validation of the reservation form
    if ($_POST) {
        $name = $_POST['name'];
        $phone_num = $_POST['phonenum'];
        $email = $_POST['email'];
        $numofPeople = $_POST['numofPeople'];
        $dateTime = $_POST['dateTime'];
        $message = $_POST['message'];


    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
    <link rel = "stylesheet" href = "assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="navbar"> <!--Navbar elements-->
            <div class="navbar-logo">
                <a href = ""><img src = "assets/css/images/r.avif"  id = "logo"></a>
                <a href = "#">Restaurant Name</a>
            </div>

            <div class="navbar-menu">        
                <a href = "#">Home</a>  
                <a href = "#">About</a>              
                <a href = "#">Menu</a>              
                <a href = "#">Reservation</a>
            </div>
        
    </div>

    
    <div class="home"> <!--Home Section-->
        <div class="slides"> <!--Image Slider-->
            <img src = "assets/css/images/img1.jpg">
        </div>
        <div class="slides">
            <img src = "assets/css/images/img4.jpg">
        </div>
        <!--Buttons for next and previous-->
        <a class = "prev" onclick = "plusSlides(-1)">&#10094;</a>
        <a class = "next" onclick = "plusSlides(1)">&#10095;</a>
    </div>
    <hr>
    <div class="about"> <!--About Section-->
        <h2>About Us</h2>
        <div class="intro">
            <div class="intro-img"> 
                <img src = "assets/css/images/restimg.jpg" alt = "Image of the restaurant">
            </div>
            <div class="intro-text">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Neque doloremque asperiores, sint quos accusantium culpa quae officia consequatur fuga facere consectetur earum assumenda doloribus, enim porro ipsam itaque aspernatur tempora.
                Consequuntur ratione id, nostrum dolores provident earum maiores natus eaque ea magnam aliquid deserunt tempore delectus ipsa iusto modi asperiores corporis voluptatibus labore vitae cumque impedit ipsum consectetur. Saepe, iste.
                </p>
            </div>
        </div>
    </div>


    <div class="menu"> <!--Menu Section-->
        <h2>Menu</h2>
        <div class="menu-items"> <!--Collection of Menu Items-->
            <div class="menu-item"> <!--Menu item image and text-->
                <div class="menu-item-text">
                    <p>A Chicken Burger with fries</p>
                </div>
                <div class="menu-item-img">
                    <img src = "assets/css/images/burger.jpg" alt = "image of burger">
                </div>
                
            </div>
            <div class="menu-item">
                <div class="menu-item-text">
                    <p>A Chicken Burger with fries</p>
                </div>
                <div class="menu-item-img">
                    <img src = "assets/css/images/burger.jpg" alt = "image of burger">
                </div>
                
            </div>
            <div class="menu-item">
                <div class="menu-item-text">
                    <p>A Chicken Burger with fries</p>
                </div>
                <div class="menu-item-img">
                    <img src = "assets/css/images/burger.jpg" alt = "image of burger">
                </div>
                
            </div>
        </div>
    </div>

    <div class="reservation"> <!--Reservation Section-->
        <h2>Reservation</h2>
        <div class="form-block">
            <h3>Reserve a Table:</h3>
            <form method = "post"> <!--Reservation Form-->
                <div class="form-group">
                    <label for = "name" class = "required">Name</label>
                    <input type = "text" name = "name" id = "name"  placeholder = "Name" required>
                </div>

                <div class="form-group">
                    <label for = "phonenum" class = "required">Phone Number</label>
                    <input type = "number" name = "phonenum" id = "phonenum"  placeholder = "Phone Number" maxlength="10" required>
                </div>
                
                <div class="form-group">
                    <label for = "email">Email Address</label>
                    <input type = "email" name = "email" id = "email"  placeholder = "Email Address">
                </div>

                <div class="form-group">
                    <label for = "numofPeople" class = "required">How many People ?</label>
                    <input type = "number" name = "numofPeople" id = "numofPeople"  placeholder = "How many People?" required>
                </div>

                <div class="form-group">
                    <label for = "dateTime" class = "required">When?</label >
                    <input type = "datetime" name = "dateTime" id = "dateTime"  placeholder = "09/05/2025.12:00" required>
                </div>

                <div class="form-group">
                    <label for = "message">Message/Special Request</label>
                    <input type = "text" name = "message" id = "message"  placeholder = "Message / Special Request">
                </div>

                <div class="form-group">
                    <input type = "submit" value = "submit" id = "submit">
                </div>

            </form>
        </div>
    </div>

    <div class="footer"> <!--Footer Section-->
        <div class="icons"> <!--Social Media Icons-->
            <a class = "icon"><i class="fa-brands fa-facebook"></i></a>
            <a class = "icon"><i class="fa-brands fa-x-twitter"></i></a>
            <a class = "icon"><i class="fa-brands fa-instagram"></i></a>
        </div>

        <div class="text"> <!--Location and Contact Info-->
            <p id = "location">Outlet At: Pulchowk</p>
            <p id = "contact">Contact Us: 9844415684 | 01-5558884</p>
        </div>
    </div>

    <script src = "assets/js/script.js"></script>
</body>
</html>