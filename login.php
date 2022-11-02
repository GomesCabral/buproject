<!-- login page -->
<!-- mark -->

<!-- registration page -->
<!-- mark -->
<?php

$email = '';
$passWorda = '';
$passWordb = '';

// messages
$noEmail = '';
$badEmail = '';
$passwordNoMatch = '';
$success = 'Login Successful!';

$errors = [];

if (isset($_POST['submitBtn'])) {
    $error = false;


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

    // all ok, login the user
    $conn = mysqli_connect('localhost', 'root', 'root', 'movies');
    if (!$conn) {
        echo 'No connection';
    } else {
        $query = "SELECT * FROM users
        WHERE $email = email AND $userPassword = password";

        $result = mysqli_query($conn, $query);
        if (!$result) {
            mysqli_close($conn);
        } else {
            echo "Login successful!";
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

    <title>Login</title>
</head>

<body>
    <d class="registerWrapper">
        <div class="row">
            <div class="col">
                <h3>Login</h3>
            </div>
        </div>
    </d>

    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="column">
                <div class="errorMsg"><span><?php ($result) ? $success : 'Query Problem'; ?></span></div>
                <form class="_form" action="" method="post">
                    <div class="input"><input type="email" name="email" id="1" value="<?php echo $email ?>" placeholder="email must be between 8 & 50 characters."></div>
                    <div class="input"><input type="password" name="passWorda" id="2" placeholder="password"></div>
                    <div class="input"><input type="password" name="passWordb" id="3" placeholder="confirm password"></div>



                    <input class="submit" type="submit" name="submitBtn" value="Submit">
                </form>

            </div>
            <div class="column">
                <div class="errorMsg"><span><?php echo (empty($cleanEmail)) ? $noEmail : ''; ?></span></div>
                <div class="errorMsg"><span><?php echo (empty($cleanEmail)) ? $badEmail : ''; ?></span></div>
                <div class="errorMsg"><span><?php echo (empty($cleanEmail)) ? $badEmail : ''; ?></span></div>
                <div class="errorMsg"><span><?php echo (empty($passwordNoMatch)) ? $passwordNoMatch : ''; ?></span></div>


            </div>
            <div class="col-3"></div>
        </div>
    </div>


</body>

</html>