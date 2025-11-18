<?php
/** @var array|null $userRecipes */

?>
<main>
    <h1>My Recipes</h1>
    <?php if ($userRecipes): ?>
    <section class="list-group">
        <?php foreach ($userRecipes as $recipe): ?>
            <a href="/recipe/<?= $recipe['id'] ?>"
               class="list-group-item list-group-item-action"><?= $recipe['title'] ?></a>
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
</main>
