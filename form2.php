<?php
// Validate if data has been sent from 'submit' Form (In this case form is named 'submit')
$errors = ''; // To fill errors
if (isset($_POST['submit'])) {
    // Access to data/value from input form
    $name = $_POST['name'];
    $email = $_POST['email'];
    // Validate no-empty inputs and clean typed value
    // name input validation
    if (!empty($name)) {
        /* $name = trim($name); // Remove and save blanks spaces
        // Remove and save special characters to security
        $name = htmlspecialchars($name);
        $name = stripslashes($name); */
        $name = filter_var($name, FILTER_SANITIZE_STRING); // Remove special characters
        echo "Your name is: $name <br />";
    } else {
        $errors .= "Enter a correct name! <br />";
    }
    // E-mail input validation
    if (!empty($email)) {
        /* $email = trim($email); // Remove and save blanks spaces
        // Remove and save special characters to security
        $email = htmlspecialchars($email);
        $email = stripslashes($email); */
        // Cleaned e-mail
        $email = filter_var($email, FILTER_SANITIZE_EMAIL); // Remove special characters and save result in var
        // if E-mail is not cleaned, set an error
        if (!filter_var($email, FILTER_SANITIZE_EMAIL)) {
            $errors .= "Enter a valid E-mail! <br />";
        } else {
            echo "Your email is: $email <br />";
        }
    } else {
        $errors .= "Enter a correct E-mail! ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- send data to this same file -->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

        <input type="text" placeholder="Name" name="name">
        <br>
        <input type="email" placeholder="email" name="email">
        <br>
        <label for="terms">Accept terms</label>
        <br>
        <input type="checkbox" name="terms" id="terms">
        <br>
        <!-- (if exist errors (in php document) store an div with an error) -->
        <?php if (!empty($errors)) : ?>
            <div class="error"><?php echo $errors; ?></div>
        <?php endif; ?>
        <input type="submit" name="submit">
    </form>
</body>

</html>