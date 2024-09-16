<?php require 'partials/head.php' ?>
<?php require 'partials/nav.php' ?>
<?php require 'partials/banner.php' ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-10">
            <div class="mb-3 p-2">
                <h1 class="display-4 text-center fw-bold">Images</h1>
                <?php foreach ($images as $image) { ?>
                <img src="<?= $image ?>" width="200" height="175"/>
                     <?php } ?>
            </div>
        </div>
        <?php require 'upload-view.php'; ?>
    </div>
</div>
<?php require 'partials/footer.php'; ?>
