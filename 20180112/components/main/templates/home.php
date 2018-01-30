<?php

setcookie('page_home', empty($_COOKIE['page_home']) ? 1 : ++$_COOKIE['page_home'], 0, '/');

if (!empty($_SESSION['user'])) {
    header('Location: index.php?page=hello');
} elseif (!empty($_POST['user'])) {
    $_SESSION['user'] = trim(htmlentities($_POST['user'], ENT_HTML5, 'UTF-8'));
    header('Location: index.php?page=hello');
}
?>
<div class="px-3">
    <form id="signIn" method="post" action="index.php">
        <label for="inputName" class="col-sm-6 col-form-label">Представьтесь, пожалуйста</label>
        <div class="form-group row">
            <div class="col-sm-6">
                <input type="text" name="user" class="form-control" id="inputName" aria-describedby="nameHelp" placeholder="Укажите Ваше имя" required>
            </div>

            <button type="submit" class="btn btn-dark mb-2" id="signSubmit">Submit</button>
        </div>
    </form>
</div>
