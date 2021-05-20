<div class="jumbotron container mt-3">
    <?= $this->session->flashdata('message'); ?>
    <?php 
    if ($this->session->flashdata('message'))
    {
        unset($_SESSION['message']);
    }
    ?>
        <a href="<?= base_url('post/add'); ?>" class="btn btn-danger">Add Post <i class="fas fa-plus"></i></a>
        <h1 class="display-4">Latest Post</h1>
        <div class="row mt-3 mb-5">
        <?php foreach ($posts as $p): ?>
        
            <div class="col-md-4 mb-3">
                <div class="card" style="width: 18rem;">
                    <img src="<?= base_url('assets/') ?>default-product.png" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?= $p['title']; ?></h5>
                        <p class="card-text"><?= limit_content($p['content'], 100); ?></p>
                        <a href="<?= base_url('post/details?id=') . $p['id']; ?>" class="btn btn-danger">Read More</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php 
        function limit_content($x, $length)
        {
          if(strlen($x)<=$length)
          {
            echo $x;
          }
          else
          {
            $y=substr($x,0,$length) . ' ...';
            echo $y;
          }
        }    
        ?>
        </div>
    </div>
    