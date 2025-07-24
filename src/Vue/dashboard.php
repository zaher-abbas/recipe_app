<?php
$user = isset($_SESSION['userName']) ? $_SESSION['userName'] : "";
?>
<?php
if ($user != "") {
echo
"<h1>Dashboard — Recipe App</h1>
<h3>Welcome <?= $user ?></h3>";
}
else {
    echo
"<h2 class='alert alert-warning'>You Are Not Authorized</h2>
 <h4 class='alert alert-info'> Please Register a new Account <a href='index.php?action=register'><strong>Here</strong></a></h4>";
}
?>

