<?php
/** @var array|null $userRecipes */

?>
<main>
    <h1 class="text-center my-5 fw-bold">&#128100; My Recipes &#129379;</h1>
    <?php if ($userRecipes): ?>
    <div class="container">
        <section class="list-group">
            <?php foreach ($userRecipes as $recipe): ?>
                <div class="list-group-item list-group-item-action mb-3 d-flex justify-content-between align-items-center cursor-pointer">
                    <div class="w-50">
                        <a class="text-decoration-none text-dark"
                           href="index.php?action=recipe&id=<?= $recipe['id'] ?>">
                            &#129379; <?= $recipe['name'] ?></a>
                    </div>
                    <div>
                        <a href="index.php?action=editrecipe&id=<?= $recipe['id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="index.php?action=deleterecipe&id=<?= $recipe['id'] ?>"
                           class="btn btn-danger">Delete</a>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php else: ?>
            <div class="container">
                <div class="alert alert-info text-center fs-5" role="alert">
                    You did not add any recipes yet!
                    <br><br>
                    <a href="index.php?action=addrecipe" class="btn btn-success">Add Recipe</a>
                </div>
                <?php endif; ?>
        </section>
    </div>
</main>
