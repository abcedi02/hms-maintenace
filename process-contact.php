<?php
require_once 'includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, htmlspecialchars($_POST['name'])) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, htmlspecialchars($_POST['email'])) : '';
    $phone = isset($_POST['phone']) ? mysqli_real_escape_string($conn, htmlspecialchars($_POST['phone'])) : '';
    $subject = isset($_POST['subject']) ? mysqli_real_escape_string($conn, htmlspecialchars($_POST['subject'])) : '';
    $message = isset($_POST['message']) ? mysqli_real_escape_string($conn, htmlspecialchars($_POST['message'])) : '';
    
    // Basic validation
    if (empty($name) || empty($email) || empty($message)) {
        header("Location: contact.php?error=missing_fields");
        exit();
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: contact.php?error=invalid_email");
        exit();
    }
    
    // Insert into database
    $sql = "INSERT INTO contacts (name, email, phone, service_interest, message, status) 
            VALUES ('$name', '$email', '$phone', '$subject', '$message', 'new')";
    
    if ($conn->query($sql) === TRUE) {
        // Send email notification (optional - requires mail server configuration)
        $to = ADMIN_EMAIL;
        $subject = "New Contact Form Submission from $name";
        $email_message = "Name: $name\n";
        $email_message .= "Email: $email\n";
        $email_message .= "Phone: $phone\n";
        $email_message .= "Subject: $subject\n\n";
        $email_message .= "Message:\n$message\n";
        
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        
        // Uncomment when mail server is configured
        // mail($to, $subject, $email_message, $headers);
        
        header("Location: contact.php?success=1");
        exit();
    } else {
        header("Location: contact.php?error=database_error");
        exit();
    }
} else {
    header("Location: contact.php");
    exit();
}
?>
