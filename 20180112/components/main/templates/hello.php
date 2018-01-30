<?php

setcookie('page_hello', empty($_COOKIE['page_hello']) ? 1 : ++$_COOKIE['page_hello'], 0, '/');

if (empty($_SESSION['user'])) header('Location: index.php');

?>
<div class="m-3">
    <h3>Привет, <?= html_entity_decode($_SESSION['user']) ?>!</h3>

    <div class="mt-4">
        <form method="post" action="index.php?page=forget">
            <button type="submit" class="btn btn-dark mb-2">Forget me</button>
        </form>
    </div>
</div>
