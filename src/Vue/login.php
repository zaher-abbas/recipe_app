<section class="container my-4">
    <h1 class="text-center alert alert-light">Log-in to your account</h1>
    <form action="" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required
                   maxlength="50" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
        </div>
        <?php
        if (isset($_COOKIE['UserNotFound'])) {
            echo "<div class='form-text alert alert-danger'>" . $_COOKIE['UserNotFound'] . "</div>";
            unset($_COOKIE['UserNotFound']);
        }
        ?>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <?php
        if (isset($_COOKIE['WrongPassword'])) {
            echo "<div class='form-text alert alert-danger'>" . $_COOKIE['WrongPassword'] . "</div>";
            unset($_COOKIE['WrongPassword']);
        }
        ?>
        <div class="text-center">
            <button type="submit" class="btn btn-success">Log-in</button>
        </div>
    </form>
</section>

