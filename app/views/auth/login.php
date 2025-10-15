<?php ob_start(); ?>
<h1>Přihlášení</h1>

<?php if (!empty($error)): ?>
<div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<form action="/foodapp/public/login-post" method="post" class="w-50 mx-auto">
  <div class="mb-3">
    <label class="form-label">Login</label>
    <input type="text" name="login" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Heslo</label>
    <input type="password" name="password" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-primary">Přihlásit se</button>
</form>
<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/main.php';
