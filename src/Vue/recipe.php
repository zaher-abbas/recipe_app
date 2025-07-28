<?php
/** @var array|null $recipe */
/** @var array|null $comments */

?>

<section class="container">
    <?php if ($recipe !== null): ?>

        <div class="card my-4">
            <div class="row g-0">
                <div class="col-lg-4 col-md-4">
                    <img src="<?= './../img/' . $recipe['image']; ?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="card-body">
                        <h3 class="card-title"><?= htmlspecialchars($recipe['name']) ?></h3>
                        <h6 class="card-title mb-4"><?= 'Submitted by: ' . htmlspecialchars($recipe['firstname']) . ' ' . htmlspecialchars($recipe['lastname']) . ' on ' . $recipe['created_at'] ?></h6>
                        <p class="card-text"><?= htmlspecialchars($recipe['description']) ?></p>

                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <form method="post" action="" class="my-4 p-3 rounded">
        <h6>Rate this recipe and leave a comment:</h6>
        <div class="mb-4">
            <select class="form-select" aria-label="Default select example" name="note">
                <option selected>Rate this recipe</option>
                <option value="1">&#11088;</option>
                <option value="2">&#11088; &#11088;</option>
                <option value="3">&#11088; &#11088; &#11088;</option>
                <option value="4">&#11088; &#11088; &#11088; &#11088;</option>
                <option value="5">&#11088; &#11088; &#11088; &#11088; &#11088;</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="comment" class="form-label">Recipe Description</label>
            <textarea class="form-control" id="comment" name="comment" rows="6" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php if ($comments !== null): ?>
        <?php foreach ($comments as $comment): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?= $comment["author_name"] ?> on <?= $comment["date"] ?></h5>
                    <?php switch ($comment["note"]) {
                        case 1:
                            echo "<p class='card-text'>	&#11088;</p>";
                            break;
                        case 2:
                            echo "<p class='card-text'>	&#11088; &#11088;</p>";
                            break;
                        case 3:
                            echo "<p class='card-text'>	&#11088; &#11088; &#11088;</p>";
                            break;
                        case 4:
                            echo "<p class='card-text'>	&#11088; &#11088; &#11088; &#11088;</p>";
                            break;
                        case 5:
                            echo "<p class='card-text'>	&#11088; &#11088; &#11088; &#11088; &#11088;</p>";
                            break;
                    } ?>
                    <p class="card-text"><?= htmlspecialchars($comment["comment"]) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</section>
