<?php

/* @var array $pca Project Configuration Array */

if (!empty($_FILES['photos']['name'][0])) {
    $arr_info = rebuildArray($_FILES['photos']);
    foreach ($arr_info as $value) {
        // проверка на ошибки загрузки
        if ($value['error'] != 0) {
            addMessage(MSG_WARNING, sprintf('%s was not saved - %s', $value['name'], getErrorText($value['error'])));
            continue;
        }
        // проверка на размер файла
        if ($value['size'] > $pca['max_file_size']) {
            addMessage(MSG_WARNING, sprintf('%s was not saved - %s%s', $value['name'], 'Maximum allowed file size is ', $pca['max_file_size']));
            continue;
        }
        // проверка на соответствие MIME-типа файла
        if (!empty($value['type'])) {
            $dir = checkType($value['tmp_name']);
            if (empty($dir)) {
                addMessage(MSG_DANGER, sprintf('%s was not saved - %s', $value['name'], 'Invalid file format.'));
            } else {
                // все проверки успешны, сохранение файла в определенную директорию
                //
                // генерация уникальных и корректных для ОС сервера имен файлов во избежания конфликтов
                //
                // $file_name = $_SERVER['DOCUMENT_ROOT'] . $dir . DIRECTORY_SEPARATOR . getUniqueStr() .
                //    '.' . pathinfo($value['name'], PATHINFO_EXTENSION);
                //
                // но тогда необходима реализация методов хранения и последующего получения
                // оригинальных имен загруженных файлов, но есть ли в этом необходимость в данном задании
                $file_name = $_SERVER['DOCUMENT_ROOT'] . $dir . DIRECTORY_SEPARATOR . $value['name'];
                move_uploaded_file($value['tmp_name'], $file_name);
                addMessage(MSG_SUCCESS, sprintf('The %s file was successfully saved.', $value['name']));
            }
        }
    }
}
?>
<div class="container my-3">
    <form method="post" enctype="multipart/form-data" class="was-validated">
        <div class="custom-file mb-3">
            <input type="hidden" name="MAX_FILE_SIZE" value="<?= $pca['max_file_size']?>">
            <input type="file" id="photos" name="photos[]" class="custom-file-input" accept="<?= '.' . getListFileType(',.')?>" multiple required>
            <label class="custom-file-label w-50" for="photos">Choose file</label>
        </div>

        <button type="submit" class="btn btn-outline-primary">Submit</button>
    </form>
</div>
