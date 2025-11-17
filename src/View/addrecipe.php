<?php
unset($_COOKIE['ErrorAddingRecipe']);
?>
<main class="flex-grow-1">
    <section class="container my-4">
        <h1 class="text-center alert alert-light">Add A New Recipe</h1>
        <form method="post" action="" enctype="multipart/form-data" class="p-3 rounded">
            <div class="mb-4">
                <label for="rname" class="form-label">Recipe's Name <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" id="rname" name="rname" placeholder="" required maxlength="50">
            </div>
            <div class="mb-4">
                <label for="rimage" class="form-label">Recipe's Image <span class="text-danger">*</span>
                </label>
                <input class="form-control" type="file" id="rimage" name="rimage" required accept="image/*">
            </div>
            <div class="mb-4">
                <label for="rdescription" class="form-label">Recipe Description <span class="text-danger">*</span>
                </label>
                <textarea class="form-control" id="rdescription" name="rdescription" rows="8" required></textarea>
            </div>
            <?php
            if (isset($_COOKIE['ErrorAddingRecipe'])) {
                echo "<div class='form-text alert alert-danger'>" . $_COOKIE['ErrorAddingRecipe'] . "</div>";
                unset($_COOKIE['ErrorAddingRecipe']);
            }
            ?>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Add Recipe</button>
            </div>
        </form>
    </section>
</main>