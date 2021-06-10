<div class="jumbotron container mt-3">
<?= $this->session->flashdata('message'); ?>
    <?php 
    if ($this->session->flashdata('message'))
    {
        unset($_SESSION['message']);
    }
    ?>
        <p class="lead text"><?= date('D, d M Y', $post['date_created']); ?></p>
        <h1 class="display-4 text"><?= $post['title']; ?></h1>
        <p class="lead text">Posted by: <?= $post['author'] ?></p>
        <p class="text" style="word-wrap: break-word;"><?= nl2br($post['content']); ?></p>
        <a href="<?= base_url('post'); ?>" class="btn btn-danger mb-5">Back</a>

        <h3 class="text">Comments: <?= $comments_num; ?></h3>
        <form action="" method="post">
            <div class="mb-3">
                <textarea class="form-control" id="content" rows="3" name="content" style="width: 16rem;" required></textarea>
            </div>
            <div class="mb-3">
            <button type="submit" class="btn btn-danger">Add Comment</button>
            </div>
        </form>
        <?php foreach ($comments as $c): ?>
        <h5 class="mb-3" style="padding-top: 1.5rem; padding-bottom: 1.5rem; padding-left: 2rem; background-color: #d1d1d1;"><?= $c['content'] ?> (Posted by <?= $c['sender'] ?> on <?= date('D, d M Y', $c['date_created']); ?>)</h5>
        <?php endforeach; ?>
</div>