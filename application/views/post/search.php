<div class="jumbotron container mt-3">
        <h1 class="display-4">Search Results for <?= $this->input->get('keyword'); ?></h1>
        <div class="row mt-3 mb-5">
        <?php foreach ($posts as $p): ?>
            <div class="col-md-4 mb-3">
                <div class="card" style="width: 18rem;">
                    <img src="<?= base_url('assets/') ?>default-product.png" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?= $p['title']; ?></h5>
                        <p class="card-text"><?= implode(' ', array_slice(explode(' ', $p['content']), 0, 20)) ?> ...</p>
                        <a href="<?= base_url('post/details?id=') . $p['id']; ?>" class="btn btn-danger">Read More</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
    