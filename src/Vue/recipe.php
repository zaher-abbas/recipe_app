<?php
/** @var array|null $recipe */
?>

<section class="container">
    <?php if ($recipe !== null): ?>

<div class="card my-4">
    <div class="row g-0">
        <div class="col-lg-4 col-md-4">
            <img src="<?='./../img/' . $recipe['image'];?>" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-lg-8 col-md-8">
            <div class="card-body">
                <h3 class="card-title"><?=htmlspecialchars($recipe['name'])?></h3>
                <h6 class="card-title"><?='By: ' . htmlspecialchars($recipe['firstname']) . ' ' . htmlspecialchars($recipe['lastname']) ?></h6>
                <p class="card-text"><?=htmlspecialchars($recipe['description'])?></p>

            </div>
        </div>
    </div>
</div>
    <?php endif; ?>

</section>
