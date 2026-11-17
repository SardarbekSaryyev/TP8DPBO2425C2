<?php $edit = $item !== null; ?>
<div class="col-lg-6 m-auto">
  <div class="card">
    <div class="card-header <?= $edit ? 'bg-warning' : 'bg-primary' ?>">
      <h4 class="text-white text-center m-0"><?= $edit ? 'Update' : 'Create' ?> Lecturer</h4>
    </div>
    <form method="post" class="card-body">
      <label class="form-label">NAME</label>
      <input type="text" name="name" class="form-control mb-3" value="<?= e($item['name'] ?? '') ?>" required>

      <label class="form-label">NIDN</label>
      <input type="text" name="nidn" class="form-control mb-3" value="<?= e($item['nidn'] ?? '') ?>" required>

      <label class="form-label">PHONE</label>
      <input type="text" name="phone" class="form-control mb-3" value="<?= e($item['phone'] ?? '') ?>" required>

      <label class="form-label">JOIN DATE</label>
      <input type="date" name="join_date" class="form-control mb-3" value="<?= e($item['join_date'] ?? '') ?>" required>

      <label class="form-label">DEPARTMENT</label>
      <select name="department_id" class="form-select mb-3">
        <option value="">- None -</option>
        <?php foreach ($departments as $d): ?>
          <option value="<?= e($d['id']) ?>" <?= ($item['department_id'] ?? null) == $d['id'] ? 'selected' : '' ?>>
            <?= e($d['name']) ?>
          </option>
        <?php endforeach; ?>
      </select>

      <button class="btn btn-success" type="submit">Submit</button>
      <a class="btn btn-info" href="index.php?page=lecturers">Cancel</a>
    </form>
  </div>
</div>
