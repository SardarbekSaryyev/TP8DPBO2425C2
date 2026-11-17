<?php $edit = $item !== null; ?>
<div class="col-lg-6 m-auto">
  <div class="card">
    <div class="card-header <?= $edit ? 'bg-warning' : 'bg-primary' ?>">
      <h4 class="text-white text-center m-0"><?= $edit ? 'Update' : 'Create' ?> Department</h4>
    </div>
    <form method="post" class="card-body">
      <label class="form-label">NAME</label>
      <input type="text" name="name" class="form-control mb-3" value="<?= e($item['name'] ?? '') ?>" required>

      <label class="form-label">FACULTY</label>
      <input type="text" name="faculty" class="form-control mb-3" value="<?= e($item['faculty'] ?? '') ?>" required>

      <button class="btn btn-success" type="submit">Submit</button>
      <a class="btn btn-info" href="index.php?page=departments">Cancel</a>
    </form>
  </div>
</div>
