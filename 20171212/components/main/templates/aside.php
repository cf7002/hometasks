<?php

/* @var array $pca Project Configuration Array */
/* @var string $content */

if ($content == 'home.php') {
    $dir_handle = folderCheck($_SERVER['DOCUMENT_ROOT'] . DIR_USER_DOC);
    $count = 0;

    if (is_resource($dir_handle)) {
        $pattern = '.+\.(' . getListFileType('|', SECTION_DOC) . ')';
        $arr_files = folderScan($_SERVER['DOCUMENT_ROOT'] . DIR_USER_DOC, $dir_handle, $pattern);
        $count = count($arr_files);
    }
}
?>
<aside class="align-top">
    <?php if ($content == 'home.php'): ?>
        <?php if ($count == 0): ?>
            <h3>No files</h3>
        <?php else: ?>
            <ul>
                <?php foreach ($arr_files as $file): ?>
                    <li><?= $file ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    <?php endif; ?>
</aside>
