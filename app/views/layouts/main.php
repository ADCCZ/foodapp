<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($title ?? 'FoodApp', ENT_QUOTES) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/foodapp/public/home">FoodApp</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="/foodapp/public/home">Domů</a></li>
                <li class="nav-item"><a class="nav-link" href="/foodapp/public/about">O projektu</a></li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php if (!empty($_SESSION['user'])): ?>
                    <li class="nav-item"><span class="nav-link">👤 <?= htmlspecialchars($_SESSION['user']['login']) ?></span></li>
                    <li class="nav-item"><a class="nav-link" href="/foodapp/public/logout">Odhlásit</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="/foodapp/public/login">Přihlášení</a></li>
                    <li class="nav-item"><a class="nav-link" href="/foodapp/public/register">Registrace</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<main class="container py-4">
    <?= $content ?? '' ?>
</main>

<footer class="text-center text-muted py-3 border-top">
    <small>&copy; <?= date('Y') ?> FoodApp | Semestrální práce</small>
</footer>

</body>
</html>
