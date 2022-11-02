<!-- insert new movie -->
<!-- mark -->
<?php

// movie data
$title = '';
$description = '';
$poster = '';
$release_date = Date('Y mm dd');
$director = '';
$director_id = 0;

// conn variables
$error = true;

// query for directors
$q_directors = "SELECT id AS d_id, CONCAT(first_name, ' ', last_name) AS director FROM directors
ORDER BY last_name ASC";

$conn = mysqli_connect('localhost', 'root', 'root', 'movies');
if (!$conn) {
    echo 'No connection';
} else {
    // get directors to populate select options
    $query = $q_directors;
    echo $query;
    $d_result = mysqli_query($conn, $q_directors);
    if (!$d_result) {
        mysqli_close($conn);
    } else {
        $directors = mysqli_fetch_all($d_result, MYSQLI_ASSOC);
    }
};


$q_insert_movie = "INSERT INTO movie (title, description, poster, release_date, director_id)
                    VALUES ('$title', '$description', '$poster', '$release_date', '$director_id')";


// check if user is logged in already:
session_start();
if (!$_SESSION["newsession"]) {
    echo "Please log in or register.";
} else {

    if (isset($_POST['submitBtn'])) {
        $error = false;

        // collect POST data in variables
        $title = $_POST['title'];
        $description = $_POST['description'];
        $poster = $_POST['poster'];
        $release_date = $_POST['release_date'];
        $director_id = $_POST['director_id'];

        // check if form is completed
        if (!empty($director_id) || !empty($title) || !empty($description) || !empty($poster) || !empty($release_date)) {
            $error = true;
        }

        if (!$error) {
            // all ok, insert new movie
            $conn = mysqli_connect('localhost', 'root', 'root', 'movies');
            if (!$conn) {
                echo 'No connection';
            } else {

                // get director_id from user director choice
                $query = $q_director_id;
                var_dump($query);

                $d_result = mysqli_query($conn, $query);
                if (!$result) {
                    mysqli_close($conn);
                } else {

                    $director_id = mysqli_fetch_all($d_result, MYSQLI_ASSOC);
                    echo $director_id;
                }

                // insert the movie
                $query = $q_insert_movie;
                var_dump($query);
                $result = mysqli_query($conn, $query);
                if (!$result) {
                    mysqli_close($conn);
                } else {
                    setcookie("added_movie" . $title, time() + 120);
                    echo "Upload successful!";
                }
                mysqli_close($conn);
            };
        }
    };
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
    <title>Insert Movie</title>
</head>

<body>
    <?php
    if ($error) echo "Please complete all fields";
    ?>
    <form action="" method="post">
        <label for="">Choose a Director</label>
        <select name="director_id" id="director_id">
            <?php
            foreach ($directors as $director) {
                echo "<option value='" . $director['d_id'] . "'>" . $director["director"] . "</option>";
            };

            ?>
        </select>
        <label>Enter movie title</label>
        <input type="text" name="title" id="">
        <label for="">Enter poster URL</label>
        <input type="text" name="poster" id="">
        <label for="">Release Date</label>
        <input type="date" name="release_date" id="">
        <label>Enter movie description</label>
        <textarea id="" name="description" rows="5" cols="50"></textarea>
        <input class=" submit" type="submit" name="submitBtn" value="submit">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>