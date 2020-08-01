<?php
    if(isset($_POST['send'])) {
        $headers = "Form: contactform@jeremiahbrandt.com\r\n";
        $headers .= 'Content-Type: text/plain; charset=utf-8';
        $to = 'contact@jeremiahbrandt.com';
        $subject = 'Contact Form from'  . $_POST['name'];

        $message = 'Name: ' . $_POST['name'] . "\r\n\r\n";
        $message .= 'Email: ' . $_POST['email'] . "\r\n\r\n";
        $message .= 'Phone: ' . $_POST['phone'] . "\r\n\r\n";
        $message .= 'Message: ' . $_POST['message'] . "\r\n\r\n";
        $message .= 'Time: ' . $_POST['time'] . "\r\n\r\n";

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if($email) {
            $headers .= "\r\nReply-To: $email";
        }

        $success = mail($to, $subject, $message, $headers, '-fcontact@jeremiahbrandt.com');
    }
?>