<?php

$errors = [];

if (!empty($_POST)) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
 
  if (empty($name)) {
      $errors[] = 'Name is empty';
  }

  if (empty($email)) {
      $errors[] = 'Email is empty';
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = 'Email is invalid';
  }

  if (empty($message)) {
      $errors[] = 'Message is empty';
  }

if (empty($errors)) {
        $recipient = "raxel.morenon@epitech.eu";

        $headers = "From: $name <$email>";

        if (mail($recipient, $message, $headers)) {
            echo "Email sent successfully!";
        } else {
            echo "Failed to send email. Please try again later.";
        }
    } else {
        echo "The form contains the following errors:<br>";
        foreach ($errors as $error) {
            echo "- $error<br>";
        }
    }
} else {
    header("HTTP/1.1 403 Forbidden");
    echo "You are not allowed to access this page.";
}
?>