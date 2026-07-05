<?php
$to = 'jenisdsouza0@gmail.com';
$from = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['msg'];
$headers = "From: jenisdsouza0@gmail.com" . "\r\n" .  // Your email as sender
               "Reply-To: $from" . "\r\n" .  // This ensures replies go to the user
               "X-Mailer: PHP/" . phpversion();
if (mail($to, $subject, $message, $headers)) 
{
    echo "Email sent to receiver successfully!";
} 
else 
{
    echo "Failed to send email.";
}     
?>