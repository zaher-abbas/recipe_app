<?php
session_start();
$user = isset($_SESSION['userName']) ? $_SESSION['userName'] : "Guest";
$connected = $user != "Guest";
?>

<header>
    <nav class="navbar navbar-expand-md p-4 text-light">
        <div class="container-fluid">
            <a class="navbar-brand text-light fs-2" href="index.php">&#127860; MyRecipe</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                if ($connected) {
                    echo "<ul class='navbar-nav me-auto mb-2 mb-lg-0 mb-md-0'>
                        <li class='nav-item me-3 mb-sm-2 mb-lg-0 mb-md-0'>
                            <a class='btn btn-success btn-outline-dark rounded-2 p-3 w-100' aria-current='page' href='index.php?action=home'>Home &#127968;</a>
                        </li>
                        <li class='nav-item'>
                            <a class='btn btn-primary btn-outline-dark rounded-2 p-3 w-100' href='index.php?action=addrecipe'>Add Recipe ➕</a>
                        </li>
                        <li class='nav-item ms-lg-3 mt-sm-2 mt-lg-0 mt-md-0'>
                        <a class='btn btn-warning btn-outline-dark rounded-2 p-3 w-100' href='index.php?action=favorites'>My Favorites &#11088;</a>
                        </li>
                          <li class='nav-item ms-lg-3 mt-sm-2 mt-lg-0 mt-md-0'>
                        <a class='btn btn-info btn-outline-dark rounded-2 p-3 w-100' href='index.php?action=userrecipes'>My Recipes &#129379;</a>
                        </li>
                    </ul>";
                }
                ?>
                <span class="d-flex align-items-center justify-content-evenly gap-4">
                    <?php
                    if (!$connected) {
                        echo "<span class='nav-item'>
                                <a class='btn btn-primary btn-outline-light p-3 rounded-2' href='index.php?action=register'>Register &#10133;</a>
                        </span>
                        <span class='nav-item'>
                                <a class='btn btn-success btn-outline-light p-3 rounded-2' href='index.php?action=login'>Login &#128273;</a>
                        </span>";
                    } else {
                        echo "

                         <a href='index.php?action=profile' class='btn btn-info btn-outline-dark p-3 rounded-2 text-decoration-none mt-0 mt-md-3 mt-sm-3'><strong>&#128100; $user</strong></a>
                         <span class='nav-item'>
                                <a class='btn btn-danger btn-outline-dark p-3 rounded-2  mt-0 mt-md-3 mt-sm-3' href='logout.php'>Log-out ↪</a>
                        </span>";
                    }
                    ?>
                </span>
            </div>
        </div>
    </nav>
</header>