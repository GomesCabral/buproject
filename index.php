<?php
$conn = mysqli_connect('localhost', 'root', '', 'movies');

$query = "SELECT * FROM movie";

$result = mysqli_query($conn, $query);

$movies = mysqli_fetch_all($result, MYSQLI_ASSOC);


mysqli_close($conn);

// echo '<pre>';
// var_dump($_GET['search']);
// echo '</pre>';

// if (isset($_GET['search'])){

// }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>


<body>
    <?php require_once 'nav.html'; ?>

    <div class="container mt-3">
        <h2>Movie Search</h2>
        <form method="get">
            <div class="mb-3 mt-3">
                <input type="text" class="form-control" placeholder="..." name="movieSearch">
            </div>
            <button type="submit" class="btn btn-primary mb-3" name="search">Search</button>
        </form>
        <button type="submit" class="btn btn-primary mb-3">Order by Title</button>
    </div>



    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php foreach ($movies as $movie) : ?>
            <div class="col">
                <div class="card">
                    <img src="<?= $movie['poster']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $movie['title']; ?></h5>
                        <?php
                        echo "<p class='card-text'>" . substr_replace($movie['description'], "...", 30) . "</p>";
                        ?>
                        <a href="movie-details.php?id=<?= $movie['id']; ?>">more details</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>