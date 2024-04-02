<?php
$comments = file('./views/components/comments.txt');
foreach ($comments as $comment) {
    $commentData = explode(',', $comment);
    echo "<p>Name: <b>{$commentData[0]}</b> e-mail: <b>{$commentData[1]}</b></p>";
    echo "<p>Comment: <b>{$commentData[2]}</b></p>";
    echo "<hr>";
}

// $comments = file('views/components/comments.txt');
// foreach ($comments as $comment) {
//     $commentData = json_decode($comment, true);
//     echo "<p>Your name: <b>{$commentData['name']}</b></p>";
//     echo "<p>Your e-mail: <b>{$commentData['mail']}</b></p>";
//     echo "<p>Your comment: <b>{$commentData['comment']}</b></p>";
// }