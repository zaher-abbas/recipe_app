<?php
session_start();
$user = isset($_SESSION['userName']) ? $_SESSION['userName'] : "Guest";
$connected = $user != "Guest";
?>

<header>
    <nav class="navbar navbar-expand-md p-4 text-light">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="index.php">&#127860; MyRecipe</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                if ($connected) {
                    echo "<ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                        <li class='nav-item me-2'>
                            <a class='nav-link text-light p-3' aria-current='page' href='index.php?action=home'>Home</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link text-light text-bg-primary rounded-2 p-3' href='index.php?action=addrecipe'>Add Recipe ➕</a>
                        </li>
                        <li class='nav-item ms-lg-3 mt-md-2 mt-sm-2 mt-lg-0'>
                        <a class='nav-link text-dark text-bg-warning rounded-2 p-3' href='index.php?action=favorites'>My Favorites &#11088;</a>
                        </li>
                    </ul>";
                }
                ?>
                <span class="d-flex align-items-center justify-content-evenly gap-4">
                    <?php
                    if (!$connected) {
                        echo "<span class='nav-item'>
                                <a class='nav-link text-light' href='index.php?action=register'>Register</a>
                        </span>
                        <span class='nav-item'>
                                <a class='nav-link text-light' href='index.php?action=login'>Login</a>
                        </span>";
                    } else {
                        echo "
                         <a href='index.php?action=profile' class='text-dark text-bg-info p-3 rounded-2 text-decoration-none'><strong>&#128100; $user</strong></a>
                         <span class='nav-item'>
                                <a class='nav-link text-bg-danger p-3 rounded-2' href='logout.php'>Log-out ↪</a>
                        </span>";
                    }
                    ?>
                </span>
            </div>
        </div>
    </nav>
</header>