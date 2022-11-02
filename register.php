<!-- registration page -->
<!-- mark -->
<?php

// user data
$name = '';
$email = '';
$passWorda = '';
$passWordb = '';

// messages
$noName = '';
$noEmail = '';
$badEmail = '';
$emptyPassword = '';
$passwordNoMatch = '';
$success = 'Thanks for registering!';

// conn variables

$error = true;

$messages = array(&$noName, &$noEmail, &$badEmail, &$emptyPassword, &$passwordNoMatch);

if (isset($_POST['submitBtn'])) {
    $error = false;

    $name = trim(strip_tags($_POST['name']));
    if (empty($name)) {
        $noName = "Please enter your name.";
        $error = true;
    };

    $cleanEmail = trim(strip_tags($_POST['email']));
    if (!filter_var($cleanEmail, FILTER_VALIDATE_EMAIL)) {
        $badEmail = "Please enter a valid email address.";
        $error = true;
    };

    if (!filter_var($cleanEmail, FILTER_SANITIZE_EMAIL)) {
        $badEmail = "Please enter a valid email address.";
        $error = true;
    }

    if ((strlen($cleanEmail)) < 8 || (strlen($cleanEmail)) > 50) {
        $badEmail = "Email address must be at least 8 characters long.";
        $error = true;
    };

    $passWorda = trim($_POST['passWorda']);
    if (empty($passWorda)) {
        $emptyPassword = "Please enter your password.";
        $error = true;
    };

    $passWordb = trim($_POST['passWordb']);
    if ($passWordb != $passWorda) {
        $passwordNoMatch = "Passwords do not match.";
        $error = true;
    } else {
        $userPassword = password_hash($passWorda, PASSWORD_DEFAULT);
    };

    if (!$error) {
        // all ok, insert new user
        $conn = mysqli_connect('localhost', 'root', 'root', 'movies');
        if (!$conn) {
            echo 'No connection';
        } else {
            $query = "INSERT INTO users (name, email, password)
                VALUES ('$name', '$cleanEmail', '$userPassword')";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                echo 'Query Problem';
                mysqli_close($conn);
            } else {
                session_start();
                setcookie("$cleanEmail", time() + 120);
                echo "Thanks for registering!";
            }
            mysqli_close($conn);
        };
    }
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">

    <title>Register</title>
</head>

<body>
    <d class="registerWrapper">
        <div class="row">
            <div class="col">
                <h3>Register as New User</h3>
            </div>
        </div>
    </d>

    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="column">

                <form class="_form" action="" method="post">
                    <div class="input"><input type="text" name="name" value="<?php echo $name ?>" placeholder="Your name"></div>
                    <div class="input"><input type="email" name="email" id="1" value="<?php echo $email ?>" placeholder="email must be between 8 & 50 characters."></div>
                    <div class="input"><input type="password" name="passWorda" id="2" placeholder="password"></div>
                    <div class="input"><input type="password" name="passWordb" id="3" placeholder="confirm password"></div>
                    <input class="submit" type="submit" name="submitBtn" value="Submit">
                </form>

            </div>
            <div class="column">
                <div class="errorMsg">
                    <span>
                        <?php
                        if ($error)
                            foreach ($messages as $message) {
                                echo "$message <br>";
                            }
                        ?>
                    </span>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>


</body>

</html>