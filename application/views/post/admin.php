<div class="jumbotron container mt-3">
<?= $this->session->flashdata('message'); ?>
    <?php 
    if ($this->session->flashdata('message'))
    {
        unset($_SESSION['message']);
    }
    ?>
    <h1 class="text">Post Queue</h1>
    <div class="table-responsive">
<table class="table table-hover mb-5 table-bordered border-light">
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
    <?php foreach ($queue as $q): ?>
    <tr>
        <td class="text"><?= $i; ?></td>
        <td class="text"><?= $q['title']; ?></td>
        <td class="text"><?= wordwrap($q['content'],50,"<br>\n", TRUE); ?></td>
        <td class="text"><?= $q['author']; ?></td>
        <td><img src="<?= base_url('assets/cover/') . $q['image']; ?>" width="50" height="50"></td>
        <td class="text"><?= date('D, d M Y', $q['date_created']); ?></td>
        <td>
            <a href="<?= base_url('post/approve?id=') . $q['id']; ?>" class="btn btn-success mb-3"><i class="fas fa-check"></i></a>
            <a href="<?= base_url('post/reject?id=') . $q['id']; ?>" class="btn btn-danger mb-3"><i class="fas fa-times"></i></a>
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
<h1 class="text">User List</h1>
<div class="table-responsive">
<table class="table table-hover mb-5 table-bordered border-light">
  <thead>
    <tr>
      <th scope="col" class="text">#</th>
      <th class="text">Name</th>
      <th class="text">Email Address (Encrypted)</th>
      <th class="text">Profile</th>
      <th class="text">Date Joined</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php foreach ($users as $u): ?>
    <tr>
        <td class="text"><?= $i; ?></td>
        <td class="text"><?= $u['name']; ?></td>
        <td class="text"><?= hash('sha256', $u['email'], false); ?></td>
        <td><img src="<?= base_url('assets/') . $u['image']; ?>" width="50" height="50"></td>
        <td class="text"><?= date('D, d M Y', $u['date_created']); ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
</div>