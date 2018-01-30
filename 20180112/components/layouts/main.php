<?php

/* @var array $arr_components */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Site</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

    <!-- site CSS -->
    <link rel="stylesheet" href="css/site.css">
</head>

<body>
    <div class="container">
        <?php if (isset($arr_components['header'])): ?>
        <header>
            <?php foreach ($arr_components['header'] as $component) {
                require_once "{$component}";
            } ?>
        </header>
        <?php endif; ?>

        <?php if (isset($arr_components['main'])): ?>
        <main>
            <?php foreach ($arr_components['main'] as $component) {
                require_once "{$component}";
            } ?>
        </main>
        <?php endif; ?>

        <?php if (isset($arr_components['footer'])): ?>
        <footer>
            <?php foreach ($arr_components['footer'] as $component) {
                require_once "{$component}";
            } ?>
        </footer>
        <?php endif; ?>
    </div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>