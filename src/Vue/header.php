<?php
session_start();
$user = isset($_SESSION['userName']) ? $_SESSION['userName'] : "Guest";
$connected = $user != "Guest";
?>

<header>
    <nav class="navbar navbar-expand-md bg-primary p-4" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Recipe App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                if ($connected) {
                    echo "<ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                        <li class='nav-item'>
                            <a class='nav-link' aria-current='page' href='index.php?action=home'>Home</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='index.php?action=addrecipe'>Add Recipe</a>
                        </li>
                    </ul>";
                }
                ?>
                <span class="d-flex gap-3 justify-content-evenly align-items-center" data-bs-theme="dark">
                    <?php
                    if (!$connected) {
                        echo " <span>
                                <a class='nav-link' href='?action=register'>Register</a>
                        </span>
                        <span>
                                <a class='nav-link' href='?action=login'>Login</a>
                        </span>";
                    } else {
                        echo "
                         <span><strong>$user</strong></span>
                         <span>
                                <a class='nav-link' href='logout.php'>Log-out</a>
                        </span>";

                    }
                    ?>

                </span>
            </div>
        </div>
    </nav>
</header>