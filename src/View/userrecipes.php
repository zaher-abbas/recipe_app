<?php
/** @var array|null $userRecipes */

?>
<main>
    <h1 class="text-center my-5 fw-bold">&#128100; My Recipes &#129379;</h1>
    <?php if ($userRecipes): ?>
    <div class="container">
        <section class="list-group">
            <?php foreach ($userRecipes as $recipe): ?>
                <a href="index.php?action=recipe&id=<?= $recipe['id'] ?>"
                   class="list-group-item list-group-item-action mb-3">&#129379; <?= $recipe['name'] ?></a>
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
