<?php
include("Dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/img/icon.jpg" rel="icon">
    <link rel="stylesheet" href="assets/css/Final.css">
    <title>Dashboard</title>
    <style>
        body {
            background-image: url('assets/img/Lbg2.jpg');
            backdrop-filter: blur(10px);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            overflow-x: hidden;
        }

        .profile-icon {
            cursor: pointer;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: url("assets/img/profile_icon.jpg") center/cover;
        }

        .sidebar {
            width: 200px;
            height: 100vh;
            background: #1f1f1f;
            position: fixed;
            top: 0;
            right: -200px;
            padding-top: 60px;
            overflow-y: auto;
            transition: right 0.3s ease-in-out;
        }

        .sidebar.active {
            right: 0;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            color: white;
            cursor: pointer;
            padding: 15px;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
        }

        .logout-button {
            position: absolute;
            bottom: 50px;
            right: 50px;
            background: red;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
        }

        .logout-button:hover {
            background: darkred;
        }

        .preference-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .preference-item {
            width: 22%;
            max-width: 250px;
            height: 250px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .preference-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .preference-item:hover {
            transform: scale(1.1);
        }

        .video-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .video-box {
            width: 320px;
            text-align: center;
        }

        .slider-section {
            
            padding: 30px 0; /* Adds spacing around the slider */
        }

        /* Slider Container */
        .slider-container {
            position: relative;
            width: 100%;
            max-width: 600px; /* Adjust width */
            margin: 80px auto 0; /* Space below header */
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
    
        /* Slider Wrapper */
        .slider-wrapper {
            display: flex;
            width: 100%;
            overflow: hidden;
        }
    
        /* Slider Track */
        .slider {
            display: flex;
            width: 700%; /* 7 images */
            transition: transform 0.5s ease-in-out;
        }
    
        .slider img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }
    
        /* Navigation Buttons */
        .prev, .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            
            color: black;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 18px;
            border-radius: 5px;
        }
    
        .prev { left: 10px; }
        .next { right: 10px; }
    
        .prev:hover, .next:hover {
            background: white;
        }


/* Diet section */
.diet-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.diet-item {
    width: 30%; /* Ensures 3 in a row */
    max-width: 250px;
    height: 250px; /* Bigger size */
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 10px;
    transition: transform 0.3s ease;
}

.diet-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10px;
}

.diet-item:hover {
    transform: scale(1.1);
}

/* Responsive Design */
@media (max-width: 1024px) {
    .preference-item, .diet-item {
        width: 30%; /* Adjust for tablets */
    }
}

@media (max-width: 768px) {
    .preference-item, .diet-item {
        width: 45%; /* Adjust for mobile */
    }
}
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="assets/img/icon.jpg" alt="Logo">
        </div>
        <div class="header-left">FitLife</div>
        <ul class="nav-links">
            <li><a href="Index.html">Home</a></li>
            <li><a href="About_us.html">About Us</a></li>
            <li><div class="profile-icon" onclick="toggleSidebar()"></div></li>
        </ul>
    </div>

    <div class="sidebar" id="sidebar">
        <ul>
            <li><a href="Editprofile.php">Edit Profile</a></li>
            <li><a href="Progress.php">Track Progress</a></li>
        </ul>
        <a href="logout.php" class="logout-button">Logout</a>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("active");
        }
    </script>

<div class="c-container">
<!-- Image Slider -->
<div class="slider-section">
    <div class="slider-container">
        <div class="slider-wrapper">
            <div class="slider" id="slider">
                <img src="assets/img/slider1.jpg" alt="Slide 1">
                <img src="assets/img/slider2.jpg" alt="Slide 2">
                <img src="assets/img/slider3.jpg" alt="Slide 3">
                <img src="assets/img/slider4.jpg" alt="Slide 4">
                <img src="assets/img/slider5.jpg" alt="Slide 5">
                <img src="assets/img/slider6.jpg" alt="Slide 6">
                <img src="assets/img/slider7.jpg" alt="Slide 7">
            </div>
        </div>
       <button class="prev" onclick="prevSlide()">❮</button>
       <button class="next" onclick="nextSlide()">❯</button>
    </div>
   </div>

   <script>
     let currentIndex = 0;
     const slides = document.querySelectorAll('.slider img');
     const totalSlides = slides.length;
     const slider = document.getElementById("slider");

     function showSlide(index) {
         if (index >= totalSlides) { currentIndex = 0; }
         else if (index < 0) { currentIndex = totalSlides - 1; }
         else { currentIndex = index; }

         const offset = -currentIndex * 100 + "%";
         slider.style.transform = "translateX(" + offset + ")";
       }

     function nextSlide() { showSlide(currentIndex + 1); }
     function prevSlide() { showSlide(currentIndex - 1); }

     let autoSlide = setInterval(nextSlide, 3000); // Auto-slide every 3 seconds

     // Stop auto-slide when hovering over the slider
     document.querySelector(".slider-container").addEventListener("mouseenter", () => {
         clearInterval(autoSlide);
       });

     // Resume auto-slide when the mouse leaves
     document.querySelector(".slider-container").addEventListener("mouseleave", () => {
         autoSlide = setInterval(nextSlide, 3000);
       });
   </script>

<!-- WORKOUT CATEGORIES -->
<div class="preference-section">
        <h2 style="color:white; text-align: center;">Choose Your Way To Exercise:</h2>
        <div class="preference-container">
            <?php

            $result = mysql_query("SELECT DISTINCT w_name, image_path FROM workout", $con);
            while ($row = mysql_fetch_assoc($result)) {
                $category = $row['w_name'];
                $image = $row['image_path'];
            
                echo "<a href='Workouts.php?category=$category' class='preference-item'>";
                echo "<img src='$image' alt='$category' width='200' height='200' />";
                echo "</a>";
            }
            ?>
        </div>
    </div>

<!-- DIET PLANS SECTION -->
<div class="diet-section">
    <h2 style="color:white; text-align: center;">Choose Your Diet Plan:</h2>
    <div class="diet-container">
        <?php
        $result = mysql_query("SELECT plan_name, recommended_for, image_path FROM diet_plan", $con);
        while ($row = mysql_fetch_assoc($result)) {
            $plan_name = $row['plan_name'];
            $image = $row['image_path'];

            echo "<a href='Diet.php?plan=$plan_name' class='diet-item'>";
            echo "<img src='$image' alt='$plan_name' width='200' height='200' />";
            echo "</a>";
        }
        ?>
    </div>
</div>


</body>
</html>
