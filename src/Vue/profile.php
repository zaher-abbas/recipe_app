<?php

/** @var array|null $user */

?>

<section class="container my-3">
    <div class="card">
        <div class="card-header text-primary fw-bolder fs-2">Profile Info</div>
        <div class="row g-0">
            <div class="col-4">
                <img
                    src="https://img.favpng.com/23/3/2/computer-icons-silhouette-user-profile-png-favpng-NvqKckg9G8mZk9Qi1zqWnn4fA.jpg"
                    class="card-img" alt="...">
            </div>
            <div class="card-body col-8">
                <h3 class="card-title">&#128100; <?= $user["firstname"] . " " . $user['lastname'] ?></h3>
                <p class="card-text fs-3">📧 <?= $user["email"] ?> </p>
                <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</section>