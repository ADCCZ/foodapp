<?php
ob_start();
?>
<div class="text-center">
    <h1><?= htmlspecialchars($welcomeText) ?></h1>
    <p class="lead">Tento web bude sloužit jako objednávkový systém pro rozvoz potravin.</p>
</div>
<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/main.php';
