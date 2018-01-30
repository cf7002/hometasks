<?php

setcookie('page_stat', empty($_COOKIE['page_stat']) ? 1 : ++$_COOKIE['page_stat'], 0, '/');

?>
<div class="m-3">
    <h3>Страница статистики.</h3>

    <p class="text-secondary">Статистика посещения страниц сайта в этом сеансе:</p>

    <ul class="text-secondary">
        <li>Home - <?= isset($_COOKIE['page_home']) ? $_COOKIE['page_home'] : 0 ?></li>
        <li>Hello - <?= isset($_COOKIE['page_hello']) ? $_COOKIE['page_hello'] : 0 ?></li>
        <li>Statistic - <?= isset($_COOKIE['page_stat']) ? $_COOKIE['page_stat'] : 1 ?></li>
        <li>About - <?= isset($_COOKIE['page_about']) ? $_COOKIE['page_about'] : 0 ?></li>
    </ul>
</div>
