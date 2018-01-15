<?php

$dir_handle = folderCheck($_SERVER['DOCUMENT_ROOT'] . DIR_USER_IMG);
$count = 0;

if (is_resource($dir_handle)) {
    $pattern = '.+\.(' . getListFileType('|', SECTION_IMG) . ')';
    $arr_files = folderScan($_SERVER['DOCUMENT_ROOT'] . DIR_USER_IMG, $dir_handle, $pattern);
    $count = count($arr_files);
    $y = intval(ceil($count/4));
    $k = 0;
}
?>
<?php if ($count == 0): ?>
    <h3>No images</h3>
<?php else: ?>
    <div class="product-slider">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php foreach ($arr_files as $key => $value): ?>
                    <div class="carousel-item <?= $key === 0 ? 'active' : '' ?> text-center"> <img src="<?= DIR_USER_IMG . '/' . $value ?>"> </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="clearfix">
            <div id="thumbcarousel" class="carousel slide" data-interval="false">
                <div class="carousel-inner">
                    <?php while ($k < $count) :?>
                        <div class="carousel-item <?= $k === 0 ? 'active' : '' ?>">
                            <?php $x = ($k + 4 < $count) ? 4 : $count - $k ?>
                            <?php for ($i = 0; $i < $x; $i++): ?>
                                <div data-target="#carousel" data-slide-to="<?= $k ?>" class="thumb"><img src="<?= DIR_USER_IMG . '/' . $arr_files[$k++] ?>"></div>
                            <?php endfor; ?>
                        </div>
                    <?php endwhile; ?>
                </div>

                <a class="carousel-control-prev" href="#thumbcarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#thumbcarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

                <ol class="carousel-indicators">
                    <?php for ($i = 0; $i < $y; $i++): ?>
                        <li data-target="#thumbcarousel" data-slide-to="<?= $i ?>" class="<?= $i === 0 ? 'active' : '' ?>"></li>
                    <?php endfor; ?>
                </ol>
            </div>

        </div>
    </div>
<?php endif; ?>
