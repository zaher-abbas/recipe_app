<?php
/** @var array|null $recipe */
/** @var array|null $comments */
/** @var boolean $isRecipeFavorite */

?>
<main class="flex-grow-1">
    <section class="container">
        <?php if ($recipe !== null): ?>
            <div class="card my-4 recipe-details p-3">
                <div class="row g-1">
                    <div class="col-lg-4 col-md-4 d-flex align-items-center">
                        <img src="<?= './../View/img/' . $recipe['image']; ?>" class="img-fluid rounded-start"
                             alt="...">
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="card-body">
                            <div class="d-flex justify-content-lg-end justify-content-md-center justify-content-sm-center mb-md-4 mb-sm-4">
                                <?php if (!$isRecipeFavorite): ?>
                                    <a href="index.php?action=addtofavorites&id=<?= $recipe['id'] ?>"
                                       class="btn btn-warning btn-md mt-2">
                                        ★ Add to Favorites
                                    </a>
                                <?php else: ?>
                                    <a href="index.php?action=removefromfavorites&id=<?= $recipe['id'] ?>"
                                       class="btn btn-danger btn-sm mt-2">
                                        ★ Remove from Favorites
                                    </a>
                                <?php endif; ?>
                            </div>
                            <h3 class="card-title"><?= htmlspecialchars($recipe['name']) ?></h3>
                            <h6 class="card-title mb-4"><?= 'Submitted by: ' . htmlspecialchars($recipe['firstname']) . ' ' . htmlspecialchars($recipe['lastname']) . ' on ' . $recipe['created_at'] ?></h6>
                            <p class="card-text"><?= htmlspecialchars($recipe['description']) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <form method="post" action="" class="my-4 p-3 rounded">
            <h6 class="mb-4">Rate this recipe and leave a comment:</h6>
            <div class="mb-4">
                <select class="form-select" aria-label="Default select example" name="note" required>
                    <option selected disabled>Rate this recipe</option>
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
                <div class="card mb-4">
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
</main>
<?php if (!empty($_SESSION['toast'])): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Toastify({
                text: "<?php echo htmlspecialchars($_SESSION['toast']['message'] ?? ''); ?>",
                duration: 3000,
                gravity: "top",      // "top" ou "bottom"
                position: "right",   // "left", "center" ou "right"
                backgroundColor: "<?php echo ($_SESSION['toast']['type'] ?? 'info') === 'success' ? '#16a34a' : '#2563eb'; ?>",
                close: true
            }).showToast();
        });
    </script>
    <?php unset($_SESSION['toast']); endif; ?>

