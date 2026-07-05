# Fitness & Diet Application

A full-stack web application designed to help users maintain a healthy lifestyle through personalized workout and diet plans, progress tracking, and secure account management.

## Project Overview

The Fitness & Diet Application enables users to manage their fitness journey by providing workout plans, diet recommendations, weekly weight tracking, and progress visualization. It also includes an admin panel for managing users, workouts, diet plans, and videos.

This project was developed as a Bachelor's degree (B.Sc. Computer Science) major project.



## Features

### User Features
- User Registration & Login
- OTP Email Verification
- Forgot Password via Email
- Secure Authentication
- User Dashboard
- Personalized Workout Plans
- Personalized Diet Plans
- Weekly Weight Tracking
- Progress Graphs
- Workout Videos
- Submit Feedback
- Edit Profile

### Admin Features
- Secure Admin Login
- Manage Users
- Add/Edit/Delete Workout Plans
- Add/Edit/Delete Diet Plans
- Upload Workout Videos
- Manage Images
- View User Feedback
- Monitor User Progress



## Technologies Used

### Frontend
- HTML5
- CSS3
- Bootstrap
- JavaScript

### Backend
- PHP

### Database
- MySQL

### Additional Tools
- PHPMailer (SMTP Email Verification)
- Chart.js (Progress Visualization)



## Database

The project uses MySQL as the database.

Main tables include:

- admin1
- user
- workout
- workout_videos
- diet_plan
- diet_images
- progress_tracking
- feedback
- videos



## Installation

1. Clone the repository

```bash
git clone https://github.com/your-username/fitness-diet-application.git
```

2. Move the project to your local server directory

- XAMPP → `htdocs`
- WAMP → `www`

3. Import the MySQL database

- Open phpMyAdmin
- Create a new database
- Import the provided `.sql` file

4. Configure database connection

Update the database credentials in the configuration file.

```php
$host = "localhost";
$user = "root";
$password = "";
$database = "fitness_db";
```

5. Configure PHPMailer

Update:

- SMTP Host
- Email Address
- App Password

6. Start Apache and MySQL.

7. Open in browser

```
http://localhost/Fitness-Diet-Application/
```


## Future Improvements

- BMI Calculator
- Calorie Calculator
- AI-based Diet Recommendation
- AI Workout Suggestions
- Mobile Responsive Improvements
- Dark Mode
- Exercise Reminder Notifications
- Fitness Goal Tracking
- Water Intake Tracker
- Daily Activity Tracker

---

## Academic Project

This project was developed as part of the Bachelor of Science (B.Sc.) Computer Science curriculum.

---

## Author

**Sharayu Dangare**

GitHub: https://github.com/your-username

LinkedIn: https://linkedin.com/in/your-linkedin

Portfolio: https://your-portfolio-link

---

## License

This project is created for educational and learning purposes.

Feel free to use it for reference, but please give appropriate credit if you build upon this work.
