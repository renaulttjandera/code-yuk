<div class="jumbotron container mt-3">
<?= $this->session->flashdata('message'); ?>
    <?php 
    if ($this->session->flashdata('message'))
    {
        unset($_SESSION['message']);
    }
    ?>
        <?php echo form_open_multipart('post/add');?>
            <div class="mb-3">
                <label for="title" class="form-label text">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label text">Content</label>
                <textarea class="form-control" rows="10" name="content" required></textarea>

            <div class="mb-3">
                <label for="image" class="form-label text">Cover Image</label>
                <input class="form-control" type="file" id="image" name="image" required>
                <div id="imageHelp" class="form-text text">Note: Image with 1 : 1 ratio will have better result</div>
            </div>
            <div class="mb-5">
                <button type="submit" class="btn btn-danger">Add Post</button>
            </div>
        </form>
    </div>
