<div class="d-flex justify-content-between align-items-center mb-3">
  <h3>Courses</h3>
  <a class="btn btn-primary" href="index.php?page=courses&action=create">Add New</a>
</div>
<table class="table table-striped">
  <thead>
    <tr><th>ID</th><th>CODE</th><th>NAME</th><th>CREDITS</th><th>LECTURER</th><th>ACTIONS</th></tr>
  </thead>
  <tbody>
    <?php foreach ($courses as $row): ?>
      <tr>
        <th><?= e($row['id']) ?></th>
        <td><?= e($row['code']) ?></td>
        <td><?= e($row['name']) ?></td>
        <td><?= e($row['credits']) ?></td>
        <td><?= e($row['lecturer_name']) ?></td>
        <td>
          <a class="btn btn-success btn-sm" href="index.php?page=courses&action=edit&id=<?= e($row['id']) ?>">Edit</a>
          <form method="post" action="index.php?page=courses&action=delete" class="d-inline"
                onsubmit="return confirm('Hapus course ini?')">
            <input type="hidden" name="id" value="<?= e($row['id']) ?>">
            <button class="btn btn-danger btn-sm">Delete</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
    <?php if (!$courses): ?><tr><td colspan="6" class="text-center text-muted">Belum ada data</td></tr><?php endif; ?>
  </tbody>
</table>
