<?php
session_start();
$user = isset($_SESSION['user']) ? $_SESSION['user'] : "Guest";
$connected = $user != "Guest";
?>

<header>
    <nav class="navbar navbar-expand-md bg-primary p-4" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Recettes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
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