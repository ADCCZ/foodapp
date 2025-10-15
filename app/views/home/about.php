<?php
ob_start();
?>
<h1><?= htmlspecialchars($title) ?></h1>
<p><?= htmlspecialchars($text) ?></p>
<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/main.php';
