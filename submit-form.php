<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from form
    $name  = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));

    // === Send Email to You ===
    $to      = "gokulraj200018@gmail.com";  // Replace with your email
    $subject = "Resume Download Request";
    $message = "Name: $name\nEmail: $email\nDownload Time: " . date("Y-m-d H:i:s");
    $headers = "From: noreply@yourdomain.com";

    mail($to, $subject, $message, $headers);  // Sends the email

    // === Resume File Path ===
    $file = 'Gokulraj-Resume.pdf'; // Place this file in the same directory as submit-form.php

    // === Force Resume Download ===
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    } else {
        echo "Sorry, resume file not found.";
    }
}
?>
