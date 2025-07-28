<?php

/** @var array|null $recipes */

$user = isset($_SESSION['userName']) ? $_SESSION['userName'] : "";
?>
<?php if ($user != ""): ?>
    <div class='container my-4'>
        <h1 class="text-center mb-4 display-4 fw-bold">Dashboard - &#127860; MyRecipe</h1>
        <h3 class="text-center">Welcome &#128100;<?= htmlspecialchars($user) ?></h3>
    </div>
<?php if ($recipes != null):?>
<div class="container">
<div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-1 g-4 p-4">
<?php foreach ($recipes as $recipe): ?>
  <div class="col">
    <div class="card recipe-card bg-sage-light text-forest border border-secondary-subtle border-start-0 rounded-end border-4 mb-3 p-4">
      <img src="./../img/<?=$recipe['image']?>" class="card-img-top rounded-start w-100 fixed-img" alt="">
      <div class="card-body">
        <h5 class="card-title fw-bold"><?=htmlspecialchars($recipe['name']) ?></h5>
        <p class="card-text">This recipe is submitted by <?= htmlspecialchars($recipe['firstname']) . ' ' . htmlspecialchars($recipe['lastname']) ?></p>
         <div class="text-center my-4">
         <a href="index.php?action=recipe&id=<?=$recipe['id']?>" class="btn btn-success w-50">Check this Recipe!</a>
         </div>
      </div>
       <div class="card-footer">
        <small class="text-body-secondary">Submitted on <?=$recipe['created_at'] ?></small>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<?php endif; ?>
</div>
<?php else: ?>
    <!--
    <div class='container my-4 text-center'>
        <h2 class='alert alert-warning'>You Are Not Authorized!</h2>
        <h4 class='alert alert-info'>
        If you are a new user, please register a new account:
            <a href='index.php?action=register'><strong>Register</strong></a>
             </br></br>
        If you already have an account, you can:
             <a href='index.php?action=login'><strong>Login</strong></a>
        </h4>
    </div>
    !-->
    <section class="hero-section my-3 p-4 container rounded-4">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-4">&#127860; Welcome to MyRecipe App</h1>
                    <p class="lead mb-5">View recipes from all over the world, shared by everyone, you can add yours too!</p>
                    <p class="lead mb-5">Try it...it is Fun!</p>
                    <div class="d-flex gap-3 justify-content-center flex-wrap">
                        <a href="index.php?action=register" class="btn btn-light btn-lg px-4 py-2">Register</a>
                        <a href="index.php?action=login" class="btn btn-outline-light btn-lg px-4 py-2">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>