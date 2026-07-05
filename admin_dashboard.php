<?php 
include 'Dbcon.php';

// Fetch users from the database
$query = "SELECT user_id, user_name, user_email FROM user";
$result = mysql_query($query, $con);

if (isset($_POST['add_workout'])) {
    $w_name = mysql_real_escape_string($_POST['w_name']);
$w_type = mysql_real_escape_string($_POST['w_type']);
    $w_duration = (int)$_POST['w_duration'];
    $video_urls = implode(',', $_POST['w_video_links']);
    $admin_id = 1; // Replace with actual admin session ID

    // Handle image upload
    if ($_FILES['image']['name'] != "") { // Check if an image is uploaded
        $image_target = "assets/img/" . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $image_target)) {
            // Insert workout data with multiple video links
            $query = "INSERT INTO workout (w_name, w_type, w_duration, image_path, video_urls, admin_id) 
                      VALUES ('$w_name', '$w_type', '$w_duration', '$image_target', '$video_urls', '$admin_id')";
            mysql_query($query, $con) or die(mysql_error());

            echo "<script>alert('Workout Added Successfully!');</script>";
        } else {
            echo "<script>alert('Failed to upload workout image');</script>";
        }
    } else {
        echo "<script>alert('Please select an image to upload');</script>";
    }
}

if (isset($_POST['add_diet'])) {
    $diet_name = mysql_real_escape_string($_POST['diet_name']);
    $diet_type = mysql_real_escape_string($_POST['diet_type']);
    $description = mysql_real_escape_string($_POST['description']);

    $image_name = $_FILES['diet_image']['name'];
    $image_tmp = $_FILES['diet_image']['tmp_name'];
    $image_folder = "assets/images/diet/" . $image_name;

    if (move_uploaded_file($image_tmp, $image_folder)) {
        $query = "INSERT INTO diet_plan (diet_name, diet_type, description, image_url) VALUES ('$diet_name', '$diet_type', '$description', '$image_folder')";
        mysql_query($query, $con);
    }
}

if (isset($_GET['delete'])) {
    $diet_id = mysql_real_escape_string($_GET['delete']);
    mysql_query("DELETE FROM diet_plan WHERE id='$diet_id'", $con);
}

$result = mysql_query("SELECT * FROM diet_plan", $con);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/img/icon.jpg" rel="icon">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="assets/css/Final.css">
    <style>
        /* Existing styles */
        body {
            background-image: url('assets/img/Lbg2.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            overflow-x: hidden;
        }
        .content {
            margin-top: 50px;
            padding: 40px;
            color: white;
            text-align: center;
        }
        .table-container {
            width: 80%;
            margin: auto;
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            display: none; /* Initially hidden */
        }
        .table-container table {
            width: 100%;
            border-collapse: collapse;
        }
        .table-container th, .table-container td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .table-container th {
            background: #007bff;
            color: white;
        }
        .button {
            background: #007bff;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }
        .button:hover {
            background: #0056b3;
        }
        .sidebar {
            width: 200px;
            height: 100vh;
            background: #1f1f1f;
            position: fixed;
            top: 0;
            right: -200px; /* Initially hidden */
            padding-top: 60px;
            overflow-y: auto;
            transition: right 0.3s ease-in-out; /* Smooth transition */
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
        .menu-icon {
            font-size: 24px;
            cursor: pointer;
            color: white;
            padding: 10px;
            position: absolute;
            right: 20px;
            top: 30%;
            transform: translateY(-50%);
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
        }
        .logout-button:hover {
            background: darkred;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="assets/img/icon.jpg" alt="FitLife Logo">
        </div>
        <div class="header-left">FitLife</div>
        <ul class="nav-links">
            <li><a href="Index.html">Home</a></li>
            <li><a href="About_us.html">About Us</a></li>
            <li><a><div class="menu-icon">☰</div></a></li>
        </ul>
    </header>

    <div class="sidebar">
        <ul>
            <li><a href="#" onclick="showSection('user-management')">User Management</a></li>
            <li><a href="#" onclick="showSection('manage-workouts')">Manage Workouts</a></li>
            <li><a href="#" onclick="showSection('manage-diet')">Manage Diet Plans</a></li>
        </ul>
        <a href="logout.php" class="logout-button">Logout</a>
    </div>

    <div class="content">
        <h2 style="color:white;">Welcome to Admin Dashboard!</h2>
    </div>

    <!-- User Management -->
    <div class="table-container" id="user-management">
        <h2>Manage Users</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysql_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['user_name']; ?></td>
                        <td><?php echo $row['user_email']; ?></td>
                        <td>
                            <a href="#" class="button">View</a>
                            <a href="delete.php?user_id=<?php echo $row['user_id']; ?>" class="button" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Manage Workouts -->
    <div class="table-container" id="manage-workouts">
        <h2>Manage Workouts</h2>
        
        <!-- Workout Upload Form -->
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="w_name" placeholder="Workout Name" required><br><br>
            <input type="text" name="w_type" placeholder="Workout Type" required><br><br>
            <input type="number" name="w_duration" placeholder="Duration (minutes)" required><br><br>
            <label>Category Image:</label>
            <input type="file" name="image" accept="image/*" required><br><br>
            
            <label>Workout Video Links:</label>
            <input type="text" name="w_video_links[]" placeholder="YouTube Link 1"><br>
            <input type="text" name="w_video_links[]" placeholder="YouTube Link 2"><br>
            <input type="text" name="w_video_links[]" placeholder="YouTube Link 3"><br>
            <input type="text" name="w_video_links[]" placeholder="YouTube Link 4"><br>
            <input type="text" name="w_video_links[]" placeholder="YouTube Link 5"><br>
            <input type="text" name="w_video_links[]" placeholder="YouTube Link 6"><br>
            <input type="text" name="w_video_links[]" placeholder="YouTube Link 7"><br>
            <input type="text" name="w_video_links[]" placeholder="YouTube Link 8"><br>
            <input type="text" name="w_video_links[]" placeholder="YouTube Link 9"><br>
            <input type="text" name="w_video_links[]" placeholder="YouTube Link 10"><br>
            <button type="submit" name="add_workout" class="button">Add Workout</button>
        </form>

        <h3>Existing Workouts</h3>

<!-- WORKOUT MANAGEMENT TABLE -->
<table border="1">
    <tr>
        <th>Workout Name</th>
        <th>Workout Type</th>
        <th>Workout Duration</th>
        <th>Video Links</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>

    <?php
    $result = mysql_query("SELECT * FROM workout", $con);
    while ($row = mysql_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['w_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['w_type']) . "</td>";
        echo "<td>" . intval($row['w_duration']) . " min</td>";

        // Check if video_urls is not NULL before exploding
        
        echo "<td style='max-width: 200px; word-wrap: break-word; white-space: pre-line;'>";
        if (!empty($row['video_urls'])) {
            $video_links = explode(',', $row['video_urls']);
            foreach ($video_links as $link) {
                echo "<div style='margin-bottom: 5px;'>" . htmlspecialchars($link) . "</div>";
            }
        }
        echo "</td>";
        


        // Show category image
        echo "<td>";
        if (!empty($row['image_path'])) {
            echo "<img src='" . htmlspecialchars($row['image_path']) . "' width='100' height='100'>";
        } else {
            echo "No image";
        }
        echo "</td>";

        // Action buttons (Update and Delete)
        echo "<td>
                <a href='update_workout.php?w_id=" . intval($row['w_id']) . "' class='button'>Update</a> | 
                <a href='delete_workout.php?w_id=" . intval($row['w_id']) . "' class='button' onclick='return confirm(\"Are you sure?\")'>Delete</a>
              </td>";
        echo "</tr>";
    }
    ?>
</table>

    </div>


    <!-- Manage Diet Plans -->
    <div class="table-container" id="manage-diet">
        <h2>Manage Diet Plans</h2>
        <form action="upload_diet.php" method="POST">
            <input type="text" name="plan_name" placeholder="Diet Plan Name" required><br><br>
            <input type="text" name="recommended_for" placeholder="Recommended For" required><br><br>
            <button type="submit" class="button">Add Diet Plan</button>
        </form>
        <h3>Existing Diet Plans</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Plan Name</th>
                    <th>Recommended For</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $diet_result = mysql_query("SELECT * FROM diet_plan");
                while ($diet = mysql_fetch_assoc($diet_result)) {
                    echo "<tr>
                            <td>{$diet['d_id']}</td>
                            <td>{$diet['plan_name']}</td>
                            <td>{$diet['recommended_for']}</td>
                            <td><a href='update_diet.php?d_id={$diet['d_id']}' class='button'>Update</a>
                                <a href='delete_diet.php?d_id={$diet['d_id']}' class='button'>Delete</a>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function showSection(id) {
            document.querySelectorAll('.table-container').forEach(el => el.style.display = 'none');
            document.getElementById(id).style.display = 'block';
        }
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        let sidebar = document.querySelector(".sidebar");
        let menuIcon = document.querySelector(".menu-icon");

        menuIcon.addEventListener("click", function () {
            if (sidebar.style.right === "0px") {
                sidebar.style.right = "-200px"; // Hide Sidebar
            } else {
                sidebar.style.right = "0px"; // Show Sidebar
            }
        });
    });
</script>

</body>
</html>

<?php mysql_close($con); ?>
