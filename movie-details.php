<?php
$conn = mysqli_connect('localhost', 'root', '', 'movies');

$query = "SELECT * FROM movie WHERE id=$_GET[id]";

$result = mysqli_query($conn, $query);

$movies = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
<div class="row row-cols-1 row-cols-md-2 g-4">
        <?php foreach ($movies as $movie) : ?>
            <div class="col">
                <div class="card">
                    <img src="<?= $movie['poster']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $movie['title']; ?></h5>
                        <p><?= $movie['description']; ?></p>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>