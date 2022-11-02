<!-- login page -->
<!-- mark -->

<?php

// user data
$email = '';
$passWorda = '';
$passWordb = '';

// messages
$noEmail = '';
$badEmail = '';
$emptyPassword = '';
$passwordNoMatch = '';
$success = 'Login Successful!';

// conn variables

$error = true;

$messages = [&$noEmail, &$badEmail, &$emptyPassword, &$passwordNoMatch];

if (isset($_POST['submitBtn'])) {
    $error = false;

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
        // all ok, login the user
        $conn = mysqli_connect('localhost', 'root', 'root', 'movies');
        if (!$conn) {
            echo 'No connection';
        } else {
            $query = "SELECT * FROM users
        WHERE '$email' = email AND '$userPassword' = password";

            $result = mysqli_query($conn, $query);
            if (!$result) {
                mysqli_close($conn);
            } else {
                session_start();
                setcookie("$cleanEmail", time() + 120);
                echo "Login successful!";
            }
            mysqli_close($conn);
        };
    } else {
        foreach ($messages as $message) {
            echo "$message <br>";
        }
    }
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style.css">

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

                <form class="_form" action="" method="post">
                    <div class="input"><input type="email" name="email" id="1" value="<?php echo $email ?>" placeholder="email must be between 8 & 50 characters."></div>
                    <div class="input"><input type="password" name="passWorda" id="2" placeholder="password"></div>
                    <div class="input"><input type="password" name="passWordb" id="3" placeholder="confirm password"></div>
                    <input class="submit" type="submit" name="submitBtn" value="Submit">
                </form>

            </div>

            <div class="col-3"></div>
        </div>
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


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>