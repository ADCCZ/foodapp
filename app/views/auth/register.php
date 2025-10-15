<?php ob_start(); ?>
<h1>Registrace</h1>

<?php if (!empty($error)): ?>
<div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<form action="/foodapp/public/register-post" method="post" class="w-50 mx-auto">
  <div class="mb-3">
    <label class="form-label">Login</label>
    <input type="text" name="login" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Heslo</label>
    <input type="password" name="password" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Zopakuj heslo</label>
    <input type="password" name="password2" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Role</label>
    <select name="role" class="form-select">
      <option value="consumer">Konzument</option>
      <option value="supplier">Dodavatel</option>
    </select>
  </div>
  <button type="submit" class="btn btn-success">Registrovat</button>
</form>
<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/main.php';
