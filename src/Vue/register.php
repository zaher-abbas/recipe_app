<section class="container my-4 text-white">
    <h1 class="text-center alert alert-light">Register A New Account</h1>
    <form action="" method="post" class="p-3">
        <div class="mb-4">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" required maxlength="20">
        </div>
        <div class="mb-4">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" required maxlength="50">
        </div>
        <div class="mb-4">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required
                   maxlength="50" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
        </div>
        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required minlength="8">
        </div>
        <?php
        if (isset($_COOKIE['UserAlreadyExists'])) {
            echo "<div class='form-text alert alert-danger'>" . $_COOKIE['UserAlreadyExists'] . "</div>";
            unset($_COOKIE['UserAlreadyExists']);
        }
        ?>
        <div class="text-center">
        <button type="submit" class="btn btn-success">Register</button>
        </div>
    </form>
</section>