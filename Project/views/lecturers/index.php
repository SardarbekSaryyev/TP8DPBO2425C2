<div class="d-flex justify-content-between align-items-center mb-3">
  <h3>Lecturers</h3>
  <a class="btn btn-primary" href="index.php?page=lecturers&action=create">Add New</a>
</div>
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th><th>NAME</th><th>NIDN</th><th>PHONE</th><th>JOIN DATE</th><th>DEPARTMENT</th><th>ACTIONS</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($lecturers as $row): ?>
      <tr>
        <th><?= e($row['id']) ?></th>
        <td><?= e($row['name']) ?></td>
        <td><?= e($row['nidn']) ?></td>
        <td><?= e($row['phone']) ?></td>
        <td><?= e($row['join_date']) ?></td>
        <td><?= e($row['department_name'] ?? '-') ?></td>
        <td>
          <a class="btn btn-success btn-sm" href="index.php?page=lecturers&action=edit&id=<?= e($row['id']) ?>">Edit</a>
          <form method="post" action="index.php?page=lecturers&action=delete" class="d-inline"
                onsubmit="return confirm('Hapus lecturer ini? Course miliknya ikut terhapus.')">
            <input type="hidden" name="id" value="<?= e($row['id']) ?>">
            <button class="btn btn-danger btn-sm">Delete</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
    <?php if (!$lecturers): ?><tr><td colspan="7" class="text-center text-muted">Belum ada data</td></tr><?php endif; ?>
  </tbody>
</table>
