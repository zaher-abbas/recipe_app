<?php

/** @var array|null $favoriteRecipes */

?>
<div class='container my-4'>
    <h1 class="text-center mb-5 display-6 fw-bold">&#11088; My Favorite Recipes &#11088;</h1>
</div>
<?php if ($favoriteRecipes): ?>
<div class="container page-favorites">
    <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-1 g-4 p-4 justify-content-center">
        <?php foreach ($favoriteRecipes as $recipe): ?>
            <div class="col">
                <div class="card recipe-card bg-sage-light text-forest border border-secondary-subtle border-start-0 rounded-end border-4 mb-3 p-4">
                    <img src="./../View/img/<?= $recipe['image'] ?>" class="card-img-top rounded-start w-100 fixed-img"
                         alt="">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?= htmlspecialchars($recipe['name']) ?></h5>
                        <p class="card-text">Submitted
                            by <?= htmlspecialchars($recipe['firstname']) . ' ' . htmlspecialchars($recipe['lastname']) ?></p>
                        <div class="text-center my-4">
                            <a href="index.php?action=recipe&id=<?= $recipe['id'] ?>" class="btn btn-success w-50">Check
                                this Recipe!</a>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Submitted on <?= $recipe['created_at'] ?></small>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php endif; ?>
        <?php if ($favoriteRecipes == null): ?>
            <div class="container">
                <div class="alert alert-info text-center fs-5" role="alert">
                    You have no favorite recipes yet!
                    <br><br>
                    <a href="index.php?action=recipes" class="btn btn-success">Check our recipes</a>
                </div>
            </div>
        <?php endif; ?>
