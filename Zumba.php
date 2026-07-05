<?php
include 'Dbcon.php';

// Fetch Zumba workout videos
$query = "SELECT video_name FROM workout_videos WHERE w_type = 'Zumba'";
$result = mysql_query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zumba</title>
    <link rel="stylesheet" href="assets/css/Exercise.css"> <!-- External CSS -->
    <link rel="stylesheet" href="assets/css/Final.css">
    <script src="assets/Scripts/scriptZ.js"></script> <!-- External JS -->

    <!-- Favicons -->
    <link href="assets/img/icon.jpg" rel="icon">

    <style>
        body {
            background-image: url('assets/img/Lbg2.jpg');
        }

        /* Profile Icon */
        .profile-icon {
            cursor: pointer;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white url('assets/img/profile_icon.jpg') center/cover; /* Replace with actual profile image */
        }

        /* Slide Menu */
        .slide-menu {
            position: fixed;
            top: 0;
            left: -250px; /* Hidden by default */
            width: 250px;
            height: 100vh;
            background: #222;
            padding-top: 60px;
            transition: 0.3s ease-in-out;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            z-index: 1100;
        }

        .menu-items {
            flex-grow: 1; /* Push settings & unregister to the bottom */
        }

        .slide-menu a {
            display: block;
            padding: 15px 20px;
            color: white;
            text-decoration: none;
            font-size: 18px;
            transition: 0.3s;
        }

        .slide-menu a:hover {
            background: #444;
        }

        /* Close Button */
        .close-btn {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 24px;
            cursor: pointer;
            color: white;
        }

        /* Open Menu Class */
        .slide-menu.open {
            left: 0;
        }

        /* Bottom Items */
        .bottom-links {
            border-top: 1px solid #444;
            padding: 10px 0;
        }

        .bottom-links a {
            color: red;
            font-weight: bold;
        }

        .bottom-links a.settings {
            color: white;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <div class="logo">
            <img src="assets/img/icon.jpg" alt="Logo">
        </div>
        <div class="header-left">FitLife</div>

        <ul class="nav-links">
            <li><a href="Index.html">Home</a></li>
            <li><a href="About_us.html">About Us</a></li>
            <li><a><div class="profile-icon" onclick="toggleMenu()"></div></a></li>
        </ul>
    </div>

    <!-- Slide Menu -->
    <div class="slide-menu" id="menu">
        <span class="close-btn" onclick="toggleMenu()">✖</span>
        
        <div class="menu-items">
            <a href="#">Profile & Edit</a>
            <a href="Dashboard.html">Dashboard</a>
            <a href="#">Enter Your...</a>
            <a href="#">Track Your Progress</a>
        </div>

        <div class="bottom-links">
            <a href="#" class="unregister">Unregister</a>
            <a href="#" class="settings">Settings</a>
        </div>
    </div>

    <!-- First Div: Select Exercise -->
    <div class="exercise-container">
        <div id="video-section">
            <h2 style="color:white">Pick one and let's start!</h2><br><br>
            <div id="video-container">
                <?php while ($row = mysql_fetch_assoc($result)) { ?>
                    <video controls width="100%">
                        <source src="assets/vids/<?php echo $row['video_name']; ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <br><br>
                <?php } ?>
            </div> 
        </div>
    </div><br><br>
    
</body>
</html>
<?php mysql_close($con); ?>
