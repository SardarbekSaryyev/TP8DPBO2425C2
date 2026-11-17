<div class="d-flex justify-content-between align-items-center mb-3">
  <h3>Departments</h3>
  <a class="btn btn-primary" href="index.php?page=departments&action=create">Add New</a>
</div>
<table class="table table-striped">
  <thead>
    <tr><th>ID</th><th>NAME</th><th>FACULTY</th><th>LECTURERS</th><th>ACTIONS</th></tr>
  </thead>
  <tbody>
    <?php foreach ($departments as $row): ?>
      <tr>
        <th><?= e($row['id']) ?></th>
        <td><?= e($row['name']) ?></td>
        <td><?= e($row['faculty']) ?></td>
        <td><?= e($row['total_lecturers']) ?></td>
        <td>
          <a class="btn btn-success btn-sm" href="index.php?page=departments&action=edit&id=<?= e($row['id']) ?>">Edit</a>
          <form method="post" action="index.php?page=departments&action=delete" class="d-inline"
                onsubmit="return confirm('Hapus department ini?')">
            <input type="hidden" name="id" value="<?= e($row['id']) ?>">
            <button class="btn btn-danger btn-sm">Delete</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
    <?php if (!$departments): ?><tr><td colspan="5" class="text-center text-muted">Belum ada data</td></tr><?php endif; ?>
  </tbody>
</table>
