<?php

/* @var array $pca Project Configuration Array */

?>

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">
        <img src="images/php.svg" width="30" height="30" class="d-inline-block align-top rounded-circle mr-2" alt="Logo">Site</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <?php foreach ($pca['main_menu'] as $item): ?>
            <?php if (isset($item['items'])): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="index.php<?= empty($item['page']) ? '' : '?page=' . $item['page'] ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $item['title'] ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php foreach ($item['items'] as $value): ?>
                        <a class="dropdown-item" href="index.php<?= empty($value['page']) ? '' : '?page=' . $value['page'] ?>"><?= $value['title'] ?></a>
                    <?php endforeach; ?>
                    </div>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php<?= empty($item['page']) ? '' : '?page=' . $item['page'] ?>"><?= $item['title'] ?></a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
        </ul>
    </div>
</nav>
