<?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $mail = $_POST["mail"];
    $comment = $_POST["comment"];
    $agree = isset($_POST["agree"]);

    $errors = validateForm($name, $mail, $comment, $agree);

    if (!empty($errors)) {
        $name = '';
        $mail = '';
        $comment = '';
        $agree = '';
    }
}

function validateForm($name, $mail, $comment, $agree) {
    $errors = [];

    if (empty($name)) {
        $errors[1] = "Name is required";
    }

    if (empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors[2] = "Please provide a valid email";
    }

    if (empty($comment)) {
        $errors[3] = "Comment is required";
    }

    if (!$agree) {
        $errors[4] = "You must agree to data processing";
    }

    return $errors;
}
?>

<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <fieldset>
        <legend>
            <h1>#write-comment</h1>
        </legend>
        <div class="e_form">
            <label for="name">Name:
                <input type="text" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                <?php echo isset($errors[1]) ? $errors[1] : ''; ?>
            </label>
        </div>
        <div class="e_form">
            <label for="mail">Mail:
                <input type="email" name="mail" value="<?php echo isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : ''; ?>">
                <?php echo isset($errors[2]) ? $errors[2] : ''; ?>
            </label>
        </div>
        <div class="e_form">
            <label for="comment">Comment:<br><br>
                <textarea name="comment" id="comment" cols="30" rows="10"><?php echo isset($_POST['comment']) ? htmlspecialchars($_POST['comment']) : ''; ?></textarea>
                <?php echo isset($errors[3]) ? $errors[3] : ''; ?>
            </label>
        </div>
        <div style="margin: 10px; font-size: 12px">
            <input type="checkbox" name="agree" id="agree" <?php echo isset($_POST['agree']) && $_POST['agree'] ? 'checked' : ''; ?>>
            <label for="agree">Do you agree with data processing?</label>
            <?php echo isset($errors[4]) ? $errors[4] : ''; ?>
        </div>
        <div class="submit">
            <input type="submit" value="Send">
        </div>
        <div>
            <?php echo isset($errors[5]) ? $errors[5] : ''; ?>
        </div>
    </fieldset>
</form>
