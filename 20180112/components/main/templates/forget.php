<?php

if (!empty($_SESSION['user'])) session_unset();

header('Location: index.php');
