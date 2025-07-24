<section>
    <form method="post" action="">
        <div class="mb-3">
            <label for="rimage" class="form-label">Recipe's Image</label>
            <input class="form-control" type="file" id="rimage" name="rimage" required accept="image/*">
        </div>
        <div class="mb-3">
            <label for="rname" class="form-label">Recipe Name</label>
            <input type="text" class="form-control" id="rname" name="rname" placeholder="" required maxlength="50">
        </div>
        <div class="mb-3">
            <label for="rdescription" class="form-label">Recipe Description</label>
            <textarea class="form-control" id="rdescription" name="rdescription" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Recipe</button>
    </form>
</section>