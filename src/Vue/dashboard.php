<?php
$user = isset($_SESSION['user']) ? $_SESSION['user'] : "Guest";
?>
<h1>Welcome <?= $user ?></h1>
