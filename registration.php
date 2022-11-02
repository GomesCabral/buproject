<!-- registration / login page -->
<!-- mark -->
<?php

$firstName = '';
$lastName = '';
$email = '';
$passWorda = '';
$passWordb = '';

// messages
$noFirstName = '';
$noLastName = '';
$noEmail = '';
$badEmail = '';
$passwordNoMatch = '';
$success = 'Thanks for registering!';

$errors = [];

if (isset($_POST['submitBtn'])) {
    $error = false;

    $firstName = trim(strip_tags($_POST['firstName']));
    if (empty($firstName)) {
        $errors['firstName'] = "Please enter your first name.";
        $error = true;
    };

    $lastName = trim(strip_tags($_POST['lastName']));
    if (empty($lastName)) {
        $errors['lastName'] = "Please enter your last name.";
        $error = true;
    };

    $cleanEmail = trim(strip_tags($_POST['email']));
    if (!filter_var($cleanEmail, FILTER_VALIDATE_EMAIL)) {
        $errors['cleanEmail'] = "Please enter a valid email address.";
        $error = true;
    };

    if (!filter_var($cleanEmail, FILTER_SANITIZE_EMAIL)) {
        $errors['cleanEmail'] = "Please enter a valid email address.";
        $error = true;
    }

    if ((strlen($cleanEmail)) < 8 || (strlen($cleanEmail)) > 50) {
        $errors['cleanEmail'] = "Email address must be at least 8 characters long.";
        $error = true;
    };

    $passWorda = trim($_POST['passWorda']);
    if (empty($passWorda)) {
        $errors['passWorda'] = "Please enter your password.";
        $error = true;
    };

    $passWordb = trim($_POST['passWordb']);
    if ($passWordb != $passWorda) {
        $errors['passWord2b'] = "Passwords do not match.";
        $error = true;
    } else {
        $userPassword = password_hash($passWorda, PASSWORD_DEFAULT);
    };

    // all ok, insert new user
    $conn = mysqli_connect('localhost', 'root', 'root', 'spotify');
    if (!$conn) {
        echo 'No connection';
    } else {
        $query = "INSERT INTO users (first_name, last_name, email, password)
                VALUES ('$firstName', '$lastName', '$email', '$userPassword')";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            mysqli_close($conn);
        } else {
            echo "Thanks for registering.";
        }
        mysqli_close($conn);
    };
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./formstyle.css">

    <title>Register</title>
</head>

<body>
    <?php require_once('./navbar.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="column">
                <div class="errorMsg"><span><?php ($result) ? $success : 'Query Problem'; ?></span></div>
                <form class="_form" action="" method="post">
                    <div class="input"><input type="text" name="firstName" value="<?php echo $firstName ?>" placeholder="first name"></div>
                    <div class="input"><input type="text" name="lastName" value="<?php echo $lastName ?>" placeholder="last name"></div>
                    <div class="input"><input type="email" name="email" id="1" value="<?php echo $email ?>" placeholder="email must be between 8 & 50 characters."></div>
                    <div class="input"><input type="password" name="passWorda" id="2" placeholder="password"></div>
                    <div class="input"><input type="password" name="passWordb" id="3" placeholder="confirm password"></div>

                    <div class="checkBoxWrapper">
                        <div class="chkBoxLeftCol"><input class="checkBox" type="checkbox" name="checkBox" id="checker">
                        </div>
                        <div class="chkBoxRightCol">
                            <p>Subscribe to our newsletter.</p>
                        </div>
                    </div>

                    <input class="submit" type="submit" name="submitBtn" value="Submit">
                </form>

            </div>
            <div class="column">
                <div class="errorMsg"><span><?php echo (empty($firstName)) ? $noFirstName : ''; ?></span></div>
                <div class="errorMsg"><span><?php echo (empty($lastName)) ? $noLastName : ''; ?></span></div>
                <div class="errorMsg"><span><?php echo (empty($cleanEmail)) ? $noEmail : ''; ?></span></div>
                <div class="errorMsg"><span><?php echo (empty($cleanEmail)) ? $badEmail : ''; ?></span></div>


            </div>
            <div class="col-3"></div>
        </div>
    </div>


</body>

</html>