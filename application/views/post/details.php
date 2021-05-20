<div class="jumbotron container mt-3">
        <p class="lead"><?= date('D, d M Y', $post['date_created']); ?></p>
        <h1 class="display-4"><?= $post['title']; ?></h1>
        <p class="lead">Posted by: <?= $post['author'] ?></p>
        <p><?= $post['content']; ?></p>
        <a href="<?= base_url('post'); ?>" class="btn btn-danger mb-5">Back</a>
    </div>