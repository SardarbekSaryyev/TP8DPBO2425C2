<?php $edit = $item !== null; ?>
<div class="col-lg-6 m-auto">
  <div class="card">
    <div class="card-header <?= $edit ? 'bg-warning' : 'bg-primary' ?>">
      <h4 class="text-white text-center m-0"><?= $edit ? 'Update' : 'Create' ?> Course</h4>
    </div>
    <form method="post" class="card-body">
      <label class="form-label">CODE</label>
      <input type="text" name="code" class="form-control mb-3" value="<?= e($item['code'] ?? '') ?>" required>

      <label class="form-label">NAME</label>
      <input type="text" name="name" class="form-control mb-3" value="<?= e($item['name'] ?? '') ?>" required>

      <label class="form-label">CREDITS</label>
      <input type="number" name="credits" min="1" max="6" class="form-control mb-3" value="<?= e($item['credits'] ?? 2) ?>" required>

      <label class="form-label">LECTURER</label>
      <select name="lecturer_id" class="form-select mb-3" required>
        <option value="">- Pilih lecturer -</option>
        <?php foreach ($lecturers as $l): ?>
          <option value="<?= e($l['id']) ?>" <?= ($item['lecturer_id'] ?? null) == $l['id'] ? 'selected' : '' ?>>
            <?= e($l['name']) ?>
          </option>
        <?php endforeach; ?>
      </select>

      <button class="btn btn-success" type="submit">Submit</button>
      <a class="btn btn-info" href="index.php?page=courses">Cancel</a>
    </form>
  </div>
</div>
