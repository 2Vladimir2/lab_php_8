<?php

function validateForm($name, $mail, $comment, $agree)
{
    $errors = [];

    if (strlen($name) < 3 || strlen($name) > 20 || preg_match("/\d/", $name)) {
        $errors[1] = "Invalid name. It should be 3-20 characters long and contain no digits.";
    }

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors[2] = "Invalid email address.";
    }

    if (empty($comment)) {
        $errors[3] = "Comment cannot be empty.";
    }

    if (!$agree) {
        $errors[4] = "You must agree with data processing.";
    }

    if (empty($errors)) {
        $commentData = $name . ',' . $mail . ',' . $comment . PHP_EOL;
        file_put_contents('./views/components/comments.txt', $commentData, FILE_APPEND);
        $errors[5] = "Form submitted successfully.";
    }

    // if (empty($errors)) {
    //     $commentData = [
    //         'name' => $name,
    //         'mail' => $mail,
    //         'comment' => $comment
    //     ];
    //     file_put_contents('views/components/comments.txt', json_encode($commentData) . PHP_EOL, FILE_APPEND);
    //     $errors[5] = "Form submitted successfully.";
    // }

    return $errors;
}