<div class="jumbotron container mt-3">
        <form action="<?= base_url('post/add'); ?>" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" rows="10" name="content" required></textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-danger">Add Post</button>
            </div>
        </form>
    </div>