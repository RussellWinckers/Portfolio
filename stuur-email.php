<?php

function strip_crlf($string)
{
    return str_replace("\r\n", "", $string);
}

if (! empty($_POST["submit"])) {
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $content = $_POST["message"];

    $toEmail = "russellwinckers@gmail.com";
    // CRLF Injection attack protection
    $name = strip_crlf($name);
    $email = strip_crlf($email);
    if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "The email address is invalid.";
    } else {
        // appending \r\n at the end of mailheaders for end
        $mailHeaders = "From: " . $name . "<" . $email . ">\r\n";
        if (mail($toEmail, $subject, $content, $mailHeaders)) {
            echo'Bedankt voor het sturen';
        }
    }
}
// header('Location: index.html');
?>