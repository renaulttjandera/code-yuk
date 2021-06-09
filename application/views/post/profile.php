<div class="jumbotron container mt-3 profile">
<?= $this->session->flashdata('message'); ?>
    <?php 
    if ($this->session->flashdata('message'))
    {
        unset($_SESSION['message']);
    }
    ?>
<div class="card mb-3 mx-auto border border-light" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?= base_url('assets/') . $user['image']; ?>" width="170" height="170">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title text"><?= $user['name']; ?></h5>
        <p class="card-text text"><?= $user['email']; ?></p>
        <p class="card-text text"><small class="text-muted">Member since <?= date('D, d M Y', $user['date_created']); ?></small></p>
      </div>
    </div>
  </div>
</div>

<h1 class="display-4 text">My Posts</h1>
<div class="table-responsive table-bordered border-light">
<table class="table table-hover mb-5">
  <thead>
    <tr>
      <th scope="col" class="text">#</th>
      <th class="text">Title</th>
      <th class="text">Content</th>
      <th class="text">Author</th>
      <th class="text">Cover</th>
      <th class="text">Date Posted</th>
      <th class="text">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $i = 1; ?>
    <?php foreach ($post as $p): ?>
    <tr>
        <td class="text"><?= $i; ?></td>
        <td class="text"><a href="<?= base_url('post/details?id=') . $p['id']; ?>"><?= $p['title']; ?></a></td>
        <td class="text"><?= wordwrap($p['content'],50,"<br>\n", TRUE); ?></td>
        <td class="text"><?= $p['author']; ?></td>
        <td class="text"><img src="<?= base_url('assets/cover/') . $p['image']; ?>" width="50" height="50"></td>
        <td class="text"><?= date('D, d M Y', $p['date_created']); ?></td>
        <td class="text">
            <a href="<?= base_url('post/delete?id=') . $p['id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
  </tbody>
</table>
</div>


