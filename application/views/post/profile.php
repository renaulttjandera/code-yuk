<div class="jumbotron container mt-3 profile">
<?= $this->session->flashdata('message'); ?>
    <?php 
    if ($this->session->flashdata('message'))
    {
        unset($_SESSION['message']);
    }
    ?>
<div class="card mb-3 mx-auto" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?= base_url('assets/') . $user['image']; ?>" width="170" height="170">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?= $user['name']; ?></h5>
        <p class="card-text"><?= $user['email']; ?></p>
        <p class="card-text"><small class="text-muted">Member since <?= date('D, d M Y', $user['date_created']); ?></small></p>
      </div>
    </div>
  </div>
</div>

<h1 class="display-4">My Posts</h1>
<div class="table-responsive">
<table class="table table-hover mb-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th>Title</th>
      <th>Content</th>
      <th>Author</th>
      <th>Cover</th>
      <th>Date Posted</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $i = 1; ?>
    <?php foreach ($post as $p): ?>
    <tr>
        <td><?= $i; ?></td>
        <td><a href="<?= base_url('post/details?id=') . $p['id']; ?>"><?= $p['title']; ?></a></td>
        <td><?= wordwrap($p['content'],50,"<br>\n", TRUE); ?></td>
        <td><?= $p['author']; ?></td>
        <td><img src="<?= base_url('assets/cover/') . $p['image']; ?>" width="50" height="50"></td>
        <td><?= date('D, d M Y', $p['date_created']); ?></td>
        <td>
            <a href="<?= base_url('post/delete?id=') . $p['id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
  </tbody>
</table>
</div>


