<div class="jumbotron container mt-3">
<?= $this->session->flashdata('message'); ?>
    <?php 
    if ($this->session->flashdata('message'))
    {
        unset($_SESSION['message']);
    }
    ?>
<table class="table table-hover mb-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th>Title</th>
      <th>Content</th>
      <th>Author</th>
      <th>Date Posted</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php foreach ($queue as $q): ?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $q['title']; ?></td>
        <td><?= wordwrap($q['content'],50,"<br>\n", TRUE); ?></td>
        <td><?= $q['author']; ?></td>
        <td><?= date('D, d M Y', $q['date_created']); ?></td>
        <td>
            <a href="<?= base_url('post/approve?id=') . $q['id']; ?>" class="btn btn-success"><i class="fas fa-check"></i></a>
            <a href="<?= base_url('post/reject?id=') . $q['id']; ?>" class="btn btn-danger"><i class="fas fa-times"></i></a>
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
  </tbody>
</table>
</div>