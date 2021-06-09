<div class="jumbotron container mt-3">
        <h1 class="display-4 text">Search Results for <?= $this->input->get('keyword'); ?></h1>
        <div class="row mt-3 mb-5">
        <?php foreach ($posts as $p): ?>
            <div class="col-md-4 mb-3 ">
                <div class="card border border-light" style="width: 18rem;">
                    <img src="<?= base_url('assets/cover/') . $p['image']; ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title text"><?= $p['title']; ?></h5>
                        <p class="card-text text "><?= limit_content($p['content'], 100); ?></p>
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
    