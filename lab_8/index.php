<!DOCTYPE html>
<html>

<head>
    <title>Index</title>
    <link rel="stylesheet" href="./views/components/style.css">
</head>

<body>
    <?php
    require './handlers/page.php';
    Page::part('header');
    Page::part('form');
    Page::part('footer');
    ?>
</body>

</html>